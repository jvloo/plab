<?php
defined('BASEPATH') or exit('No direct script access allowed.');
// TODO: Set Guest ID
class Auth extends Plab_Controller
{
  private $_guest_id;

  public function __construct()
  {
    parent::__construct();

    // Set guest_id on user's browser.

  }

  public function index()
  {
    echo $this->_guest_id;
  }

  /**
   * Return Guest's Object
   *
   * @method is_guest
   * @return bool     [description]
   */
  public function guest()
  {
    $guest_id = $this->_guest_id;

    if ( ! empty($guest_id)) {

      return $guest;
    }

    return false;
  }

  /**
   * Return Guest ID
   *
   * @method is_guest
   * @return bool     [description]
   */
  public function guest_id()
  {
    $this->_guest_id = $this->input->cookie('GuestID');

    return $this->_guest_id;
  }

  /**
   * Set Guest ID
   * @access private
   * @param  int       $expiry        [description]
   * @param  bool      $force_renewal [description]
   */
  private function _set_guest_id($expiry = 31536000, $force_renewal = false)
  {
    if ( ! $this->input->cookie('GuestID') || $force_renewal === true) {
      $cookie_data = [
        'name'   => 'GuestID',
        'value'  => 'test',
        'expire' => $expiry,
      ];

      $this->input->set_cookie($cookie_data);
    }
  }
}
