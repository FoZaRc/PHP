<?php
function renderViewer($sort = 'added', $page = 1) {
    $pdo = new PDO('sqlite:contacts.db');
    $limit = 10;
    $offset = ($page - 1) * $limit;

    // Определяем сортировку
    $orderBy = match ($sort) {
        'lastname' => 'lastname ASC',
        'birthdate' => 'birthdate ASC',
        default => 'id ASC'
    };

    // Считаем общее количество записей
    $total = $pdo->query("SELECT COUNT(*) FROM contacts")->fetchColumn();
    $pages = ceil($total / $limit);

    // Получаем записи
    $stmt = $pdo->query("SELECT * FROM contacts ORDER BY $orderBy LIMIT $limit OFFSET $offset");
    $contacts = $stmt->fetchAll();

    // Сортировка меню
    $sortOptions = ['added' => 'По добавлению', 'lastname' => 'По фамилии', 'birthdate' => 'По дате рождения'];
    $sortMenu = "<div class='submenu mb-3'>";
    foreach ($sortOptions as $key => $label) {
        $active = ($sort === $key) ? 'active' : '';
        $sortMenu .= "<a href='?section=view&sort=$key' class='btn btn-sm btn-outline-primary $active'>$label</a> ";
    }
    $sortMenu .= "</div>";

    // Таблица
    $table = "<table class='table table-bordered'>";
    $table .= "<thead><tr><th>ФИО</th><th>Пол</th><th>Дата рождения</th><th>Телефон</th><th>Адрес</th><th>Email</th><th>Комментарий</th></tr></thead><tbody>";
    foreach ($contacts as $c) {
        $fio = "{$c['lastname']} {$c['firstname']} {$c['middlename']}";
        $table .= "<tr><td>$fio</td><td>{$c['gender']}</td><td>{$c['birthdate']}</td><td>{$c['phone']}</td><td>{$c['address']}</td><td>{$c['email']}</td><td>{$c['comment']}</td></tr>";
    }
    $table .= "</tbody></table>";

    // Пагинация
    $pagination = "<nav><ul class='pagination'>";
    for ($i = 1; $i <= $pages; $i++) {
        $active = ($i == $page) ? 'active' : '';
        $pagination .= "<li class='page-item $active'><a class='page-link' href='?section=view&sort=$sort&page=$i'>$i</a></li>";
    }
    $pagination .= "</ul></nav>";

    return $sortMenu . $table . $pagination;
}
