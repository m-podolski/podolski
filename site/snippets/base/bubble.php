
<?php
$pageName = $page->id();
$heroBubble = $page->file("bubble-$pageName.svg");

if($heroBubble) {
  echo $heroBubble->read();
}
