<?php
function renderAddForm() {
    $pdo = new PDO('sqlite:contacts.db');
    $message = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $stmt = $pdo->prepare("INSERT INTO contacts (lastname, firstname, middlename, gender, birthdate, phone, address, email, comment) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $result = $stmt->execute([
            $_POST['lastname'], $_POST['firstname'], $_POST['middlename'], $_POST['gender'],
            $_POST['birthdate'], $_POST['phone'], $_POST['address'], $_POST['email'], $_POST['comment']
        ]);

        $message = $result ?
            "<div class='alert alert-success'>Запись добавлена</div>" :
            "<div class='alert alert-danger'>Ошибка: запись не добавлена</div>";
    }

    return $message . <<<FORM
<form method="POST" class="row g-3">
    <div class="col-md-4">
        <label class="form-label">Фамилия</label>
        <input name="lastname" class="form-control" required>
    </div>
    <div class="col-md-4">
        <label class="form-label">Имя</label>
        <input name="firstname" class="form-control" required>
    </div>
    <div class="col-md-4">
        <label class="form-label">Отчество</label>
        <input name="middlename" class="form-control">
    </div>
    <div class="col-md-2">
        <label class="form-label">Пол</label>
        <select name="gender" class="form-select">
            <option value="м">м</option>
            <option value="ж">ж</option>
        </select>
    </div>
    <div class="col-md-3">
        <label class="form-label">Дата рождения</label>
        <input type="date" name="birthdate" class="form-control">
    </div>
    <div class="col-md-3">
        <label class="form-label">Телефон</label>
        <input name="phone" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="form-label">Адрес</label>
        <input name="address" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input name="email" class="form-control" type="email">
    </div>
    <div class="col-12">
        <label class="form-label">Комментарий</label>
        <textarea name="comment" class="form-control"></textarea>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Добавить</button>
    </div>
</form>
FORM;
}
