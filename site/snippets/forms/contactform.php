
<?php $success = false ?>

<?php if($success): ?>

<div class="alert success">
  <p><?= $success ?></p>
</div>

<?php else: ?>

<?php if (isset($alerts['error'])): ?>
  <div><?= $alerts['error'] ?></div>
<?php endif ?>

<form method="post" action="<?= $page->url() ?>" enctype="multipart/form-data" class="form contactform">

  <div class="honeypot">
    <label for="website">Website <abbr title="required">*</abbr></label>
    <input type="website" id="website" name="website" tabindex="-1" class="honey">
  </div>

  <label for="adress">
    <?= t('cform-adress') ?> <abbr title="required">*</abbr>
  </label>
  <input type="text" id="adress" name="adress" value="<?= $data['adress'] ?? '' ?>" placeholder="<?= t('cform-adress-ph') ?>" pattern="^(?:[a-zA-Z\u00c4-\u00df-\.\s]){2,30}$" required>

  <p class="error-info <?= isset($alerts['adress']) ? 'error' : 'noerror' ?>">
    <?= isset($alerts['adress']) ? $alerts['adress'] . '<br>' : '' ?>
    <?= t('cform-adress-err') ?>
  </p>


  <label for="name">
    <?= t('cform-name') ?> <abbr title="required">*</abbr>
  </label>
  <input type="text" id="name" name="name" value="<?= $data['name'] ?? '' ?>" placeholder="<?= t('cform-name-ph') ?>" pattern="^(?:[a-zA-Z\u00c4-\u00df-]{2,30}\s){1,3}(?:[a-zA-Z\u00c4-\u00df-]{2,30})$" required>

  <p class="error-info <?= isset($alerts['name']) ? 'error' : 'noerror' ?>">
    <?= isset($alerts['name']) ? $alerts['name'] . '<br>' : '' ?>
    <?= t('cform-name-err') ?>
  </p>

  <label for="organisation">
    <?= t('cform-org') ?>
  </label>
  <input type="text" id="organisation" name="organisation" value="<?= $data['organisation'] ?? '' ?>" placeholder="<?= t('cform-org-ph') ?>" pattern="^[a-zA-Z0-9\.-\u00c4-\u00df\s]{2,100}$">

  <p class="error-info <?= isset($alerts['org']) ? 'error' : 'noerror' ?>">
    <?= isset($alerts['org']) ? $alerts['org'] . '<br>' : '' ?>
    <?= t('cform-org-err') ?>
  </p>

  <label for="email">
    <?= t('cform-email') ?> <abbr title="required">*</abbr>
  </label>
  <input type="email" id="email" name="email" value="<?= $data['email'] ?? '' ?>" placeholder="<?= t('cform-email-ph') ?>" required>

  <p class="error-info <?= isset($alerts['email']) ? 'error' : 'noerror' ?>">
    <?= isset($alerts['email']) ? $alerts['email'] . '<br>' : '' ?>
    <?= t('cform-email-err') ?>
  </p>

  <label for="msg">
    <?= t('cform-msg') ?> <abbr title="required">*</abbr>
  </label>
  <textarea id="msg" name="msg" rows="10" minlength="25" maxlength="3000" required><?= $data['msg']?? '' ?></textarea>

  <p class="error-info <?= isset($alerts['msg']) ? 'error' : 'noerror' ?>">
    <?= isset($alerts['msg']) ? $alerts['msg'] . '<br>' : '' ?>
    <?= t('cform-msg-err') ?>
  </p>

  <label for="file"><?= t('cform-upload') ?><br>
    <span class="help"><?= t('cform-upload-info') ?></span>
  </label>
  <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
  <input name="file[]" type="file" accept="image/*,.pdf,.docx,.rtf,.odt,.md,.txt,.xlsx,.csv,.ods" multiple>

  <p class="error-info <?= isset($alerts['files']) ? 'error' : 'noerror' ?>">
    <?= isset($alerts['files']) ? $alerts['files'] . '<br>' : '' ?>
    <?= t('cform-files-err') ?>
  </p>

  <button type="submit" name="submit" value="Submit" class="button-tertiary button-submit" autocomplete="off">
    <?= t('cform-submit') ?>
  </button>

</form>

<?php endif ?>
