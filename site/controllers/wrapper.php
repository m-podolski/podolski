<?php

return function ($page) {

$wrapChildren = $page
  ->children()
  ->filter(function ($child) {
    return $child->mode()->value() === 'wrap';
  });

// initialize return variables with null to not cause error
// when collections are empty
$matterWrap = null;

if ($wrapChildren->isNotEmpty()) {

  $matterWrap = $page->matter()->toString();

  foreach ($wrapChildren as $child) {
    $matterWrap .= ' ' . $child->matter()->toString();
  }
  $matterWrap = preg_split('/\s+(?=#{2,4})/', $matterWrap, 0, PREG_SPLIT_NO_EMPTY);
}

return [
  'matterWrap'   => $matterWrap,
];

};
