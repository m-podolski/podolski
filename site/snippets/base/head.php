
<meta charset="utf-8">
<title><?= $page->title() ?> | <?= $site->title() ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="canonical" href="<?= $page->url() ?>" />
<meta name="robots" content="index, follow">
<meta name="description" content="<?= $page->description() ?>">

<meta property="og:type" content="article">
<meta property="og:title" content="<?= $page->title() ?>">
<meta property="og:url" content="<?= $page->url() ?>">
<meta property="og:site_name" content="<?= $site->title() ?>">
<meta property="og:description" content="<?= $page->description() ?>">
<!-- og:image in templates -->

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= $page->title() ?>">
<meta name="twitter:description" content="<?= $page->description() ?>">
<!-- twitter:image in templates -->

<meta name="application-name" content="<?= $site->title() ?>">
<meta name="theme-color" content="#f3eeec">
<meta name="msapplication-TileColor" content="#0045e6">
<meta name="msapplication-navbutton-color" content="#0045e6">

<?= js('@auto', ['type' => 'module']) ?>
<?= js('assets/vendor/vue/vue.js') ?>
<?= css('assets/vendor/normalize.css/normalize.css') ?>
<?= css('@auto') ?>

<link rel="manifest" href="manifest.webmanifest">
<link rel="icon" sizes="192x192" href="assets/icon.png">
<link rel="apple-touch-icon" href="assets/ios-icon.png">
<link rel="shortcut icon" href="assets/favicon.ico">
<link rel="icon" type="image/png" sizes="192x192" href="assets/icon.png">
<link rel="apple-touch-icon" type="image/png" sizes="192x192" href="assets/icon.png">
