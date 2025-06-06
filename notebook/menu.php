<?php
function renderMenu($active, $sort = '') {
    $mainMenu = [
        'view' => 'Просмотр',
        'add' => 'Добавление записи',
        'edit' => 'Редактирование записи',
        'delete' => 'Удаление записи'
    ];

    $sortMenu = [
        'added' => 'По дате добавления',
        'lastname' => 'По фамилии',
        'birthdate' => 'По дате рождения'
    ];

    $html = "<div class='btn-group mb-3' role='group'>";
    foreach ($mainMenu as $key => $label) {
        $activeClass = ($key === $active) ? 'btn-danger' : 'btn-primary';
        $html .= "<a href='?section=$key' class='btn $activeClass'>$label</a>";
    }
    $html .= "</div>";



    return $html;
}
