<!doctype html>
<html lang="<?= t('lang', 'de') ?>">

<head>
  <?php snippet('base/head') ?>
  <?php snippet('base/meta-image-project-post') ?>
  <?php snippet('post/post-data') ?>
</head>

<body class="template-<?= $page->template() ?> page-<?= $page->uid() ?>">

<?php snippet('navigation/navigation') ?>

<header id="skip-target" class="landmark header">
  <?php snippet('post/post-header') ?>
  <?php snippet('taxonomy-info/taxonomy-info') ?>
</header>

<?= file_get_contents('assets/svg/header-form.svg') ?>

<article class="landmark main">
  <section class="content-h2">
    <?= $page->matter()->kirbytext() ?>
  </section>
  <?php snippet('pagination/pagination') ?>
</article>

<footer class="landmark footer">
  <?php snippet('footer/footer') ?>
</footer>

</body>
</html>
