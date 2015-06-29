<?php // Single Page

$context = Timber::get_context();
$context['post'] = new TimberPost();
if ( is_front_page() ) {
  Timber::render(array('home.twig'), $context);
} else {
  Timber::render(array('page.twig'), $context);
}