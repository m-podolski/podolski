
<dl class="tax-info">

<?php if ($page->date()): ?>
  <dt class="tax-info-cat">
    <?= t('tax-info-published') ?>
  </dt>
  <dd class="tax-info-tag">
    <time datetime="<?= strftime ('%Y-%m-%d %H:%M:%S', $page->date()->toDate()) ?>">
      <?= strftime ('%A, %e. %B %G', $page->date()->toDate()) ?>
      <?= '&nbsp;' ?>
      <?= strftime ('%H:%M', $page->date()->toDate()) ?>
    </time>
  </dd>
<?php endif ?>

<?php if ($page->modified()): ?>
  <dt class="tax-info-cat">
    <?= t('tax-info-updated') ?>
  </dt>
  <dd class="tax-info-tag">
    <time datetime="<?= strftime ('%Y-%m-%d %H:%M:%S', $page->modified()) ?>">
      <?= strftime ('%A, %e. %B %G', $page->modified()) ?>
      <?= '&nbsp;' ?>
      <?= strftime ('%H:%M', $page->modified()) ?>
    </time>
  </dd>
<?php endif ?>

<?php $taxonomy = $page->taxonomy()->yaml()['tags']; ?>

<?php foreach ($taxonomy as $category => $tags): ?>

  <dt class="tax-info-cat">
    <?= $category ?>
  </dt>

  <?php if (is_array($tags)): ?>

    <dd class="tax-info-tag">
      <ul class="tax-info-list">
      <?php foreach ($tags as $index => $tag): ?>
        <?php if ($index === array_key_last($tags)): ?>
          <li class="tax-info-list-item"><?= ucfirst($tag) ?></li>
        <?php else: ?>
          <li class="tax-info-list-item"><?= ucfirst($tag) . ', ' ?></li>
        <?php endif ?>
      <?php endforeach ?>
      </ul>
    </dd>

  <?php else: ?>
    <dd class="tax-info-tag">
      <?= ucfirst($tags) ?>
    </dd>
  <?php endif ?>

<?php endforeach ?>

</dl>
