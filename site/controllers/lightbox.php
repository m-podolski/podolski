<?php

return function ($pages, $page) {

$lightboxImages = $page
  ->images()
  ->filterBy('filename', '!^=', 'cover')
  ->sortBy('order', 'asc');

return [
  'lightboxImages'  => $lightboxImages,
];

};
