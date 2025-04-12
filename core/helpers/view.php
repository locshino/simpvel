<?php

function view($view = null, $data = [])
{
  if ($view) {
    return \Core\View::render($view, $data);
  }

  return \Core\View::getInstance();
}