<div class="container">
  <?php if ($msgs = flash('success')): ?>
    <?php foreach ($msgs as $msg): ?>
      <p class="alert alert-success"><?= $msg ?></p>
    <?php endforeach; ?>
  <?php endif; ?>
  <?php if ($msgs = flash('error')): ?>
    <?php foreach ($msgs as $msg): ?>
      <p class="alert alert-danger"><?= $msg ?></p>
    <?php endforeach; ?>
  <?php endif; ?>

  <?php clear_flash() ?>
</div>