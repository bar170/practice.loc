# solution()

```php
solution($a, $x)
```

Функция принимает аргументом массив $a и значение $x. Возвращает true, если значение $x присутствует в массиве $a, и false в противном случае.

Функция использует строгое сравнение (===), что позволяет различать числа и строки (например, 1 и "1" считаются разными).
Пример использования
php

$result = solution([1, 2, 3, 4], 3);
# $result == true

$result = solution([1, 2, 3, 4], 5);
# $result == false

$result = solution(["apple", "banana"], "banana");
# $result == true

Ссылка на задачу

https://www.codewars.com/kata/57cc975ed542d3148f00015b

#php #array #in_array #codewars