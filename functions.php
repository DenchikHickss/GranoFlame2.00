<?php

function granoflame_assets() {
  wp_enqueue_style(
    'granoflame-style',
    get_template_directory_uri() . '/assets/style.css',
    [],
    '1.0'
  );
}

add_action('wp_enqueue_scripts', 'granoflame_assets');


/**
 * 3) Вивід SVG-іконок (без бібліотек, просто inline SVG)
 */
function gf_render_icon($key) {
  switch ($key) {
    case 'here':
      return '<svg width="34" height="34" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
        <path d="M12 2C8.1 2 5 5.1 5 9c0 5.2 7 13 7 13s7-7.8 7-13c0-3.9-3.1-7-7-7zm0 9.5c-1.4 0-2.5-1.1-2.5-2.5S10.6 6.5 12 6.5s2.5 1.1 2.5 2.5S13.4 11.5 12 11.5z"/>
      </svg>';

    case 'pickup':
      return '<svg width="34" height="34" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
        <path d="M12 2a4 4 0 0 0-4 4c0 1.9 1.3 3.4 3 3.9V22h2V9.9c1.7-.5 3-2 3-3.9a4 4 0 0 0-4-4z"/>
      </svg>';

    case 'delivery':
      return '<svg width="34" height="34" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
        <path d="M3 6h13v10H3V6zm14 3h3l1 2v5h-4V9zm-1 8a2 2 0 1 0 4 0h-4zM6 17a2 2 0 1 0 4 0H6z"/>
      </svg>';

    default:
      return '';
  }
}