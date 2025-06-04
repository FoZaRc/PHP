<?php
session_start(); // Запуск сессии

if (!isset($_SESSION['start_time'])) {
    $_SESSION['start_time'] = time(); // сохраняем текущее время (в секундах)
    echo "Вы зашли на сайт только что.";
} else {
    $now = time(); // текущее время
    $diff = $now - $_SESSION['start_time']; // разница в секундах
    echo "Вы зашли на сайт $diff секунд назад.";
}
?>
