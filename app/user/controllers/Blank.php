<?php
defined('BASEPATH') or exit('No direct script access allowed.');

class Blank extends Front_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data = [];
  }
}
