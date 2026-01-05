<?php
/*
Template Name: Landing Page
*/
get_header();

$has_acf = function_exists('get_field');

$lp_logo = $has_acf ? get_field('lp_logo') : null;

$menu = [
  ['label' => $has_acf ? get_field('lp_menu_1_label') : '', 'link' => $has_acf ? get_field('lp_menu_1_link') : null],
  ['label' => $has_acf ? get_field('lp_menu_2_label') : '', 'link' => $has_acf ? get_field('lp_menu_2_link') : null],
  ['label' => $has_acf ? get_field('lp_menu_3_label') : '', 'link' => $has_acf ? get_field('lp_menu_3_link') : null],
];

$lp_topline  = $has_acf ? get_field('_lp_topline') : '';
$lp_hero_img = $has_acf ? get_field('lp_hero_image') : null;

$lp_badge_1_icon = $has_acf ? get_field('lp_badge_1_icon') : null;
$lp_badge_1_text = $has_acf ? get_field('lp_badge_1_text') : '';
$lp_badge_2_icon = $has_acf ? get_field('lp_badge_2_icon') : null;
$lp_badge_2_text = $has_acf ? get_field('lp_badge_2_text') : '';

$lp_title   = $has_acf ? get_field('lp_title') : '';
$lp_content = $has_acf ? get_field('lp_content') : '';
$lp_quote   = $has_acf ? get_field('lp_quote') : '';

$lp_footer_left  = $has_acf ? get_field('lp_footer_left') : '';
$lp_footer_right = $has_acf ? get_field('lp_footer_right') : '';

function lp_href($link){
  if (is_array($link) && !empty($link['url'])) return $link['url'];
  if (is_string($link) && $link !== '') return $link;
  return '';
}
function lp_target($link){
  if (is_array($link) && !empty($link['target'])) return $link['target'];
  return '';
}
?>

<main class="lp">
  <section class="lp__frame">

    <?php if ($lp_topline): ?>
      <p class="lp-topline"><?php echo esc_html($lp_topline); ?></p>
    <?php endif; ?>

    <?php if (is_array($lp_hero_img) && !empty($lp_hero_img['url'])): ?>
      <div class="lp-hero">
        <img src="<?php echo esc_url($lp_hero_img['url']); ?>" alt="" loading="lazy">

        <?php
          $show_badge_1 = (is_array($lp_badge_1_icon) && !empty($lp_badge_1_icon['url'])) || !empty($lp_badge_1_text);
          $show_badge_2 = (is_array($lp_badge_2_icon) && !empty($lp_badge_2_icon['url'])) || !empty($lp_badge_2_text);
        ?>
        <?php if ($show_badge_1 || $show_badge_2): ?>
          <div class="lp-badges">
            <?php if ($show_badge_1): ?>
              <div class="lp-badge">
                <?php if (is_array($lp_badge_1_icon) && !empty($lp_badge_1_icon['url'])): ?>
                  <img class="lp-badge__icon" src="<?php echo esc_url($lp_badge_1_icon['url']); ?>" alt="">
                <?php endif; ?>
                <?php if ($lp_badge_1_text): ?>
                  <span class="lp-badge__text"><?php echo esc_html($lp_badge_1_text); ?></span>
                <?php endif; ?>
              </div>
            <?php endif; ?>

            <?php if ($show_badge_2): ?>
              <div class="lp-badge">
                <?php if (is_array($lp_badge_2_icon) && !empty($lp_badge_2_icon['url'])): ?>
                  <img class="lp-badge__icon" src="<?php echo esc_url($lp_badge_2_icon['url']); ?>" alt="">
                <?php endif; ?>
                <?php if ($lp_badge_2_text): ?>
                  <span class="lp-badge__text"><?php echo esc_html($lp_badge_2_text); ?></span>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <h1 class="lp-title"><?php echo esc_html($lp_title ?: get_the_title()); ?></h1>

    <?php if ($lp_content): ?>
      <div class="lp-content">
        <?php echo wp_kses_post($lp_content); ?>
      </div>
    <?php endif; ?>

    <?php if ($lp_quote): ?>
      <div class="lp-quote">
        <p><?php echo nl2br(esc_html($lp_quote)); ?></p>
      </div>
    <?php endif; ?>

    <?php if ($lp_footer_left || $lp_footer_right): ?>
      <footer class="lp-footer">
        <div class="lp-footer__col"><?php echo nl2br(esc_html($lp_footer_left)); ?></div>
        <div class="lp-footer__col"><?php echo nl2br(esc_html($lp_footer_right)); ?></div>
      </footer>
    <?php endif; ?>

  </section>
</main>

<script>
(function(){
  const wrap = document.querySelector('[data-lp-lang]');
  if (!wrap) return;
  const btn = wrap.querySelector('.lp-lang__btn');
  const menu = wrap.querySelector('.lp-lang__menu');
  if (!btn || !menu) return;

  function close(){
    wrap.classList.remove('is-open');
    btn.setAttribute('aria-expanded','false');
  }

  btn.addEventListener('click', (e) => {
    e.preventDefault();
    const open = wrap.classList.toggle('is-open');
    btn.setAttribute('aria-expanded', open ? 'true' : 'false');
  });

  document.addEventListener('click', (e) => {
    if (!wrap.contains(e.target)) close();
  });
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') close();
  });
})();
</script>
<footer class="lp-footer">
  <div class="lp-footer__inner">

    <div class="lp-footer__col">
      <h3 class="lp-footer__title">Support</h3>
      <p class="lp-footer__highlight">Help us keep this project alive</p>
      <p class="lp-footer__text">
        Your contribution supports recipes, guides, and practical content about everyday cooking.
      </p>
      <ul class="lp-footer__list">
        <li>MobilePay: 605340</li>
        <li>Bank transfer / card payment</li>
      </ul>
    </div>

    <div class="lp-footer__col">
      <h3 class="lp-footer__title">Contact</h3>
      <p class="lp-footer__text">
        Læderstræde 20<br>
        1201 Copenhagen<br>
        Denmark
      </p>
      <p class="lp-footer__text">
        <a class="lp-footer__link" href="mailto:info@granoflame.dk">info@granoflame.dk</a>
      </p>
    </div>

    <div class="lp-footer__col">
      <h3 class="lp-footer__title">About</h3>
      <p class="lp-footer__text">
        We share simple, reliable recipes and practical cooking notes — focused on comfort,
        clarity, and everyday ingredients.
      </p>
      <p class="lp-footer__text">
        Our goal is to turn small habits into better routines — one breakfast at a time.
      </p>
    </div>

  </div>
</footer>

<?php get_footer(); ?>
