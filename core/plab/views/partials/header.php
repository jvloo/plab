<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="description" content="An online one stop printing e-commerce platform that provides you easy access to all sorts of different printing materials in one centralized place, and purchase them in just a few clicks.">
  <meta name="keywords" content="one-stop,ecommerce,printing,sme,event,organizer,student">
  <meta name="author" content="BeLinked Enterprise">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

  <title>PrintingLab.MY Beta</title>

  <link rel="shortcut icon" type="image/x-icon" href="">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Righteous:400|Merriweather+Sans:700|Roboto:400,500,700">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" integrity="sha256-HtCCUh9Hkh//8U1OwcbD8epVEUdBvuI8wj1KtqMhNkI=" crossorigin="anonymous" >

  <link rel="stylesheet" href="<?php echo base_url('static/asset/bootstrap/4.1.1/css/bootstrap.min.css'); ?>">

  <!--- JQuery Preload --->
  <!--- script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script --->
  <script src="<?php echo base_url('static/asset/jquery/3.3.1/jquery.min.js'); ?>"></script>
<body>
  <header class="section-header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" href="#">PrintingLab Beta</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <!--- Navbar Left --->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('home'); ?>">Home</a>
            </li>

          </ul><!--- END Navbar Left --->

          <!--- Navber Right --->
          <?php if ( $this->aauth->is_loggedin() ) : $user = $this->aauth->get_user(); ?>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo ucwords($user->username); ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="<?php echo site_url(); ?>">Action</a>
                  <a class="dropdown-item" href="<?php echo site_url(); ?>">Another action</a>
                  <a class="dropdown-item" href="<?php echo site_url(); ?>">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('user/logout'); ?>">Logout</a>
              </li>
            </ul>
          <?php else : ?>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('user/signup'); ?>">Sign Up</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('user/login'); ?>">Login</a>
              </li>
            </ul>
          <?php endif; ?>
          <!--- END Navbar Right --->
        </div>
      </div>
    </nav>
  </header>

  <section class="section-content bg-light">
    <div class="container py-5">
