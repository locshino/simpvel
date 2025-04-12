<?php

function session($key, $value = null)
{
  if (!isset($_SESSION)) session_start();
  if ($value !== null) $_SESSION[$key] = $value;
  return $_SESSION[$key] ?? null;
}

function flash($key, $value = null)
{
  if (!isset($_SESSION)) session_start();
  if ($value !== null) $_SESSION['flash'][$key] = $value;
  return $_SESSION['flash'][$key] ?? null;
}

function old($key, $default = null)
{
  return session('old')[$key] ?? $default;
}

function set_old()
{
  if (!isset($_SESSION)) session_start();
  $_SESSION['old'] = array_merge($_POST, $_GET);
}

function clear_old()
{
  if (!isset($_SESSION)) session_start();
  if (!isset($_SESSION['old'])) return;
  unset($_SESSION['old']);
}

function clear_flash()
{
  if (!isset($_SESSION)) session_start();
  if (!isset($_SESSION['flash'])) return;
  unset($_SESSION['flash']);
}
