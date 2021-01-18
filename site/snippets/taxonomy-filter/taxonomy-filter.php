
<?php if ($taxonomies !== null): ?>

<a href="#skip-tax-filter-target" class="skip-link">
  <?= t('tax-filter-skip') ?>
</a>

<dl class="tax-filter" aria-labelledby="label-tax-filter">

  <div id="label-tax-filter" class="label-tax-filter">
    <?= t('tax-filter-label') ?>
  </div>

    <?php foreach($taxonomies as $category => $tags): ?>

      <dt class="tax-filter-cat">
        <button type="button" class="tax-filter-cat-btn">
          <?= $category ?>
        </button>
      </dt>

      <dd>
        <ul class="tax-filter-taglist tax-filter-taglist-closed">
        <?php foreach($tags as $tag): ?>

          <li class="tax-filter-taglist-item">
            <button type="button" class="tax-filter-tag-btn" data-taxtag="<?= $tag ?>">
              <?= $tag ?>
            </button>
          </li>

        <?php endforeach ?>
        </ul>
      </dd>

    <?php endforeach ?>

</dl>
<span id="skip-tax-filter-target" aria-label="<?= t('tax-filter-skip-target') ?>"></span>

<?php endif ?>
