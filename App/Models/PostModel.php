<?php

namespace App\Models;

use \Core\Model;
use PDO;

class PostModel extends Model
{
    public static function getAll()
    {
        $stmt = static::getDB()->prepare("SELECT p.id, p.title, p.content, DATE_FORMAT(p.date, '%D %M, %Y') AS 'date', u.display_name AS user FROM posts p INNER JOIN users u ON u.id = p.userid ORDER BY p.date DESC");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function get(int $id)
    {
        $stmt = static::getDB()->prepare("SELECT p.id, p.title, p.content, DATE_FORMAT(p.date, '%D %M, %Y') AS 'date', u.display_name AS user FROM posts p INNER JOIN users u ON u.id = p.userid WHERE p.id=:id ORDER BY p.date DESC");
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function edit(int $id, string $title, string $content)
    {
        $stmt = static::getDB()->prepare("UPDATE posts SET title=:title, content=:content, date=date WHERE id=:id");
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":title", $title);
        $stmt->bindValue(":content", $content);
        $stmt->execute();
    }

    public static function create(string $title, string $content, int $userid)
    {
        $stmt = static::getDB()->prepare("INSERT INTO posts (userid, content, title) VALUES (:id, :content, :title)");
        $stmt->bindValue(":id", $userid);
        $stmt->bindValue(":title", $title);
        $stmt->bindValue(":content", $content);
        $stmt->execute();
    }
}
