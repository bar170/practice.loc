Как поднять сервер на Jino: пошаговая инструкция
Аренда домена и VPS
Зарегистрировался на jino.ru. Приобрел домен wenonezh.ru. Арендовал VPS с Ubuntu 24.04. Получил доступ: IPv6 2001:1bb0:e000:1e::72, внутренний IPv4 10.100.20.120, порт SSH 49313, логин root.

    Подключение к серверу
    Подключился по SSH командой ssh root@72a8bc834927.vps.myjino.ru -p 49313.

    Создание пользователя
    Создал пользователя admin командой adduser admin. Добавил его в группу sudo: usermod -aG sudo admin. Переключился на него: su - admin. Дальше работал только от admin.

    Подготовка папок проекта
    Создал папку для сайта: sudo mkdir -p /home/admin/sites/wenonezh.ru. Сделал admin владельцем: sudo chown -R admin:admin /home/admin/sites. Перешел в папку проекта: cd /home/admin/sites/wenonezh.ru.

    Установка Git и клонирование репозитория
    Обновил пакеты и установил Git: sudo apt update && sudo apt install git -y. Инициализировал репозиторий: git init. Добавил удаленный репозиторий: git remote add origin git@github.com:bar170/practice.loc.git.

Сгенерировал SSH-ключ для GitHub: ssh-keygen -t ed25519 -C "admin@server". Посмотрел ключ: cat ~/.ssh/id_ed25519.pub, скопировал его и добавил в GitHub (Settings → SSH and GPG keys → New SSH key). Проверил подключение: ssh -T git@github.com.

Стянул репозиторий: git fetch origin master, затем git checkout -B master origin/master.

    Установка Nginx
    Установил Nginx: sudo apt install nginx -y. Проверил, что работает: sudo systemctl status nginx.

    Настройка конфига Nginx
    Создал файл конфигурации: sudo nano /etc/nginx/conf.d/wenonezh.ru.conf. Вставил в него настройки:

server {
listen 80;
listen [::]:80;
root /home/admin/sites/wenonezh.ru/obsidian/www;
index index.php index.html index.htm;
server_name wenonezh.ru;
location / {
try_files $uri $uri/ =404;
}
location ~ .php$ {
include fastcgi_params;
fastcgi_pass unix:/var/run/php/php8.4-fpm.sock;
fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
}
}

Проверил конфиг: sudo nginx -t. Перезагрузил Nginx: sudo systemctl reload nginx.

    Установка PHP
    Установил PHP-FPM: sudo apt install php-fpm -y. Установилась версия 8.4. Проверил, что работает: sudo systemctl status php8.4-fpm.

    Борьба с ошибкой 502 Bad Gateway
    Столкнулся с ошибкой 502. Проверил права на сокет /var/run/php/php8.4-fpm.sock. Добавил пользователя admin в группу www-data. Проверил пути в конфиге. Временный переход на порт 127.0.0.1:9000 помог понять, что проблема в правах. В итоге всё заработало на сокете.

    Создание тестового index.php
    Создал папку www: mkdir -p /home/admin/sites/wenonezh.ru/obsidian/www. Создал тестовый файл: echo "<?php phpinfo(); ?>" | tee /home/admin/sites/wenonezh.ru/obsidian/www/index.php. Проверил локально: curl http://localhost — увидел страницу phpinfo.

    Исправление пути по совету руководителя
    Руководитель подсказал правильный путь для корневой папки в Nginx: root /home/admin/sites/wenonezh.ru/obsidian/www.

    Замена на Hello World
    Заменил содержимое index.php на Hello world: echo "<?php echo 'Hello, world!'; ?>" | sudo tee /home/admin/sites/wenonezh.ru/obsidian/www/index.php.

    Проверка в браузере
    Открыл в браузере http://wenonezh.ru и увидел надпись Hello, world!.

    Полезные команды
    sudo systemctl status nginx — проверить статус Nginx.
    sudo systemctl reload nginx — перезагрузить конфиг Nginx.
    sudo nginx -t — проверить конфигурацию на ошибки.
    sudo tail -f /var/log/nginx/error.log — смотреть ошибки Nginx в реальном времени.
    git pull origin master — обновить файлы из репозитория.

Выводы
Главное — следить за путями в конфиге, они должны совпадать с реальными папками на сервере. Ошибка 502 чаще всего связана с тем, что Nginx не может связаться с PHP. Права доступа и владелец файлов очень важны. Git удобен для синхронизации, но нужные файлы должны быть в репозитории.
вадим 16.03