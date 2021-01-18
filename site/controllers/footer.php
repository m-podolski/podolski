<?php

return function ($pages, $page) {

$footerMenu = $pages
  ->filter(function ($page) {
    return $page->display()->value() === 'footer';
  });

return [
  'footerMenu'  => $footerMenu,
];

};
