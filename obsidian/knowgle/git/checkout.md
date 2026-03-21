```git
git checkout [branch]
```
Переключение на ветку \[branch].
Некоторые флаги:
-b создает новую ветку и переключается на нее
-B создает новую ветку и переключается на нее. Если ветка уже существует - переключается на ее стартовое состояние
Пример:
```git
git checkout -b newBranch
git checkout -B startPoint
git checkout existingBranch
```
