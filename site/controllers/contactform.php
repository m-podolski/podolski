<?php

return function ($kirby, $page) {

// initialize variables
$alerts      = null;
$attachments = [];

if($kirby->request()->is('POST') && get('submit')) {

  // check the honeypot
  if(empty(get('website')) === false) {
    go($page->url());
    exit;
  }

  $data = [
    'adress'=> filter_var(get('adress'), FILTER_SANITIZE_FULL_SPECIAL_CHARS),
    'name'  => filter_var(get('name'), FILTER_SANITIZE_FULL_SPECIAL_CHARS),
    'org'   => filter_var(get('org'), FILTER_SANITIZE_FULL_SPECIAL_CHARS),
    'email' => filter_var(get('email'), FILTER_SANITIZE_EMAIL),
    'msg'   => filter_var(get('msg'), FILTER_SANITIZE_FULL_SPECIAL_CHARS),
    'files' => get('files')
  ];

  $rules = [
    'adress'=> ['required', 'match' => '/^(?:[a-zA-Z\u00c4-\u00df-\.\s]){2,30}$/'],
    'name'  => ['required', 'match' => '/^(?:[a-zA-Z\u00c4-\u00df-]{2,30}\s){1,3}(?:[a-zA-Z\u00c4-\u00df-]{2,30})$/'],
    'org'   => ['match' => '/^[a-zA-Z0-9\.-\u00c4-\u00df\s]{2,100}$/'],
    'email' => ['required', 'email'],
    'msg'   => ['required', 'minLength' => 25, 'maxLength' => 3000],
    'files' => ['filename']
  ];

  $messages = [
    'adress'=> t('cform-alerts-info'),
    'name'  => t('cform-alerts-info'),
    'org'   => t('cform-alerts-info'),
    'email' => t('cform-alerts-info'),
    'msg'   => t('cform-alerts-info'),
    'files' => t('cform-alerts-info')
  ];

  $allowedFileTypes = [
    'image/jpeg',
    'image/png',
    'image/gif',
    'application/pdf',
    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    'application/rtf',
    'application/vnd.oasis.opendocument.text',
    'text/plain',
    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    'text/csv',
    'application/vnd.oasis.opendocument.spreadsheet'
  ];

  // some of the data is invalid
  if($invalid = invalid($data, $rules, $messages)) {
    $alerts = $invalid;

    // get the uploads
    $uploads = $kirby->request()->files()->get('file');

    // we want no more than 10 files
    if (count($uploads) > 10) {
      $alerts[] = t('cform-files-count');
    }

    // loop through uploads and check if they are valid
    foreach ($uploads as $upload) {
      //  make sure there are no other errors
      if ($upload['error'] !== 0) {
        $alerts[] = t('cform-files-fail');
      } elseif ($upload['size'] > 5000000)  {
        $alerts[] = $upload['name'] . ' ' . t('cform-files-size');
      } elseif (in_array($upload['type'], $allowedFileTypes) === false) {
        $alerts[] = $upload['name'] . ' ' . t('cform-files-type');

      // all valid, try to rename the temporary file
      } else {
        $name     = $upload['tmp_name'];
        $tmpName  = pathinfo($name);
        // sanitize the original filename
        $filename = $tmpName['dirname']. '/'. F::safeName($upload['name']);

        if (rename($upload['tmp_name'], $filename)) {
          $name = $filename;
        }
        // add the files to the attachments array
        $attachments[] = $name;
      }
    }

  // the data is fine, let's send the email
  } else {
    try {
      $kirby->email([
        'template' => 'email',
        'from'     => 'contactform@web.de',
        'replyTo'  => $data['email'],
        'to'       => 'malte.podolski@web.de',
        'subject'  => esc($data['name']) . ' via Kontaktformular',
        'data'     => [
          'msg'   => esc($data['msg']),
          'sender' => esc($data['name'])
        ],
        'attachments' => $attachments
      ]);

    } catch (Exception $error) {
      if(option('debug')):
        $alerts['error'] = t('cform-alerts-fail') . ': <strong>' . $error->getMessage() . '</strong>';
      else:
        $alerts['error'] = t('cform-alerts-fail');
      endif;
    }

    // no exception occurred, let's send a success message
    if (empty($alerts) === true) {
      // $success = 'Your message has been sent, thank you. We will get back to you soon!<br> To send a new message just reload the page.';
      $success = t('cform-success');
      $data = [];
    }
  }
}

return [
  'alerts'       => $alerts,
  'data'         => $data ?? false,
  'success'      => $success ?? false,
];

};
