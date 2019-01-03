<?php
defined('BASEPATH') or exit('No direct script access allowed.');

/**
 * Plab_Controller Class
 *
 * All controllers should extend this class.
 */
class Plab_Controller extends CI_Controller {

  /**
   * Guest ID
   * @var int
   */
  protected $guest_id;

  /**
   * Current User
   *
   * Holds the current user's array.
   * @var array
   */
  protected $user = [];

  /**
	 * Array of data to pass to views.
	 * @var array
	 */
	protected $data = [];

  /**
	 * Class Constructor
	 * @return 	void
	 */
  public function __construct()
  {
    parent::__construct();

    /**
     * Autoload Resources
     */
    $this->load->library('user/aauth');

    /**
     * We make sure to always store $_POST data upon submission. This is useful
     * if we want to re-fill form inputs.
     */
    if ($this->input->is_post_request()) {
      $this->session->set_flashdata('plabPostData', $this->input->post());
    }


    /**
     * Authenticate User
     */
    if ($this->aauth->is_loggedin()) {
      $this->user = (array) $this->aauth->get_user();
    } else {
      if ( ! $this->input->cookie('plabGuestID')) {
        /**
         * Create new guest record.
         */
        $guest_data = [
          'ip_address' => $this->input->ip_address(),
        ];
        $this->db->insert('auth_guest', $guest_data);

        $cookie_data = [
          'name' => 'GuestID',
          'value' => $this->db->insert_id(),
          'expire' => 31536000, // 1 year
        ];
        $this->input->set_cookie($cookie_data);
      }
    }

    $this->guest_id = $this->input->cookie('plabGuestID');

    /**
     * Update Guest's Last Activity
     * @var array
     */
    $guest_data = [
      'updated_on' => date('Y-m-d H:i:s'),
    ];
    $this->db->where('guest_id', $this->guest_id);
    $this->db->update('auth_guest', $guest_data);
  }


}
