<?php

namespace src\Models\Comments;

use src\Models\ActiveRecordEntity;
use src\Models\Users\User;

class Comment extends ActiveRecordEntity
{
    protected $authorId;
    protected $articleId;
    protected $text;
    protected $createdAt;

    protected static function getTableName(): string
    {
        return 'comments';
    }

    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getArticleId(): int
    {
        return $this->articleId;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function setAuthorId(int $authorId): void
    {
        $this->authorId = $authorId;
    }

    public function setArticleId(int $articleId): void
    {
        $this->articleId = $articleId;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public static function findByArticleId(int $articleId): array
    {
        $db = \src\Services\Db::getInstance();
        $sql = 'SELECT * FROM `' . static::getTableName() . '` WHERE article_id = :article_id ORDER BY created_at ASC';
        return $db->query($sql, [':article_id' => $articleId], static::class);
    }
}