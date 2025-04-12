<?php

namespace Core;

use PDO;

class Model
{
  protected static $table;

  public static function execute($sql, $params = [])
  {
    $stmt = Database::pdo()->prepare($sql);
    $stmt->execute($params);
    return $stmt;
  }

  public static function fetchOne($sql, $params = [])
  {
    return self::execute($sql, $params)->fetch(PDO::FETCH_ASSOC);
  }

  public static function fetchAll($sql, $params = [])
  {
    return self::execute($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function all()
  {
    return self::execute("SELECT * FROM " . static::$table)->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function find($id)
  {
    return self::execute("SELECT * FROM " . static::$table . " WHERE id = ?", [$id])->fetch(PDO::FETCH_ASSOC);
  }

  public static function create($data)
  {
    $keys = array_keys($data);
    $columns = implode(",", $keys);
    $placeholders = implode(",", array_fill(0, count($keys), "?"));
    self::execute("INSERT INTO " . static::$table . " ($columns) VALUES ($placeholders)", array_values($data));
  }

  public static function update($id, $data)
  {
    $set = implode(", ", array_map(fn($k) => "$k = ?", array_keys($data)));
    $params = array_values($data);
    $params[] = $id;
    self::execute("UPDATE " . static::$table . " SET $set WHERE id = ?", $params);
  }

  public static function delete($id)
  {
    self::execute("DELETE FROM " . static::$table . " WHERE id = ?", [$id]);
  }
}
