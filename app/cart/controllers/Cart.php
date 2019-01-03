<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Cart extends Plab_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->library('cart');
  }

  /**
   * View shopping cart
   *
   * @method index
   * @return [type] [description]
   */
  public function index()
  {
    print_r($this->cart->contents());

  }


  public function insert()
  {
    $item = [
      'id' => 1,
      'name' => 'A4 Staple Booklet',
      'price' => 5.32,
      'qty' => 1,
      'options' => [
        15 => ['optionID' => 7],
        5 => ['optionID' => 3],
      ],
    ];

    /* TODO: sort option chosen */

    $this->cart->insert($item);

    print_r($this->cart->contents());

    /*
    JAN 3 Milestone
    1. AJAX controller
    2. improve item attribute, variant, option, price, delivery
    3. finalize Shopping Cart & Checkout
    */
  }

  private function _sync_cart()
  {

  }

}
