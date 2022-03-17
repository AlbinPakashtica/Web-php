<?php
  class PagesController {
    public function home() {
      $first_name = 'Jon';
      $last_name  = 'Snow';
      require_once('views/pages/home.php');
    }

    public function contact(){
      require_once('views/pages/contact.php');
    }

    public function about(){
      require_once('views/pages/about.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }


  }
?>