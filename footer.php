<footer>
    <p>Footer works</p>
</footer>

<?php wp_footer(); ?>
<a href="<?php echo wc_get_cart_url(); ?>" class="sticky-cart">
    <span class="cart-icon">👜</span>
    <span class="cart-count">
        <?php echo WC()->cart->get_cart_contents_count(); ?>
    </span>
</a>

</body>
</html>
