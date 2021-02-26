
import {
  init as initNav,
} from '../snippets/navigation/navigation.js';
import {
  placeIcons,
} from '../snippets/icons/icon-iterator.js';
import {
  init as initContactForm,
} from '../snippets/forms/contactform.js';
import {
  app,
} from '../snippets/vue/vue-comp.js';

initNav();
placeIcons();
initContactForm();
app;
