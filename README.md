# blank

This is an extremely lightweight WordPress starter theme that uses Timber: https://github.com/jarednova/timber and my Micro CSS framework: https://github.com/pipbeard/micro

It is prepped to be populated with custom post types and generally expanded at will.

## A couple of notes

- Don't add styles to style.css -- this file is only for WordPress's use in identifying the name of the theme.  Change it to reflect the theme you build out of blank.
- Add your custom styles to scss/_custom.scss, then compile with `compass` or another SASS compiler.  The only active stylesheet (by default) is screen.css, which gets loaded inline to save you one HTTP request.
