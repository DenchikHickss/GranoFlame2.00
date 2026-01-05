<?php
/*
Template Name: Food Menu
*/
get_header('food-menu');
?>

<main class="food-menu">

<?php
$parent_category = get_term_by('slug', 'salty-food', 'product_cat');

if ( ! $parent_category ) {
    echo '<p style="color:#fff">Category not found.</p>';
    get_footer();
    return;
}
?>

<!-- ===============================
     SALTY FOOD (PARENT)
================================ -->
<section class="food-category" id="salty-food">

    <h2 class="category-title">
        <?php echo esc_html($parent_category->name); ?>
    </h2>

    <?php
    $parent_query = new WP_Query([
        'post_type' => 'product',
        'posts_per_page' => -1,
        'tax_query' => [[
            'taxonomy' => 'product_cat',
            'field' => 'term_id',
            'terms' => $parent_category->term_id,
            'include_children' => false,
        ]]
    ]);
    ?>

    <?php if ($parent_query->have_posts()) : ?>
        <div class="food-grid">
            <?php while ($parent_query->have_posts()) :
                $parent_query->the_post();
                global $product;
                include get_template_directory() . '/template-parts/food-card.php';
            endwhile; wp_reset_postdata(); ?>
        </div>
    <?php endif; ?>

</section>

<!-- ===============================
     CHILD CATEGORIES
================================ -->
<?php
$child_categories = get_terms([
    'taxonomy' => 'product_cat',
    'parent' => $parent_category->term_id,
    'hide_empty' => true,
]);
?>

<?php foreach ($child_categories as $child) : ?>

<section class="food-category" id="<?php echo esc_attr($child->slug); ?>">

    <h2 class="category-title">
        <?php echo esc_html($child->name); ?>
    </h2>

    <?php
    $child_query = new WP_Query([
        'post_type' => 'product',
        'posts_per_page' => -1,
        'tax_query' => [[
            'taxonomy' => 'product_cat',
            'field' => 'term_id',
            'terms' => $child->term_id,
        ]]
    ]);
    ?>

    <?php if ($child_query->have_posts()) : ?>
        <div class="food-grid">
            <?php while ($child_query->have_posts()) :
                $child_query->the_post();
                global $product;
                include get_template_directory() . '/template-parts/food-card.php';
            endwhile; wp_reset_postdata(); ?>
        </div>
    <?php endif; ?>


</section>
<script>
document.addEventListener('DOMContentLoaded', () => {

    /* FOOD dropdown */
    const dropdown = document.querySelector('.food-dropdown');
    const toggle = document.querySelector('.food-dropdown__toggle');

    toggle.addEventListener('click', () => {
        dropdown.classList.toggle('open');
    });

    /* close dropdown on click */
    dropdown.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            dropdown.classList.remove('open');
        });
    });

    /* smooth scroll */
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (!target) return;

            e.preventDefault();
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        });
    });

});
</script>


<?php endforeach; ?>

</main>

<?php get_footer(); ?>
