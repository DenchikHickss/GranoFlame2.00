<?php if ( ! isset($product) ) return; ?>

<div class="food-card">

    <div class="food-image">
        <?php echo $product->get_image('medium'); ?>
    </div>

    <h3 class="food-title"><?php the_title(); ?></h3>

    <div class="food-price">
        <?php echo wc_price( $product->get_price() ); ?>
    </div>

    <?php if ( get_field('food_desc') ) : ?>
        <p class="food-desc"><?php the_field('food_desc'); ?></p>
    <?php endif; ?>

    <?php if ( get_field('food_weight') ) : ?>
        <span class="food-weight"><?php the_field('food_weight'); ?> g</span>
    <?php endif; ?>

    <!-- SMALL ADD TO CART -->
  <a href="#"
   class="add_to_cart_button ajax_add_to_cart"
   data-product_id="<?php echo esc_attr( $product->get_id() ); ?>"
   data-product_sku="<?php echo esc_attr( $product->get_sku() ); ?>"
   rel="nofollow">
   add to cart
</a>
</div>
