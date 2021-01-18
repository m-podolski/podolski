
<?php

return [
  'code' => 'de',
  'default' => true,
  'direction' => 'ltr',
  'locale' => 'de_DE.utf-8',
  'name' => 'Deutsch',
  'translations' => Yaml::decode(F::read(kirby()->root('languages').'/de.yml'))
];
