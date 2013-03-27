<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<p><?php _e( 'Your cart is currently empty.', 'woocommerce' ) ?></p>

<?php do_action('woocommerce_cart_is_empty'); ?>

<form action="/comenzi-online" >
  <span class="art-button-wrapper      ">
    <span class="l"> </span>
    <span class="r"> </span>
    <button type="submit" class="button art-button">&larr; Înapoi la produse</button>
  </span>
</form>