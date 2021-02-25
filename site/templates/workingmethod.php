<!doctype html>
<html lang="<?= t('lang', 'de') ?>">

<head>
  <?php snippet('base/head') ?>
  <?php snippet('base/meta-image-site') ?>
</head>

<body class="template-<?= $page->template() ?> page-<?= $page->uid() ?>">

<?php snippet('navigation/navigation') ?>
<?php snippet('base/bubble') ?>

<header id="skip-target" class="landmark header">
  <?= $page->heading()->kirbytext() ?>
  <?php snippet('base/subheading') ?>
  <?php snippet('base/summary') ?>
</header>

<?= file_get_contents('assets/svg/header-form.svg') ?>

<main class="landmark main">
  <?php snippet('icons/icons') ?>
  <section class="content-h2">
    <?= $page->matter()->kirbytext() ?>
  </section>

  <?php if ($tabs): ?>

  <ul class="tab-list" role="tablist" id="tab-list">
    <?php foreach ($tabs as $tab): ?>

    <li class="tab-list-item" role="presentation">
      <a href="#<?= $tab->uid() ?>" class="tab" data-tab="<?= $tab->uid() ?>" role="tab">
        <?= $tab->icon()->kirbytext() ?>
        <h2 id="tab-<?= $tab->uid() ?>"><?= $tab->heading() ?></h2>
      </a>
    </li>

    <?php endforeach ?>
  </ul>

    <?php foreach ($page->children() as $child): ?>
    <section class="tab-panel tab-panel-<?= $tab->style() ?> tab-panel-closed" data-tab="<?= $child->uid() ?>" id="<?= $child->uid() ?>" role="tabpanel" aria-labelledby="tab-<?= $child->uid() ?>">

      <section class="content-h3">
        <?= $child->h3A()->kirbytext() ?>
        <section class="content-h4">
          <?= $child->h4A()->kirbytext() ?>
        </section>
        <section class="content-h4">
          <?= $child->h4B()->kirbytext() ?>
        </section>
        <section class="content-h4">
          <?= $child->h4C()->kirbytext() ?>
        </section>
        <section class="content-h4">
          <?= $child->h4D()->kirbytext() ?>
        </section>
      </section>
      <section class="content-h3">
        <?= $child->h3B()->kirbytext() ?>
      </section>
      <section class="content-h3">
        <?= $child->h3C()->kirbytext() ?>
      </section>

      <a href="#tab-list" class="button-secondary">
        <?= t('tabs-top') ?>
      </a>

    </section>
    <?php endforeach ?>

  <?php endif ?>

</main>

<footer class="landmark footer">
  <?php snippet('footer/footer') ?>
</footer>

</body>
</html>
