<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?= env('APP_NAME') ?></title>

  <link rel="stylesheet" href="<?= base_url("vendor/bootstrap-5.3.5/dist/css/bootstrap.min.css") ?>">
</head>

<body>
  <div class="container">
    <h1 class="text-center">Simpvel App</h1>
    <?php view()->include('_flash') ?>


    <?php view()->section('content') ?>
  </div>

  <script src="<?= base_url("vendor/bootstrap-5.3.5/dist/js/bootstrap.bundle.min.js") ?>"></script>
</body>

</html>