
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

  <?php foreach ($tabs as $tab): ?>
  <section class="tab-panel tab-panel-<?= $tab->uid() ?> tab-panel-closed" data-tab="<?= $tab->uid() ?>" id="<?= $tab->uid() ?>" role="tabpanel" aria-labelledby="tab-<?= $tab->uid() ?>">

    <div class="tab-panel-wrapper">
      <?= $tab->matter()->kirbytext() ?>

      <?php if ($tab->mode()->value() === 'files'): ?>
        <table>
          <thead>
            <tr>
              <th scope="col"><?= t('tabs-files-file') ?></th>
              <th scope="col"><?= t('tabs-files-modified') ?></th>
              <th scope="col"><?= t('tabs-files-size') ?></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($tab->files() as $file): ?>
            <tr>
              <td>
                <a href="<?= $file->url() ?>" target="_blank">
                  <?= $file->filename() ?>
                </a>
              </td>
              <td>
                <?= date('d.m.Y G:i', $file->modified()) ?>
                <?= t('tabs-files-time') ?></td>
              <td><?= number_format($file->size() / 1048576, 2, "." , "," ) ?> MB</td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      <?php endif ?>

    </div>
    <a href="#tab-list" class="button-secondary">
      <?= t('tabs-top') ?>
    </a>

  </section>
  <?php endforeach ?>

<?php endif ?>
