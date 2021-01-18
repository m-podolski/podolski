<?php

return function ($kirby, $page) {

$taxChildren = $page
  ->children()
  ->filter(function ($child) {
    return $child->taxonomy()->exists();
  });

$taxonomies = null;

if ($taxChildren->isNotEmpty()) {

  $taxonomies = [];
  $cats = [];
  $tagColl = [];

  function recUpper($value) {

    if (is_array($value)) {
      return array_map('recUpper', $value);
    }
    $value = ucfirst($value);
    return $value;
  };


  foreach ($taxChildren as $child) {

    $taxonomy = $child->taxonomy()->yaml();

    foreach ($taxonomy['tags'] as $category => $tags) {

      if (isset($$category)) {

        $current = [$category => $tags];
        $$category = array_merge_recursive($$category, $current);

        if ($child->isLast($taxChildren)) {

          $$category = array_map('recUpper', $$category);

          $firstKey = array_key_first($$category);
          array_push($cats, $firstKey);

          $result = array_unique($$category[$firstKey]);
          array_push($tagColl, $result);

          $taxonomies = array_combine($cats, $tagColl);
        }
      } else {
        $$category = [$category => $tags];
      }
    }
  }
}

return [
  'taxChildren'  => $taxChildren,
  'taxonomies'   => $taxonomies,
];

};
