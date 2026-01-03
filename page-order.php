<?php
/* Template Name: Order Page */
get_header();

if (!get_field('order_enable')) {
  get_footer();
  exit;
}

$bg = get_field('order_bg_image');
?>

<main class="order">
  <section class="order-hero"
    <?php if ($bg && is_array($bg)): ?>
      style="background-image:url('<?php echo esc_url($bg['url']); ?>')"
    <?php endif; ?>
  >

    <div class="order-inner">

      <!-- STORE -->
      <div class="order-card order-store">
        <h1><?php echo esc_html(get_field('order_store_name')); ?></h1>
        <p><?php echo esc_html(get_field('order_store_address')); ?></p>
      </div>

      <!-- TYPES -->
      <div class="order-types">
        <?php
        $types = [
          ['label'=>'order_here_label','hours'=>'order_here_hours','icon'=>'order_here_icon'],
          ['label'=>'order_pickup_label','hours'=>'order_pickup_hours','icon'=>'order_pickup_icon'],
          ['label'=>'order_delivery_label','hours'=>'order_delivery_hours','icon'=>'order_delivery_icon'],
        ];

        foreach ($types as $t):
          $icon = get_field($t['icon']);
          $icon_url = '';

          if (is_array($icon) && !empty($icon['url'])) {
            $icon_url = $icon['url'];
          } elseif (is_numeric($icon)) {
            $icon_url = wp_get_attachment_image_url($icon, 'full');
          }
        ?>
          <div class="order-card order-type">
            <?php if ($icon_url): ?>
              <img src="<?php echo esc_url($icon_url); ?>" alt="">
            <?php endif; ?>
            <strong><?php echo esc_html(get_field($t['label'])); ?></strong>
            <span><?php echo esc_html(get_field($t['hours'])); ?></span>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- LINKS -->
      <div class="order-links">
        <?php
        $links = [
          ['label'=>'order_food_label','link'=>'order_food_link'],
          ['label'=>'order_drinks_label','link'=>'order_drinks_link'],
          ['label'=>'order_desserts_label','link'=>'order_desserts_link'],
          ['label'=>'order_about_label','link'=>'order_about_link'],
          ['label'=>'order_merch_label','link'=>'order_merch_link'],
        ];

        foreach ($links as $l):
          $text = get_field($l['label']);
          $link = get_field($l['link']);
          if (!$text) continue;

          $href = is_array($link) ? $link['url'] : $link;
        ?>
          <a class="order-link" href="<?php echo esc_url($href); ?>">
            <?php echo esc_html($text); ?>
            <span>›</span>
          </a>
        <?php endforeach; ?>
      </div>

    </div>
  </section>
</main>

<?php get_footer(); ?>
