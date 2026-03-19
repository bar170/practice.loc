# Как поднять сервер на Jino: пошаговая инструкция

**Автор:** Вадим  
**Дата:** 16.03.2026  
**Теги:** #devops #server #nginx #php #jino #инструкция

---

## 1. Аренда домена и VPS

Зарегистрировался на [jino.ru](https://jino.ru). Приобрёл домен `wenonezh.ru`. Арендовал VPS с **Ubuntu 24.04**. Получил доступ:

- IPv6: `2001:1bb0:e000:1e::72`
- Внутренний IPv4: `10.100.20.120`
- Порт SSH: `49313`
- Логин: `root`

---

## 2. Подключение к серверу

```bash
ssh root@72a8bc834927.vps.myjino.ru -p 49313
```

3. Создание пользователя
bash

adduser admin
usermod -aG sudo admin
su - admin

Дальше работал только от пользователя admin.
4. Подготовка папок проекта
bash

sudo mkdir -p /home/admin/sites/wenonezh.ru
sudo chown -R admin:admin /home/admin/sites
cd /home/admin/sites/wenonezh.ru

5. Установка Git и клонирование репозитория
bash

sudo apt update && sudo apt install git -y
git init
git remote add origin git@github.com:bar170/practice.loc.git

🔑 Генерация SSH-ключа
bash

ssh-keygen -t ed25519 -C "admin@server"
cat ~/.ssh/id_ed25519.pub   # копируем ключ

Ключ добавлен в GitHub: Settings → SSH and GPG keys → New SSH key

Проверка подключения:
bash

ssh -T git@github.com

⬇️ Клонирование репозитория
bash

git fetch origin master
git checkout -B master origin/master

6. Установка Nginx
bash

sudo apt install nginx -y
sudo systemctl status nginx   # должно быть active

7. Настройка конфига Nginx

Создал файл конфигурации:
bash

sudo nano /etc/nginx/conf.d/wenonezh.ru.conf

Содержимое файла:
nginx

server {
    listen 80;
    listen [::]:80;

    root /home/admin/sites/wenonezh.ru/obsidian/www;
    index index.php index.html index.htm;

    server_name wenonezh.ru;

    location / {
        try_files $uri $uri/ =404;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_pass unix:/var/run/php/php8.4-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }
}

Проверка и перезагрузка:
bash

sudo nginx -t
sudo systemctl reload nginx

8. Установка PHP
bash

sudo apt install php-fpm -y

Установилась версия PHP 8.4. Проверка:
bash

sudo systemctl status php8.4-fpm

9. Борьба с ошибкой 502 Bad Gateway

Столкнулся с ошибкой 502 Bad Gateway. Диагностика:

    Проверил права на сокет: /var/run/php/php8.4-fpm.sock

    Добавил пользователя admin в группу www-data

    Проверил пути в конфиге Nginx

    Временный переход на порт 127.0.0.1:9000 помог понять, что проблема именно в правах доступа

После настройки прав всё заработало на сокете.
10. Создание тестового index.php
bash

mkdir -p /home/admin/sites/wenonezh.ru/obsidian/www
echo "<?php phpinfo(); ?>" | tee /home/admin/sites/wenonezh.ru/obsidian/www/index.php

Проверка локально:
bash

curl http://localhost

Увидел страницу phpinfo() — сервер работает ✅
11. Исправление пути по совету руководителя

Руководитель подсказал правильный путь для корневой папки в Nginx:
nginx

root /home/admin/sites/wenonezh.ru/obsidian/www;

12. Замена на Hello World
bash

echo "<?php echo 'Hello, world!'; ?>" | sudo tee /home/admin/sites/wenonezh.ru/obsidian/www/index.php

13. Проверка в браузере

Открыл в браузере http://wenonezh.ru — увидел надпись Hello, world! ✅
14. Полезные команды
Команда	Описание
sudo systemctl status nginx	Проверить статус Nginx
sudo systemctl reload nginx	Перезагрузить конфиг Nginx без прерывания
sudo nginx -t	Проверить конфигурацию на ошибки
sudo tail -f /var/log/nginx/error.log	Смотреть ошибки Nginx в реальном времени
git pull origin master	Обновить файлы из репозитория
15. Выводы

    Пути в конфиге должны точно совпадать с реальными папками на сервере

    Ошибка 502 Bad Gateway чаще всего связана с тем, что Nginx не может связаться с PHP (права доступа или несовпадение версий)

    Права доступа и владелец файлов критически важны

    Git удобен для синхронизации, но нужные файлы должны быть в репозитории, иначе их придётся создавать вручную