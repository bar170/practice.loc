# SELECT()

```sql
SELECT column1, column2 FROM table_name WHERE condition;
```

Функция принимает аргументом названия столбцов и таблицу. Возвращает результат выборки данных из базы данных.

SELECT может использоваться с различными операторами:

    * — выбрать все столбцы

    WHERE — фильтрация строк

    ORDER BY — сортировка

    LIMIT — ограничение количества записей

Пример использования
sql

-- выбрать все телефоны дороже 600
SELECT * FROM mobile_phones WHERE price > 600;

-- выбрать только названия телефонов Samsung
SELECT name FROM mobile_phones WHERE brand = 'Samsung';

#sql #select #database
text


### **`INSERT().md`**
```markdown
# INSERT()
```

```sql
INSERT INTO table_name (column1, column2) VALUES (value1, value2);
```

Функция принимает аргументом название таблицы, список столбцов и список значений. Возвращает количество добавленных строк.

При вставке данных важно:

    Количество значений должно совпадать с количеством столбцов

    Строковые значения заключаются в кавычки

    Цифровые значения пишутся без кавычек

Пример использования
sql

-- вставка одного телефона
INSERT INTO mobile_phones (name, brand, year, price) 
VALUES ('iPhone 13', 'Apple', 2021, 799.99);

-- вставка нескольких телефонов
INSERT INTO mobile_phones (name, brand, price) VALUES
('Galaxy S22', 'Samsung', 699.99),
('Xiaomi 12', 'Xiaomi', 499.99);

#sql #insert #database