<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
$has_acf = function_exists('get_field');

/* ===== Detect Landing Page ===== */
$is_landing = is_page_template('page-landing.php');

/* ===== Header content ===== */
$logo = $has_acf ? get_field('lp_logo') : null;

$menu = [
  ['label' => $has_acf ? get_field('lp_menu_1_label') : '', 'link' => $has_acf ? get_field('lp_menu_1_link') : null],
  ['label' => $has_acf ? get_field('lp_menu_2_label') : '', 'link' => $has_acf ? get_field('lp_menu_2_link') : null],
  ['label' => $has_acf ? get_field('lp_menu_3_label') : '', 'link' => $has_acf ? get_field('lp_menu_3_link') : null],
];

function header_href($link){
  if (is_array($link) && !empty($link['url'])) return $link['url'];
  if (is_string($link) && $link !== '') return $link;
  return '';
}
function header_target($link){
  return is_array($link) && !empty($link['target']) ? $link['target'] : '';
}
?>

<header class="site-header <?php echo $is_landing ? 'site-header--landing' : ''; ?>">
  <div class="site-header__inner">

    <!-- LOGO -->
    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-header__logo">
      <?php
        if (is_array($logo) && !empty($logo['ID'])) {
          echo wp_get_attachment_image($logo['ID'], 'thumbnail');
        } else {
          echo '<span>Logo</span>';
        }
      ?>
    </a>

    <!-- MENU (Landing only) -->
    <?php if ($is_landing): ?>
      <nav class="site-header__nav">
        <?php foreach ($menu as $item):
          $label = $item['label'];
          $href  = header_href($item['link']);
          $tgt   = header_target($item['link']);
          if (!$label || !$href) continue;
        ?>
          <a class="site-pill"
             href="<?php echo esc_url($href); ?>"
             <?php echo $tgt ? 'target="'.esc_attr($tgt).'" rel="noopener"' : ''; ?>>
            <?php echo esc_html($label); ?>
          </a>
        <?php endforeach; ?>
      </nav>
    <?php endif; ?>

    <!-- ACTIONS -->
    <div class="site-header__actions">

      <!-- SEARCH ICON -->
      <button class="site-icon-btn" aria-label="Search">
        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="11" cy="11" r="7"></circle>
          <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
      </button>

      <!-- LANGUAGE -->
      <div class="site-lang">
        <button class="site-lang__btn">EN ▾</button>

        <div class="site-lang__menu">
          <?php if (function_exists('pll_the_languages')): ?>
            <?php pll_the_languages(['show_flags'=>0,'show_names'=>1]); ?>
          <?php else: ?>
            <a href="#">English</a>
            <a href="#">Danish</a>
          <?php endif; ?>
        </div>
      </div>

    </div>

  </div>
</header>
