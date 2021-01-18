<?php

function mergeControllers($carry, $item) {

  if ($carry !== null) {
    $carry = a::merge($carry, $item);

  } else {
    $carry = $item;
  }

  return $carry;
}
