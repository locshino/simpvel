<?php

namespace Core;

class Route
{
  protected static $routes = [];
  protected static $prefix = '';

  public static function prefix($prefix, $callback)
  {
    $previous = self::$prefix;
    self::$prefix .= '/' . trim($prefix, '/');
    call_user_func($callback);
    self::$prefix = $previous;
  }

  public static function get($uri, $action)
  {
    self::addRoute('GET', $uri, $action);
  }

  public static function post($uri, $action)
  {
    self::addRoute('POST', $uri, $action);
  }

  public static function put($uri, $action)
  {
    self::addRoute('PUT', $uri, $action);
  }

  public static function delete($uri, $action)
  {
    self::addRoute('DELETE', $uri, $action);
  }

  protected static function addRoute($method, $uri, $action)
  {
    $uri = trim(self::$prefix . '/' . trim($uri, '/'), '/');
    $uri = $uri === '' ? '/' : $uri;

    // Convert {id} to regex pattern
    $pattern = preg_replace('#\{([^}]+)\}#', '([^/]+)', $uri);
    $pattern = "#^{$pattern}$#";

    self::$routes[] = [
      'method' => $method,
      'uri' => $uri,
      'action' => $action,
      'pattern' => $pattern,
    ];
  }

  public static function dispatch()
  {
    $requestUri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $requestUri = $requestUri === '' ? '/' : $requestUri;
    $requestMethod = $_SERVER['REQUEST_METHOD'];

    foreach (self::$routes as $route) {
      if ($route['method'] === $requestMethod && preg_match($route['pattern'], $requestUri, $matches)) {
        array_shift($matches); // bỏ full match

        $action = $route['action'];

        if (is_callable($action)) {
          return call_user_func_array($action, $matches);
        }

        if (is_array($action) && count($action) === 2) {
          [$controller, $method] = $action;

          // Tự động require controller nếu chưa được load
          if (!class_exists($controller)) {
            $controllerPath = base_path(str_replace('\\', '/', $controller) . '.php');
            if (file_exists($controllerPath)) {
              require_once $controllerPath;
            }
          }

          return call_user_func_array([new $controller, $method], $matches);
        }

        // String: "Controller@method"
        if (is_string($action) && strpos($action, '@') !== false) {
          [$controller, $method] = explode('@', $action);
          $controller = 'App\\Controllers\\' . $controller;

          $controllerPath = base_path(str_replace('\\', '/', $controller) . '.php');
          if (file_exists($controllerPath)) {
            require_once $controllerPath;
          }

          return call_user_func_array([new $controller, $method], $matches);
        }
      }
    }

    // Nếu không tìm thấy route nào khớp, kiểm tra xem có view 404 không
    if (file_exists(view()->getViewPath('errors/404'))) {
      return view('errors/404');
    }

    // Nếu không tìm thấy route nào khớp, trả về 404
    http_response_code(404);
    echo "404 Not Found";
  }
}
