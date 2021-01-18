<?php

return function ($kirby, $page) {

$loginError = false;
// handle the form submission
// (not working because POST gets turned into GET?!)
// if ($kirby->request()->is('POST') && get('login')) {

if($username = get('username') and $password = get('password')) {

  try {
    if ($user) {
      $kirby->user($username)->login($password);
    }
    go('/application');

  } catch (Exception $e) {
    $loginError[] = 'fail';
  }
}

// Controller for hidden pages
if ($page->access()->exists()) {

  if (!($user = $kirby->user())) {
    go('home');
  }
}

return [
  'loginError'   => $loginError,
];

};
