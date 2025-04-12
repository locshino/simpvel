<?php

function env($key, $default = null)
{
  return match (true) {
    isset($_ENV[$key]) => $_ENV[$key],
    defined($key) => constant($key),
    default => $default,
  };
}

function config($path)
{
  $path = base_path('config/' . $path . '.php');
  if (!file_exists($path)) die('Config file not found: ' . $path);
  return require_once base_path('config/' . $path . '.php');
}