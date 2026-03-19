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
}
