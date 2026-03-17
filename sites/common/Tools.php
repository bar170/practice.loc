<?php
namespace common;

class Tools {

    public function getHello(string $name): string {
        return "Hello, {$name}!";
    }

    public function vladsGetDayOfWeek(array $day): string {
        $out = 'Ошибка: функция не получила функцию getdate()';
        switch ($day['weekday']) {
            case 'Sunday':
                $out = 'Сегодня воскресенье! отдыхаем перед понедельником!';
                break;
            case 'Monday':
                $out = 'Буэ, сегодня понедельник ):';
                break;
            case 'Tuesday':
                $out = 'Вторник сегодня, ждем среды';
                break;
            case 'Wednesday':
                $out = 'Сегодня среда ребятушки!🐸';
                break;
            case 'Thursday':
                $out = 'Сегодня четверг, держимся';
                break;
            case 'Friday':
                $out = 'Сегодня пятница, еще чуть-чуть!';
                break;
            case 'Saturday':
                $out = 'Отдыхаем! Сегодня суббота!';
                break;
        }
        $out = '<br>' . $out;
        return $out;
    }
}