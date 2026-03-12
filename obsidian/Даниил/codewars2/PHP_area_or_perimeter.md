
https://www.codewars.com/kata/5ab6538b379d20ad880000ab

**Условие задачи**
Дан четырёхугольник с длиной и шириной.  
Если это квадрат — вернуть площадь.  
Если прямоугольник — вернуть периметр.

**Решение задачи**

```php
function areaOrPerimeter(int $l, int $w) {
    if ($l == $w) {
        $result =  $l * $w;
    } else {
        $result =  2 * ($l + $w);
    }
return $result
}
```

**Использованные функции**
[[obsidian-git/obsidian/knowgle/php/return]]

#php