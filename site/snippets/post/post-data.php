
<?php $imageFile = "cover-" . $page->dirname() . ".jpg" ?>

<?php $payload = [

  '@context' => 'https://schema.org',
  '@type' => 'NewsArticle',
  'headline' => $page->heading()->value(),
  'image' => $page->image($imageFile)->url(),
  'datePublished' => strftime ('%Y-%m-%d %H:%M:%S', $page->date()->toDate()),
  'dateModified' => strftime ('%Y-%m-%d %H:%M:%S', $page->modified())

]; ?>

<?= '<script type="application/ld+json">' ?>
  <?= json_encode($payload) ?>
<?= '</script>' ?>

