
<?php $footer = $pages->find('footer') ?>

<a href="#skip-target" class="button-tertiary button-top">
  <?= t("nav-top") ?>
</a>

<section class="contact-info">

  <span id="contactinfo-heading">
    <?= $footer->contactinfo_heading()->kirbytext() ?>
  </span>

  <ul class="contact-info-list" aria-labelledby="contactinfo-heading">
  <?php $contactinfo = $footer->contactinfo()->yaml() ?>
  <?php foreach($contactinfo as $contact => $entries): ?>

    <li class="contact-info-list-item">
      <strong class="contact"><?= $contact ?></strong>

      <ul class="contact-info-entry-list">
      <?php foreach ($entries as $entry => $data): ?>

        <?php if (is_array($data)): ?>

          <?php foreach ($data as $index => $item): ?>

            <?php if ($index === array_key_first($data)): ?>
            <li class="contact-info-entry-list-item">
              <?php if ($index === 'icon'): ?>
                <?= kirbytext($item) ?>
              <?php endif ?>
              <span class="contact-info-entry">
                <?= $entry ?>
              </span>
            <?php endif ?>
              <?php if ($index !== 'icon'): ?>
                <?= kirbytext($item) ?>
              <?php endif ?>
            <?php if ($index === array_key_last($data)): ?>
            </li>
            <?php endif ?>

          <?php endforeach ?>

        <?php else: ?>

          <li class="contact-info-entry-list-item">
            <span class="contact-info-entry">
              <?= $entry ?>
            </span>
            <?= kirbytext($data) ?>
          </li>

        <?php endif ?>

      <?php endforeach ?>
      </ul>
    </li>

  <?php endforeach ?>
  </ul>

</section>

<section class="footer-nav">

  <span id="navigation-heading">
    <?= $footer->navigation_heading()->kirbytext() ?>
  </span>

  <?php snippet('forms/login') ?>

  <nav aria-label="<?= t("nav-sec") ?>" class="nav-footer-sec">

  <?php if($footerMenu->isNotEmpty()): ?>
    <ul class="nav-footer-sec-list">
    <?php foreach($footerMenu as $page): ?>

      <li class="nav-item">
        <a href="<?= $page->url() ?>">
          <?= $page->menu() ?>
        </a>
      </li>

    <?php endforeach ?>
    </ul>

  <?php endif ?>

  </nav>

</section>

<section id="contact" class="contact-form">

  <span id="contactform-heading">
    <?= $footer->contactform_heading()->kirbytext() ?>
  </span>

  <?php snippet('forms/contactform') ?>

</section>

<p class="footline"><?= $footer->footline() ?></p>

<?php foreach($footer->files() as $file): ?>

  <?php if(substr($file->filename(), 0, 4) === "icon"): ?>
    <?= $file->read() ?>
  <?php endif ?>

<?php endforeach ?>
