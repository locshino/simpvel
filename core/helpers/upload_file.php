<?php

if (!function_exists('upload_file')) {
  /**
   * Upload một file lên thư mục chỉ định.
   *
   * @param array $file File từ $_FILES['your_input_name']
   * @param string $path Thư mục lưu trữ (tính từ thư mục gốc)
   * @param array $options ['keep_name' => bool, 'allowed' => array, 'prefix' => string]
   * @return string|false Trả về đường dẫn tới file hoặc false nếu thất bại
   * 
   * @example
   * $filePath = upload_file($_FILES['avatar'], 'public/uploads/avatars', [
   *   'allowed' => ['image/jpeg', 'image/png'],
   *   'prefix' => 'user_',
   *   'keep_name' => false
   * ]);
   */
  function upload_file(array $file, string $path, array $options = [])
  {
    if (!isset($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
      return false;
    }

    // Mặc định cho phép jpg, png, jpeg, gif, pdf
    $allowed = $options['allowed'] ?? ['image/jpeg', 'image/png', 'image/gif', 'application/pdf'];
    if (!in_array($file['type'], $allowed)) {
      return false;
    }

    // Tạo thư mục nếu chưa có
    $uploadDir = rtrim(base_path($path), '/') . '/';
    if (!is_dir($uploadDir)) {
      mkdir($uploadDir, 0755, true);
    }

    // Đặt tên file
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $prefix = $options['prefix'] ?? '';
    $keepName = $options['keep_name'] ?? false;

    $fileName = $keepName
      ? $prefix . basename($file['name'])
      : $prefix . uniqid() . '.' . $extension;

    $targetPath = $uploadDir . $fileName;

    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
      return $targetPath;
    }

    return false;
  }
}
