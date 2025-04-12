<?php

function redirect()
{
  return \Core\Redirect::getInstance();
}

function back()
{
  return redirect()->to($_SERVER['HTTP_REFERER'] ?? '/');
}