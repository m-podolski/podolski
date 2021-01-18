<?php

return function ($page) {

$tabs = $page
  ->children()
  ->sortBy('order', 'asc')
  ->filter(function ($child) {
    return $child->display()->value() === 'tabs';
  });

return [
  'tabs'         => $tabs,
];

};
