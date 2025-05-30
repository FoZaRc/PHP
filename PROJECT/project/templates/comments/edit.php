<?php require(dirname(__DIR__).'/header.php');?>




<form action="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/comments/<?= $comment->getId(); ?>/update" method="POST">
    <label for="text">Текст</label>
    <textarea name="text" rows="4" class="form-control"><?= htmlspecialchars($comment->getText()); ?></textarea><br>
    <button type="submit" class="btn btn-success">Сохранить</button>
</form>

<?php require(dirname(__DIR__).'/footer.php'); ?>