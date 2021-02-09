<?php

/**
 * The config file is optional. It accepts a return array with config options
 * Note: Never include more than one return statement, all options go within this single return array
 * All config options: https://getkirby.com/docs/reference/system/options
 */

return [
  'api' => [
    'basicAuth'   => true
  ],
  'auth'          => [
  'trials'        => 10,
  'timeout'       => 3600
  ],
  'content'       => [
    'extension'   => 'md'
  ],
  'date.handler'  => 'strftime',
  'debug'         => true,
  'languages'     => true,
  'markdown'      => [
    'extra'       => true
  ],
  // 'smartypants'   => true,
  'routes'        => [
    [
      'pattern'   => 'logout',
      'action'    => function() {

        if ($user = kirby()->user()) {
          $user->logout();
        }
        go('/home');
      }
    ]
  ]
];
