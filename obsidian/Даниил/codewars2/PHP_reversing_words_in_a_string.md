
https://www.codewars.com/kata/57a55c8b72292d057b000594

***Условие задачи***
Написать функцию, которая переворачивает порядок слов в строке.  
Слова всегда разделены одним пробелом.  
Входная строка может содержать пробелы в начале и в конце — их нужно игнорировать.

**Решение задачи**

```php
function reverse(string $string): string {
    $string = trim($string);
    $words = explode(' ', $string);
    $reversed = array_reverse($words);
    return implode(' ', $reversed);
}
```

**Использованные функции**
[[trim]]
[[explode]]
[[array_reverse]]
[[implode]]

#php 
