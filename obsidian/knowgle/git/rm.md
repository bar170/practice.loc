```git
git rm [path/filename]
git rm -r [directory]
```
Удаляет файлы из директории и отслеживания. 
Некоторые флаги:
-r рекурсивно удаляет папки
-n (--dry-run) показывает имена затронутых файлов не удаляя их
--cahced удаляет файл из отслеживания, не удаляя его из файловой системы
```git
git rm home/admin/file.txt
git rm -r home/admin
```