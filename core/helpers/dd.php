<?php

if (!function_exists('dd')) {
  function dd(...$vars)
  {
    echo '<style>
            .dd-dump {
                background: #1e1e1e;
                color: #dcdcdc;
                padding: 20px;
                margin: 20px;
                border-radius: 8px;
                font-family: Consolas, monospace;
                font-size: 14px;
                overflow: auto;
                box-shadow: 0 2px 10px rgba(0,0,0,0.5);
            }
            .dd-keyword { color: #569cd6; }
            .dd-string  { color: #d69d85; }
            .dd-number  { color: #b5cea8; }
            .dd-bool    { color: #569cd6; font-weight: bold; }
            .dd-null    { color: #808080; font-style: italic; }
        </style>';

    echo '<div class="dd-dump">';
    foreach ($vars as $var) {
      highlightDump($var);
      echo '<hr>';
    }
    echo '</div>';

    die;
  }

  function highlightDump($var)
  {
    switch (gettype($var)) {
      case 'boolean':
        echo '<span class="dd-bool">bool(' . ($var ? 'true' : 'false') . ')</span>';
        break;
      case 'NULL':
        echo '<span class="dd-null">NULL</span>';
        break;
      case 'integer':
      case 'double':
        echo '<span class="dd-number">' . $var . '</span>';
        break;
      case 'string':
        echo '<span class="dd-string">"' . htmlspecialchars($var) . '"</span>';
        break;
      case 'array':
        echo '<span class="dd-keyword">array</span>(' . count($var) . ') [<br>';
        foreach ($var as $key => $value) {
          echo '&nbsp;&nbsp;[<span class="dd-string">' . htmlspecialchars($key) . '</span>] => ';
          highlightDump($value);
          echo '<br>';
        }
        echo ']';
        break;
      case 'object':
        echo '<span class="dd-keyword">object</span>(' . get_class($var) . ') {<br>';
        foreach ((array)$var as $key => $value) {
          echo '&nbsp;&nbsp;' . htmlspecialchars($key) . ' => ';
          highlightDump($value);
          echo '<br>';
        }
        echo '}';
        break;
      default:
        echo htmlspecialchars(print_r($var, true));
    }
  }
}
