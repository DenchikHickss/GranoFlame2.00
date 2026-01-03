<?php
/*
Template Name: Food Page
*/
get_header();
?>

<main class="food-page">

<?php
$categories = get_terms([
  'taxonomy'   => 'product_cat',
  'hide_empty' => true,
]);

foreach ($categories as $cat):

  $products = wc_get_products([
    'status'   => 'publish',
    'limit'    => -1,
    'category' => [$cat->slug],
  ]);

  if (!$products) continue;
?>

<section class="food-section">

  <h2 class="food-category-title">
    <?php echo esc_html($cat->name); ?>
  </h2>

  <div class="food-grid">

  <?php foreach ($products as $product):

    $id     = $product->get_id();
    $price  = $product->get_price();
    $img_id = $product->get_image_id();
    $img    = $img_id ? wp_get_attachment_image_url($img_id, 'medium') : '';
    $desc   = get_field('food_desc', $id);
    $weight = get_field('food_weight', $id);
    $badge  = get_field('food_badge', $id);
  ?>

    <article class="food-card">

      <?php if ($img): ?>
        <div class="food-card-image">
          <img src="<?php echo esc_url($img); ?>" alt="">
        </div>
      <?php endif; ?>

      <div class="food-card-content">

        <h3 class="food-title">
          <?php echo esc_html($product->get_name()); ?>
        </h3>

        <div class="food-price">
          €<?php echo esc_html($price); ?>
        </div>

        <?php if ($badge): ?>
          <span class="food-badge food-badge--<?php echo esc_attr($badge); ?>">
            <?php echo esc_html(ucfirst($badge)); ?>
          </span>
        <?php endif; ?>

        <?php if ($desc): ?>
          <p class="food-desc"><?php echo esc_html($desc); ?></p>
        <?php endif; ?>

        <?php if ($weight): ?>
          <small class="food-weight"><?php echo esc_html($weight); ?></small>
        <?php endif; ?>

        <form method="post">
          <input type="hidden" name="add-to-cart" value="<?php echo esc_attr($id); ?>">
          <button type="submit" class="food-add">Add</button>
        </form>

      </div>

    </article>

  <?php endforeach; ?>

  </div>
</section>

<?php endforeach; ?>

</main>

<?php get_footer(); ?>
