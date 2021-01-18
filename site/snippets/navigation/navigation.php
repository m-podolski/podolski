
<a href="#skip-target" class="skip-link"><?= t('nav-skip') ?></a>

<?php
$menuPages = $pages->listed();
if($menuPages->isNotEmpty()):
?>
<nav aria-label="<?= t('nav-pri') ?>" class="nav-pri">

  <button type="button" id="menu-btn" class="nav-button-menu">
    <?= t('nav-btn') ?>
  </button>

  <ul class="nav-pri-list" aria-labelledby="menu-btn">

    <?php foreach($menuPages as $menuPage): ?>
    <li class="nav-item">
      <a href="<?= $menuPage->url() ?>" class="nav-link <?php e($menuPage->isOpen(), 'active') ?>">
        <?= $menuPage->menu() ?>
      </a>
    </li>
    <?php endforeach ?>

    <?php $applPage = $pages->find('application') ?>
    <li class="nav-item">
      <a href="<?= $applPage->url() ?>" class="nav-link <?php e($applPage->isOpen(), 'active') ?>">
        <?= $applPage->menu() ?>
      </a>
    </li>

    <?php if ($user = $kirby->user()): ?>

      <?php $applPage = $pages->find('application') ?>
      <li class="nav-item">
        <a href="<?= $applPage->url() ?>" class="nav-link <?php e($applPage->isOpen(), 'active') ?>">
          <?= $applPage->menu() ?>
        </a>
      </li>

      <li class="nav-item">
        <a href="<?= url('logout') ?>" class="nav-link">Logout</a>
      </li>

    <?php endif ?>

    <li class="nav-item">
      <a href="#contact" class="nav-link">
        <?= t('contact') ?>
      </a>
    </li>

  </ul>

</nav>
<?php endif ?>
