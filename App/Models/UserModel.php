<?php

namespace App\Models;

use \Core\Model;
use PDO;

class UserModel extends Model
{
    public static function getUser(string $username)
    {
        $stmt = static::getDB()->prepare("SELECT * FROM users WHERE username=:username");
        $stmt->bindValue(":username", $username);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
