<?php

namespace App\Models;

use \Core\Model;
use PDO;

class PostModel extends Model
{
    public static function get(int $fromID = 1, int $limit = 10)
    {
        $stmt = static::getDB()->prepare("SELECT p.id, p.title, p.content, DATE_FORMAT(p.date, '%D %M, %Y') AS 'date', u.display_name AS user FROM posts p INNER JOIN users u ON u.id = p.userid WHERE p.id >= :fromid ORDER BY p.date DESC");
        $stmt->bindValue(":fromid", $fromID);
        //$stmt->bindValue(":limit", $limit);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
