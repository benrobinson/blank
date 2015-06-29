<?php // Single Post

$data = Timber::get_context();
$data['post'] = new TimberPost();
Timber::render(array('single-' . $post->post_type, 'single.twig'), $data);