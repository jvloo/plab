<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Plab_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->helper('form');
  }

  public function index()
  {
    if ( $this->aauth->is_loggedin() ) {
      redirect('account');
    }

    redirect('user/login');
  }

  public function login()
  {
    if ( $this->aauth->is_loggedin() ) {
      redirect('account');
    }

    if ( ! empty($this->input->post('plabUserLogin')) ) {
      $identifier = $this->input->post('plabLoginID');
      $password   = $this->input->post('plabLoginPassword');
      $remember   = $this->input->post('plabLoginRemember');

      if ( ! empty($remember) ) {
        $remember = true;
      } else {
        $remember = false;
      }

      if ( $this->aauth->login($identifier, $password, $remember) ) {
        redirect('account');
      }
    }

    $this->load->view('user/login');
  }

  public function signup()
  {
    if ( $this->aauth->is_loggedin() ) {
      redirect('account');
    }

    if ( ! empty( $this->input->post('plabUserSignup')) ) {
      $username = strtolower($this->input->post('plabSignupUsername'));
      $password = $this->input->post('plabSignupPassword');
      $email    = $this->input->post('plabSignupEmail');

      $newsletter = $this->input->post('plabSignupSubscribe');

      if ( $this->aauth->create_user($email, $password, $username) ) {
        $this->aauth->login($email, $password);

        if ( empty($newsletter) ) {
          $this->aauth->set_user_var('newsletter', 'false');
        } else {
          $this->aauth->set_user_var('newsletter', 'true');
        }

        redirect('account/setup');
      }
    }

    $this->load->view('user/signup');
  }

  public function logout()
  {
    $this->aauth->logout();
    redirect('home');
  }
}
