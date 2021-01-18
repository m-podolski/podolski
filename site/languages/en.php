
<?php

return [
  'code' => 'en',
  'default' => false,
  'direction' => 'ltr',
  'locale' => 'en_US.utf-8',
  'name' => 'English',
  'translations' => Yaml::decode(F::read(kirby()->root('languages').'/en.yml'))
];
