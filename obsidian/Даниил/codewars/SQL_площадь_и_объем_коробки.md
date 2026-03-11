
**Условие задачи**
Есть таблица  box с размерами коробки (ширина, высота, глубина).
Нужно вычислить: площадь поверхности и объем
Результат отсортировать по возрастанию: сначала по площади, потом по объему, потом по ширине, потом по высоте.

**Решение задачи**
```sql
SELECT 
    width,
    height,
    depth,
    2 * (width * height + depth * height + width * depth) AS area,
    width * height * depth AS volume
FROM box
ORDER BY area ASC, volume ASC, width ASC, height ASC;
```

**Использованные функции/операторы**
[[select]]— выбор данных из таблицы
[[as]]— создание псевдонима для столбца
[[order_by]]— сортировка результатов

Теги
#sql #basics #math #sorting

