<!doctype html>
<html lang="<?= t('lang', 'de') ?>">

<head>
  <?php snippet('base/head') ?>
  <?php snippet('base/meta-image-site') ?>
</head>

<body class="template-<?= $page->template() ?> page-<?= $page->uid() ?>">

<?php snippet('navigation/navigation') ?>

<header id="skip-target" class="landmark header">
  <?= $page->heading()->kirbytext() ?>
  <?php snippet('base/subheading') ?>
</header>

<?= file_get_contents('assets/svg/header-form.svg') ?>

<main class="landmark main">
  <section class="content-h2">
    <?= $page->matter()->kirbytext() ?>
  </section>
</main>

<footer class="landmark footer">
  <?php snippet('footer/footer') ?>
</footer>

</body>
</html>
