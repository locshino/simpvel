<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
  protected static ?PDO $pdo = null;

  public static function connect(string $host, string $dbname, string $user, string $pass): void
  {
    try {
      self::$pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $user,
        $pass,
        [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
      );
    } catch (PDOException $e) {
      die("Connection failed: " . $e->getMessage());
    }
  }

  public static function checkDatabaseConstants()
  {
    $requiredConstants = ['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS'];
    foreach ($requiredConstants as $constant) {
      if (!defined($constant)) {
        die("Error: Missing database configuration constant: $constant");
      }
    }
  }

  public static function initialize()
  {
    self::checkDatabaseConstants();
    self::connect(DB_HOST, DB_NAME, DB_USER, DB_PASS);
  }

  public static function pdo(): PDO
  {
    if (self::$pdo === null) {
      self::initialize();
    }

    return self::$pdo;
  }
}
