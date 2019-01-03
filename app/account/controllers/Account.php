<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Account extends User_Controller
{
  public function __construct()
  {
    parent::__construct();

    if ($this->aauth->get_user_var('account_setup') < 2) {
      $step = $this->aauth->get_user_var('account_setup') +1;
      redirect('account/setup/step-' . $step);
    }
  }

  public function index()
  {
    $data = [];
  }
}
