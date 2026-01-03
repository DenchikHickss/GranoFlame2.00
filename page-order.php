<?php
/*
Template Name: Order Page
*/
get_header();
?>

<main class="order-page">

  <section class="order-hero">
    <h1>Order</h1>
    <p>Please fill in the form below to place your order.</p>
  </section>

  <section class="order-form">
    <form method="post">
      <label>
        Name
        <input type="text" name="name" required>
      </label>

      <label>
        Email
        <input type="email" name="email" required>
      </label>

      <label>
        Message
        <textarea name="message" rows="5"></textarea>
      </label>

      <button type="submit">Send order</button>
    </form>
  </section>

</main>

<?php get_footer(); ?>
