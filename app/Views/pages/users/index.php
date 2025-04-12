<?php view()->start('content') ?>
<div class="container">
  <h2>Users list</h2>
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user): ?>
        <tr>
          <td><?= $user['name'] ?></td>
          <td><?= $user['email'] ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php view()->end() ?>

<?php view()->extend('layouts/app'); ?>