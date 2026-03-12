
https://www.codewars.com/kata/58cb43f4256836ed95000f97

**Условие задачи**
Даны два массива по 3 числа — размеры двух прямоугольных параллелепипедов (длина, ширина, высота).  
Нужно найти разницу их объёмов.

Решение задачи

```php
function findDifference(array $a, array $b): int {
    $volumeA = $a[0] * $a[1] * $a[2];
    $volumeB = $b[0] * $b[1] * $b[2];
    return abs($volumeB - $volumeA);
}
```


**Использованные функции**
[[abs]]
[[obsidian-git/obsidian/knowgle/php/return]]

#php 