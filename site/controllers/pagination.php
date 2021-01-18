<?php

return function ($pages) {

$blogPosts = $pages
  ->find('correction-loop-blog')
  ->children()
  ->sortBy('date', 'desc');

return [
  'blogPosts'    => $blogPosts
];

};
