<?php

declare(strict_types=1);

class DB
{
    public static function connect(): PDO
    {
        return new PDO('mysql:host=localhost;dbname=tgbot', 'root', 'iskan2066');
    }
}