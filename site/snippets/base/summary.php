
<?php if($page->summary()->isNotEmpty()): ?>

<section aria-label="<?= t('intro') ?>" class="intro">
    <?= $page->summary()->kirbytext() ?>
</section>

<?php endif ?>
