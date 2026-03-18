<?php

class Tools
{
    public function getHello(): string
    {
        return "Hello, world!";
    }

    public function getCurrentTime(): string
    {
        return "Текущее время: " . date('H:i:s');
    }
    
    public function getDayOfWeek(array $day): string
    {
        $out = 'Ошибка: функция не получила функцию `getdate()`';
        
        switch ($day['weekday']) {
            case 'Sunday':
                $out = 'Сегодня воскресенье! отдыхаем перед понедельником!';
                break;
            case 'Monday':
                $out = 'Буя, сегодня понедельник :)';
                break;
            case 'Tuesday':
                $out = 'Вторник сегодня, ждем среды';
                break;
            case 'Wednesday':
                $out = 'Сегодня среда ребятушки😊';
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
