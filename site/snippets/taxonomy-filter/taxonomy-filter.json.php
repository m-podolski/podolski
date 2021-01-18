<?php

$payload = [];

foreach ($taxChildren as $child) {

  $taxonomy = $child->taxonomy()->yaml()['tags'];
  $taxonomy = array_map('recUpper', $taxonomy);

  $childPayload = [

    'url' => $child->slug(),
    'tax' => $taxonomy
  ];
  array_push($payload, $childPayload);
};

$jsonObject = [
  'taxonomies' => $payload
];

echo json_encode($jsonObject);
