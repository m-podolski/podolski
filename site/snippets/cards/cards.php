
<ul class="cards">
<?php foreach ($page->children()->sortBy('date', 'desc') as $child): ?>

  <li class="card">
    <a href="<?= $child->url() ?>" class="card-link">
      <div class="card-img-container">

      <?php $filename = "cover-" . $child->dirname() . ".jpg" ?>
      <?php $image = $child->image($filename) ?>

        <img class="card-img"
          srcset="<?= $image->srcset([300, 600, 900]) ?>"
          sizes="
            (min-width:130em) calc(((100vw - 9vmin)-((1.2rem + 1.5vmin) * 2.8)/ 5 )* 1.5),
            (min-width:90em) calc(((100vw - 9vmin)-((1.2rem + 1.5vmin) * 2.1)/ 4 )* 1.5),
            (min-width:60em) calc(((100vw - 9vmin)-((1.2rem + 1.5vmin) * 1.4)/ 3 )* 1.5),
            (min-width:40em) calc(((100vw - 9vmin)-((1.2rem + 1.5vmin) * 0.7)/ 2 )* 1.5),
            calc((100vw - 9vmin)* 1.5)"
          src="<?= $image->resize(400)->url() ?>"
          alt="<?= $image->alt_text() ?>">

      </div>
      <strong class="card-title"><?= $child->title() ?></strong>
      <p class="card-summary"><?= $child->summary() ?></p>
    </a>
  </li>

<?php endforeach ?>
</ul>

