https://www.codewars.com/kata/565f5825379664a26b00007c

**Условие задачи**

Найти площадь поверхности и объем коробки

**Решение задачи**

```php
function getSize($width, $height, $depth) {
$area = 2 * ($width * $height + $width * $depth + $height * $depth);
$volume = $width * $height * $depth;
return [$area, $volume];
}
```

**Использованные функции**
[[obsidian-git/obsidian/knowgle/php/return]]


#php 




