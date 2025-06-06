<?php
$pdo = new PDO('sqlite:contacts.db');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Создание таблицы
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
    );
");

echo "<p>База данных и таблица успешно созданы.</p>";
?>
