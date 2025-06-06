<?php
function renderEditForm() {
    $pdo = new PDO('sqlite:contacts.db');
    $id = $_GET['id'] ?? null;

    $stmt = $pdo->query("SELECT id, lastname, firstname FROM contacts ORDER BY lastname, firstname");
    $records = $stmt->fetchAll();

    if (!$id && count($records) > 0) {
        $id = $records[0]['id'];
    }

    $current = null;
    if ($id) {
        $stmt = $pdo->prepare("SELECT * FROM contacts WHERE id = ?");
        $stmt->execute([$id]);
        $current = $stmt->fetch();
    }

    $message = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $current) {
        $stmt = $pdo->prepare("UPDATE contacts SET lastname=?, firstname=?, middlename=?, gender=?, birthdate=?, phone=?, address=?, email=?, comment=? WHERE id=?");
        if ($stmt->execute([
            $_POST['lastname'], $_POST['firstname'], $_POST['middlename'], $_POST['gender'],
            $_POST['birthdate'], $_POST['phone'], $_POST['address'], $_POST['email'], $_POST['comment'], $id
        ])) {
            $message = "<div class='alert alert-success'>Запись обновлена</div>";
            $current = array_merge($current, $_POST);
        } else {
            $message = "<div class='alert alert-danger'>Ошибка: не удалось обновить</div>";
        }
    }

    $links = "<div class='mb-3'>";
    foreach ($records as $record) {
        $active = ($record['id'] == $id) ? "btn btn-outline-danger me-2" : "btn btn-outline-primary me-2";
        $links .= "<a class='$active' href='?section=edit&id={$record['id']}'>{$record['lastname']} {$record['firstname']}</a>";
    }
    $links .= "</div>";

    if (!$current) {
        return $message . $links . "<div class='alert alert-warning'>Запись не найдена</div>";
    }

    $selectedM = ($current['gender'] == 'м') ? 'selected' : '';
    $selectedF = ($current['gender'] == 'ж') ? 'selected' : '';

    $form = <<<FORM
<form method="POST" class="row g-3">
    <div class="col-md-4">
        <label class="form-label">Фамилия</label>
        <input name="lastname" value="{$current['lastname']}" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="form-label">Имя</label>
        <input name="firstname" value="{$current['firstname']}" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="form-label">Отчество</label>
        <input name="middlename" value="{$current['middlename']}" class="form-control">
    </div>
    <div class="col-md-2">
        <label class="form-label">Пол</label>
        <select name="gender" class="form-select">
            <option value="м" $selectedM>м</option>
            <option value="ж" $selectedF>ж</option>
        </select>
    </div>
    <div class="col-md-3">
        <label class="form-label">Дата рождения</label>
        <input type="date" name="birthdate" value="{$current['birthdate']}" class="form-control">
    </div>
    <div class="col-md-3">
        <label class="form-label">Телефон</label>
        <input name="phone" value="{$current['phone']}" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="form-label">Адрес</label>
        <input name="address" value="{$current['address']}" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input name="email" value="{$current['email']}" class="form-control" type="email">
    </div>
    <div class="col-12">
        <label class="form-label">Комментарий</label>
        <textarea name="comment" class="form-control">{$current['comment']}</textarea>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    </div>
</form>
FORM;

    return $message . $links . $form;
}