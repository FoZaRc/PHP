<?php
session_start(); // 🔸 Запуск сессии

// Если в сессии ещё нет значения
if (!isset($_SESSION['text'])) {
    $_SESSION['text'] = 'test'; // 🔸 Записываем
    echo "Сессия создана. Обнови страницу.";
} else {
    // 🔸 Значение уже есть — выводим
    echo "Содержимое сессии: " . $_SESSION['text'];
}
?>
