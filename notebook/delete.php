<?php
function renderDeletePage() {
    $pdo = new PDO('sqlite:contacts.db');
    $message = '';

    if (isset($_GET['id'])) {
        $stmt = $pdo->prepare("SELECT lastname FROM contacts WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $contact = $stmt->fetch();

        if ($contact) {
            $pdo->prepare("DELETE FROM contacts WHERE id = ?")->execute([$_GET['id']]);
            $message = "<div class='alert alert-warning'>Запись с фамилией <strong>{$contact['lastname']}</strong> удалена</div>";
        } else {
            $message = "<div class='alert alert-danger'>Ошибка: запись не найдена</div>";
        }
    }

    // Список контактов
    $stmt = $pdo->query("SELECT id, lastname, firstname, middlename FROM contacts ORDER BY lastname, firstname");
    $contacts = $stmt->fetchAll();

    $list = "<div class='list-group'>";
    foreach ($contacts as $contact) {
        $name = "{$contact['lastname']} {$contact['firstname']} {$contact['middlename']}";
        $list .= "<a href='?section=delete&id={$contact['id']}' class='list-group-item list-group-item-action'>$name</a>";
    }
    $list .= "</div>";

    return $message . $list;
}
?>
