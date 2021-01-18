
<p class="rubrication">
  <span class="rubrication-title">
    <?= $page->parent()->rubrication() ?>
  </span>
  <span class="rubrication-category">
    <?php $rubric = $page->taxonomy()->yaml()['tags'] ?>
    | <?= $rubric[array_key_first($rubric)] ?>
  </span>
</p>

<h1>
  <?= $page->heading() ?>
</h1>

<?php if($page->subheading()->isNotEmpty()): ?>
<p class="subheading-block">
  <strong class="subheading"><?= $page->subheading() ?></strong>
</p>
<?php endif ?>


