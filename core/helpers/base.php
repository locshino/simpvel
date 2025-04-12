<?php
function base_path(string $path = '')
{
  return __DIR__ . '/../../' . ltrim($path, '/');
}

function base_url(string $path = '')
{
  return APP_URL . '/' . ltrim($path, '/');
}

function class_basename($class)
{
  if (is_object($class)) $class = get_class($class);
  return basename(str_replace('\\', '/', $class));
}