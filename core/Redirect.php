<?php

namespace Core;

class Redirect
{
  protected $url;
  private static $instance = null;
  public function __construct(string $url = '/')
  {
    $this->url = $url;
  }

  public static function getInstance(): Redirect
  {
    if (self::$instance === null) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function route(string $url)
  {
    $this->url = $url;
    return $this->redirectNow();
  }

  public function to(string $url)
  {
    $this->url = $url;
    return $this->getInstance();
  }

  public function withSuccess(array $message)
  {
    $_SESSION['flash']['success'] = $message;
    return $this->redirectNow();
  }

  public function withErrors(array $message)
  {
    $_SESSION['flash']['error'] = $message;
    return $this->redirectNow();
  }

  public function back()
  {
    $referer = $_SERVER['HTTP_REFERER'] ?? '/';
    $this->url = $referer;
    return $this->redirectNow();
  }

  protected function redirectNow()
  {
    header("Location: " . $this->url);
    exit;
  }
}
