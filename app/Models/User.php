<?php

namespace App\Models;

use Core\Model;

class User extends Model
{
  protected static $table = 'user';

  public static function getAllAdmin(){
    $sql = "SELECT * FROM user WHERE role = 'admin'";
    return self::fetchAll($sql);
  }
}
