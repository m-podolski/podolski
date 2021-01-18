<!doctype html>
<html lang="<?= t('lang', 'de') ?>">

<head>
  <?php snippet('base/head') ?>
  <?php snippet('base/meta-image-project-post') ?>
</head>

<body class="template-<?= $page->template() ?> page-<?= $page->uid() ?>">

<nav>
  <a href="<?= $pages->find('portfolio')->url() ?>" class="button-primary button-close" aria-label="<?= t('nav-close') ?>">
    &#10006;
  </a>
</nav>

<header id="skip-target" class="landmark header">
  <h1 class="heading"><?= $page->heading() ?></h1>
</header>

<main class="landmark main">
  <?php snippet('lightbox/lightbox') ?>
  <?php snippet('taxonomy-info/taxonomy-info') ?>
  <section class="content-h2">
    <?= $page->matter()->kirbytext() ?>
  </section>
  <?php snippet('pagination/pagination') ?>
</main>

</body>
</html>
