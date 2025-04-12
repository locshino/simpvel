<!doctype html>
<html lang="en" class="h-100">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= env('APP_NAME') ?></title>
  <meta name="description" content="Simpvel - A simple and elegant PHP framework.">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="<?= base_url("vendor/bootstrap-5.3.5/dist/css/bootstrap.min.css") ?>">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    /*
 * Globals
 */


    /* Custom default button */
    .btn-secondary,
    .btn-secondary:hover,
    .btn-secondary:focus {
      color: #333;
      text-shadow: none;
      /* Prevent inheritance from `body` */
    }


    /*
 * Base structure
 */

    body {
      text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
      box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5);
    }

    .cover-container {
      max-width: 42em;
    }


    /*
 * Header
 */

    .nav-masthead .nav-link {
      padding: .25rem 0;
      font-weight: 700;
      color: rgba(255, 255, 255, .5);
      background-color: transparent;
      border-bottom: .25rem solid transparent;
    }

    .nav-masthead .nav-link:hover,
    .nav-masthead .nav-link:focus {
      border-bottom-color: rgba(255, 255, 255, .25);
    }

    .nav-masthead .nav-link+.nav-link {
      margin-left: 1rem;
    }

    .nav-masthead .active {
      color: #fff;
      border-bottom-color: #fff;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
</head>

<body class="d-flex h-100 text-center text-white bg-dark">

  <div class="cover-container w-100 h-100 p-3 mx-auto">
    <header class="mb-3">
      <div>
        <h3 class="float-md-start mb-0">Simpvel</h3>
        <nav class="nav nav-masthead justify-content-center float-md-end">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
          <a class="nav-link" href="<?= base_url('/users') ?>">Users</a>
        </nav>
      </div>
    </header>

    <main class="container p-3">
      <img src="<?= base_url('img/dollar-symbol-white.png') ?>" alt="logo" class="img-fluid mb-4" width="200" height="200">
      <h1>Simpvel</h1>
      <p class="lead">Simpvel is a simple PHP-based web application designed to manage users. This manual will guide you through the setup, configuration, and usage of the Simpvel application.</p>
      <p class="lead">
        <a href="#" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Learn more</a>
      </p>
    </main>
  </div>
</body>

</html>