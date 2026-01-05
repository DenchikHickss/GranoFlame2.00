<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class('food-menu-page'); ?>>

<header class="food-header">

    <!-- TOP ROW -->
    <div class="food-header__top">

        <!-- LOGO -->
        <a href="<?php echo home_url(); ?>" class="food-logo">
            <img 
                src="http://localhost:10073/wp-content/uploads/2026/01/Group-4.png"
                alt="Bakery logo"
                class="food-logo-img">
        </a>

        <!-- ACTIONS -->
        <div class="food-header__actions">
            <button class="header-btn header-search">🔍</button>
            <button class="header-btn header-lang">
                EN <span class="lang-arrow">⌄</span>
            </button>
        </div>

    </div>

    <!-- FOOD DROPDOWN -->
    <div class="food-header__category food-dropdown">
    <button class="food-dropdown__toggle">
        FOOD <span class="arrow">⌄</span>
    </button>

    <div class="food-dropdown__menu">
        <a href="#salty-food">Salty food</a>
        <a href="#morning-bites">Morning Bites</a>
        <a href="#bakery-specials">Bakery Specials</a>
    </div>
</div>
    <!-- SECTION TABS -->
   <nav class="food-header__tabs">
    <a href="#salty-food" class="tab active">Salty food</a>
    <a href="#morning-bites" class="tab">Morning Bites</a>
    <a href="#bakery-specials" class="tab">Bakery Specials</a>
</nav>


</header>
