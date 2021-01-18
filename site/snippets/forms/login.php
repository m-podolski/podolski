
<form method="post" action="<?= $page->url() ?>" id="login" class="form loginform" novalidate>

  <label for="email"><?= t('lform-user') ?></label>
  <input type="email" id="username" name="username" value="<?= esc(get('email')) ?>">

  <label for="password"><?= t('lform-password') ?></label>
  <input type="password" id="password" name="password" value="<?= esc(get('password')) ?>">

  <p class="error-info <?= isset($loginError['fail']) ? 'error' : 'noerror' ?>">
    <?= t('lform-err') ?>
  </p>

  <button formmethod="post" type="submit" name="login" class="button-tertiary button-submit">
    <?= t('lform-submit') ?>
  </button>

</form>
