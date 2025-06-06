<?php
$pdo = new PDO('sqlite:contacts.db');

// Создаём таблицу
$pdo->exec("
    CREATE TABLE IF NOT EXISTS contacts (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        lastname TEXT,
        firstname TEXT,
        middlename TEXT,
        gender TEXT,
        birthdate TEXT,
        phone TEXT,
        address TEXT,
        email TEXT,
        comment TEXT
    )
");

echo "База данных и таблица 'contacts' успешно созданы.";
?>
