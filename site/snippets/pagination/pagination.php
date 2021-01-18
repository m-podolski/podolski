
<nav class="pagination" aria-label="<?= t('pagination-label') ?>">

<?php if ($page !== $blogPosts->first()): ?>

<?php $prevCover = $page->prev()->image("cover-" . $page->prev()->dirname() . ".jpg") ?>

<a href="<?= $page->prev()->url() ?>" rel="prev" class="pagination-panel" data-pagination="prev">

  <span class="pagination-linktext">
    <?= t('pagination-prev') ?>
  </span><br>
  <strong class="pagination-title">
    <?= $page->prev()->title() ?>
  </strong>
  <img src="<?= $prevCover->url() ?>" alt="<?= $prevCover->alt() ?>" class="pagination-img">

</a>

<?php endif ?>

<?php if ($page !== $blogPosts->last()): ?>

<?php $nextCover = $page->next()->image("cover-" . $page->next()->dirname() . ".jpg") ?>

<a href="<?= $page->next()->url() ?>" rel="next" class="pagination-panel" data-pagination="next">

  <span class="pagination-linktext">
    <?= t('pagination-next') ?>
  </span><br>
  <strong class="pagination-title">
    <?= $page->next()->title() ?>
  </strong>
  <img src="<?= $nextCover->url() ?>" alt="<?= $nextCover->alt() ?>" class="pagination-img">

</a>

<?php endif ?>

</nav>
