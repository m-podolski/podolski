
<?php $previous_level = 1; ?>

<?php
function print_sections($prev_level, $level, $page_id, $matter) {

  if($prev_level === $level) {
    echo "</section>";
  }
  if($prev_level > $level) {
    echo "</section></section>";
  }
  echo "<section class=\"content content-h$level\">";
  echo kirbytext($matter);
  return $prev_level = $level;
}
?>

<?php if ($matterWrap !== null): ?>

  <?php foreach($matterWrap as $part): ?>

    <?php $level2 = substr($part, 0, 3) === "## "; ?>
    <?php $level3 = substr($part, 0, 4) === "### "; ?>
    <?php $level4 = substr($part, 0, 5) === "#### "; ?>

    <?php if($level2): ?>
      <?php $previous_level = print_sections($previous_level, 2, $page->uid(), $part) ?>
    <?php endif ?>

    <?php if($level3): ?>
      <?php $previous_level = print_sections($previous_level, 3, $page->uid(), $part) ?>
    <?php endif ?>

    <?php if($level4): ?>
      <?php $previous_level = print_sections($previous_level, 4, $page->uid(), $part) ?>
    <?php endif ?>

  <?php endforeach ?>

<?php endif ?>
