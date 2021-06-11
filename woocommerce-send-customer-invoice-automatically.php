<?php
/*
  Plugin Name: Send Customer Invoice Automatically
  Author: Marc Lindenbach
  Description: When an order's status is changed to "Invoice" the "Email Customer Invoice" email is triggered.
*/

function marc_send_invoice_automatically($order_id, $old_status, $new_status) {
  if ($new_status === 'invoice') {
    WC()->mailer()->emails['WC_Email_Customer_Invoice']->trigger($order_id);
  }
}
add_action('woocommerce_order_status_changed', 'marc_send_invoice_automatically', 10, 3);

?>
