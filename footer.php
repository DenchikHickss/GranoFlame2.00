<?php
$has_acf = function_exists('get_field');

// шукаємо сторінку/запис з назвою як у тебе
$settings = get_page_by_title('footer landing-page', OBJECT, 'page');
if (!$settings) $settings = get_page_by_title('footer landing-page', OBJECT, 'post');

// якщо ти знаєш slug — можеш додати і його
if (!$settings) $settings = get_page_by_path('footer-landing-page', OBJECT, 'page');
if (!$settings) $settings = get_page_by_path('footer-landing-page', OBJECT, 'post');

$settings_id = $settings ? (int) $settings->ID : 0;

// дефолтні значення (щоб не було undefined)
$l_title = $l_high = $l_text = $l_1 = $l_2 = '';
$m_title = $addr = $email = '';
$r_title = $r_t1 = $r_t2 = '';

if ($has_acf && $settings_id) {
  $l_title = (string) get_field('footer_left_title', $settings_id);
  $l_high  = (string) get_field('footer_left_highlight', $settings_id);
  $l_text  = (string) get_field('footer_left_text', $settings_id);
  $l_1     = (string) get_field('footer_left_list_1', $settings_id);
  $l_2     = (string) get_field('footer_left_list_2', $settings_id);

  $m_title = (string) get_field('footer_middle_title', $settings_id);
  $addr    = (string) get_field('footer_address', $settings_id);
  $email   = (string) get_field('footer_email', $settings_id);

  $r_title = (string) get_field('footer_right_title', $settings_id);
  $r_t1    = (string) get_field('footer_right_text_1', $settings_id);
  $r_t2    = (string) get_field('footer_right_text_2', $settings_id);
}
?>

<footer class="site-footer">
  <div class="site-footer__inner">

    <?php if (!$has_acf): ?>
      <p class="footer-text">ACF is not active.</p>
    <?php elseif (!$settings_id): ?>
      <p class="footer-text">Footer settings page/post “footer landing-page” not found (publish it).</p>
    <?php else: ?>

      <div class="footer-col footer-col--left">
        <?php if ($l_title): ?><h3 class="footer-title"><?php echo esc_html($l_title); ?></h3><?php endif; ?>
        <?php if ($l_high): ?><p class="footer-highlight"><?php echo esc_html($l_high); ?></p><?php endif; ?>
        <?php if ($l_text): ?><p class="footer-text"><?php echo nl2br(esc_html($l_text)); ?></p><?php endif; ?>

        <?php if ($l_1 || $l_2): ?>
          <ul class="footer-list">
            <?php if ($l_1): ?><li><?php echo esc_html($l_1); ?></li><?php endif; ?>
            <?php if ($l_2): ?><li><?php echo esc_html($l_2); ?></li><?php endif; ?>
          </ul>
        <?php endif; ?>
      </div>

      <div class="footer-col footer-col--middle">
        <?php if ($m_title): ?><h3 class="footer-title"><?php echo esc_html($m_title); ?></h3><?php endif; ?>
        <?php if ($addr): ?><p class="footer-text"><?php echo nl2br(esc_html($addr)); ?></p><?php endif; ?>
        <?php if ($email): ?>
          <p class="footer-text footer-email">
            <a class="footer-email__link" href="mailto:<?php echo esc_attr($email); ?>">
              <?php echo esc_html($email); ?>
            </a>
          </p>
        <?php endif; ?>
      </div>

      <div class="footer-col footer-col--right">
        <?php if ($r_title): ?><h3 class="footer-title"><?php echo esc_html($r_title); ?></h3><?php endif; ?>
        <?php if ($r_t1): ?><p class="footer-text"><?php echo nl2br(esc_html($r_t1)); ?></p><?php endif; ?>
        <?php if ($r_t2): ?><p class="footer-text"><?php echo nl2br(esc_html($r_t2)); ?></p><?php endif; ?>
      </div>

    <?php endif; ?>

  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
