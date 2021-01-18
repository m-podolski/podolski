
<?php

Kirby::plugin('mpod/kirbytags', [
  'tags' => [
    'button' => [
      'attr' => [
        'link',
        'rel',
        'style',
        'role',
        'title',
        'target'
      ],
      'html' => function($tag) {
        return
          '<div class="button-container">' .
          Html::a($tag->link, $tag->value, [
            'rel'    => $tag->rel,
            'class'  => 'button-' . $tag->style,
            'role'   => $tag->role,
            'title'  => $tag->title,
            'target' => $tag->target,
          ]) .
          '</div>';
      }
    ]
  ]
]);
