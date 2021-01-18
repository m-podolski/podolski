
<!-- Place svg icons to be inserted by icon-iterator.js -->

<?php foreach($page->files() as $file): ?>

  <?php if(substr($file->filename(), 0, 4) === "icon"): ?>

    <?= $file->read() ?>

  <?php endif ?>

<?php endforeach ?>
