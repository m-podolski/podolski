<?php

return function ($kirby, $pages, $page) {

  $controllers = [

    $kirby->controller('footer', compact('pages', 'page')),
    $kirby->controller('contactform', compact('kirby', 'page')),
    $kirby->controller('login', compact('kirby', 'page')),
    $kirby->controller('pagination', compact('pages')),
  ];

  return array_reduce($controllers, 'mergeControllers');
};
