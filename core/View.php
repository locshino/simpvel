<?php

namespace Core;

class View
{
  protected static $sections = [];
  private static $instance = null;
  protected static $content;
  protected static $stack;
  protected static $base_folder = 'app/Views';

  public static function render($view, $data = [])
  {
    extract($data);
    ob_start();
    include self::getViewPath($view);
    self::$content = ob_get_clean();
    echo self::$content;
  }

  public static function getViewPath($path)
  {
    return base_path(self::$base_folder . "/$path.php");
  }

  public static function getInstance()
  {
    if (self::$instance === null) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  public static function extend($layout)
  {
    ob_start();
    include self::getViewPath($layout);
    echo ob_get_clean();
  }

  public static function include($view, $data = [])
  {
    extract($data);
    include self::getViewPath($view);
  }

  public static function section($name, $content = null)
  {
    if ($content === null) {
      echo self::$sections[$name] ?? '';
    } else {
      self::$sections[$name] = $content;
    }
  }

  public static function start($name)
  {
    ob_start();
    self::$sections['_current'] = $name;
  }

  public static function end()
  {
    $name = self::$sections['_current'];
    self::$sections[$name] = ob_get_clean();
  }
}
