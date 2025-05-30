<?php

namespace src\Controllers;

use src\Models\Comments\Comment;
use src\View\View;

class CommentController
{
    private $view;

    public function __construct()
    {
        $this->view = new View;
    }

    public function store(int $articleId): void
    {
        $comment = new Comment();
        $comment->setText($_POST['text']);
        $comment->setAuthorId(1);
        $comment->setArticleId($articleId);
        $comment->save();

        header("Location: /project/www/article/{$articleId}#comment" . $comment->getId());
    }

    public function edit(int $commentId): void
    {
        $comment = Comment::getById($commentId);
        $this->view->renderHtml('comments/edit', ['comment' => $comment]);
    }

    public function update(int $commentId): void
    {
        $comment = Comment::getById($commentId);
        $comment->setText($_POST['text']);
        echo 'Сохраняем текст: ' . $_POST['text'];
        $comment->save();

        header("Location: /project/www/article/" . $comment->getArticleId() . "#comment" . $comment->getId());
    }

    public function delete(int $commentId): void
    {
        $comment = Comment::getById($commentId);
        $articleId = $comment->getArticleId();
        $comment->delete();

        header("Location: /project/www/article/{$articleId}");
    }
}
