<?php
include 'menu.php';
include 'viewer.php';
include 'add.php';
include 'edit.php';
include 'delete.php';

$section = $_GET['section'] ?? 'view';
$sort = $_GET['sort'] ?? 'added';
$page = $_GET['page'] ?? 1;

$content = '';
switch ($section) {
    case 'add':
        $content = renderAddForm();
        break;
    case 'edit':
        $content = renderEditForm();
        break;
    case 'delete':
        $content = renderDeletePage();
        break;
    case 'view':
    default:
        $content = renderViewer($sort, $page);
        break;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Записная книжка</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .menu a {
            margin-right: 10px;
            text-decoration: none;
        }
        .menu .active {
            color: red;
            font-weight: bold;
        }
        .submenu a {
            font-size: 0.9em;
            margin-right: 5px;
        }
        .submenu .active {
            color: red;
        }
        .pagination a:hover {
            border: 2px solid #000;
        }
    </style>
</head>
<body class="container py-4">
    <h1 class="mb-4">Записная книжка</h1>
    <nav class="menu mb-3">
        <?= renderMenu($section, $sort) ?>
    </nav>
    <?= $content ?>
</body>
</html>
