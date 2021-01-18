
<section class="lightbox">

  <figure class="lightbox-content">

  <?php $image = $lightboxImages->first() ?>

    <img class="lightbox-image"
      srcset="<?= $image->srcset([300, 600, 900]) ?>"
      sizes="calc((100vw - 9vmin)* 1.5)"
      src="<?= $image->resize(400)->url() ?>"
      alt="<?= $image->alt_text() ?>">

    <button type="button" class="button-lightbox" aria-label="<?= t('lightbox-prev') ?>">
      &larr;
    </button>
    <button type="button" class="button-lightbox" aria-label="<?= t('lightbox-next') ?>">
      &rarr;
    </button>

    <figcaption class="lightbox-caption">
      <p> # <?= t('lightbox-counter') ?> # </p>
      <p><?= $image->desc() ?></p>
    </figcaption>

  </figure>

</section>
