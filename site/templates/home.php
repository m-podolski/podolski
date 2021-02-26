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

<?= F::read('assets/svg/header-form.svg') ?>

<main class="landmark main">
  <?php snippet('vue/vue') ?>
  <?php snippet('wrapper/wrapper') ?>

  <?php if ($file = $page->files()->find('illustration-telescope.svg')): ?>
    <?= $file->read() ?>
  <?php endif ?>

  <!-- {%- from '/cards/cards.html.twig' import createCard -%}

{%- set sectionClassPrefix = 'content-' -%}

{%- set regRepFind = ['(<h1>)', '(</h1>)', '(<hr />)', '(<strong>)'] -%}
{%- set regRepReplace = ['<h3>', '</h3>', '', '<strong class="home-subheading">'] -%}

<section  class="{{- sectionClassPrefix }}{{ page.header.type -}}">

    <h2>Sichten Sie mein Portfolio...</h2>

    <div class="content">
        {{- source('/assets/svg/illustration-telescope.svg') -}}
    </div>

    <section class="cards">

        {%- for p in page.find('/portfolio').children.order('date', 'desc') -%}
            {{- createCard(p) -}}
        {%- endfor -%}

    </section>

</section>

<section class="{{- sectionClassPrefix }}{{ page.header.type -}} card">

    <a href="{{- page.find('/working-method').url -}}">

        <h2>...Erfahren Sie wie ich arbeite...</h2>

        {{- page.find('/working-method').summary|regex_replace(regRepFind, regRepReplace) -}}
    </a>

</section>

<section class="{{- sectionClassPrefix }}{{ page.header.type -}} card">

    <h2>...oder lesen Sie meinen Blog</h2>

    {{- page.find('/correction-loop-blog').summary|regex_replace(regRepFind, regRepReplace) -}}

    {%- set b = page.find('/correction-loop-blog').children.order('date', 'desc')|first -%}

    <section class="cards">
        {{- createCard(b) -}}
    </section>

</section> -->

</main>

<footer class="landmark footer">
  <?php snippet('footer/footer') ?>
</footer>

</body>
</html>
