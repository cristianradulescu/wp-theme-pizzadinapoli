<?php

function pizzadinapoli_woocommerce_default_address_fields($fields)
{
//  $fields = array(
//			'country' 	=> array(
//				'type'			=> 'country',
//				'label' 		=> __( 'Country', 'woocommerce' ),
//				'required' 		=> true,
//				'class' 		=> array( 'form-row-wide', 'address-field', 'update_totals_on_change' ),
//				),
//			'first_name' => array(
//				'label' 		=> __( 'First Name', 'woocommerce' ),
//				'required' 		=> true,
//				'class'			=> array( 'form-row-first' ),
//				),
//			'last_name' => array(
//				'label' 		=> __( 'Last Name', 'woocommerce' ),
//				'required' 		=> true,
//				'class' 		=> array( 'form-row-last' ),
//				'clear'			=> true
//				),
//			'company' 	=> array(
//				'label' 		=> __( 'Company Name', 'woocommerce' ),
//				'class' 		=> array( 'form-row-wide' ),
//				),
//			'address_1' 	=> array(
//				'label' 		=> __( 'Address', 'woocommerce' ),
//				'placeholder' 	=> _x( 'Street address', 'placeholder', 'woocommerce' ),
//				'required' 		=> true,
//				'class' 		=> array( 'form-row-wide', 'address-field' ),
//				),
//			'address_2' => array(
//				'placeholder' 	=> _x( 'Apartment, suite, unit etc. (optional)', 'placeholder', 'woocommerce' ),
//				'class' 		=> array( 'form-row-wide', 'address-field' ),
//				'required' 	    => false
//				),
//			'city' 		=> array(
//				'label' 		=> __( 'Town / City', 'woocommerce' ),
//				'placeholder'	=> __( 'Town / City', 'woocommerce' ),
//				'required' 		=> true,
//				'class' 		=> array( 'form-row-wide', 'address-field' ),
//				),
//			'state' 	=> array(
//				'type'			=> 'state',
//				'label' 		=> __( 'State / County', 'woocommerce' ),
//				'placeholder' 	=> __( 'State / County', 'woocommerce' ),
//				'required' 		=> true,
//				'class' 		=> array( 'form-row-first', 'address-field' )
//				),
//			'postcode' 	=> array(
//				'label' 		=> __( 'Postcode / Zip', 'woocommerce' ),
//				'placeholder' 	=> __( 'Postcode / Zip', 'woocommerce' ),
//				'required' 		=> true,
//				'class'			=> array( 'form-row-last', 'address-field' ),
//				'clear'			=> true
//				),
//		);

  // remove unwanted fields
  unset($fields['country']);
  unset($fields['company']);
  unset($fields['postcode']);

  // change some fields
  $fields['city']['label'] = 'Oraș';
  $fields['city']['placeholder'] = 'Craiova';
  $fields['city']['default'] = 'Craiova';
  $fields['city']['custom_attributes']['readonly'] = 'readonly';

  $fields['state']['label'] = 'Județ';
  $fields['state']['placeholder'] = 'Dolj';
  $fields['state']['default'] = 'Dolj';
  $fields['state']['custom_attributes']['readonly'] = 'readonly';

  $fields['address_1']['placeholder'] = '';
  $fields['address_2']['placeholder'] = '';


  return $fields;
}
add_filter('woocommerce_default_address_fields', 'pizzadinapoli_woocommerce_default_address_fields', 1);


function pizzadinapoli_woocommerce_locate_template($template, $template_name) {

  if ($template_name != 'cart/cart-empty.php') {
    remove_filter('woocommerce_locate_template', 'pizzadinapoli_woocommerce_locate_template', 10);

    return woocommerce_locate_template($template_name);
  }


  // Look within passed path within the theme - this is priority
	$template = dirname(__FILE__) . '/templates/' . $template_name;

	// Return what we found
	return $template;
}
add_filter('woocommerce_locate_template', 'pizzadinapoli_woocommerce_locate_template', 10, 2);