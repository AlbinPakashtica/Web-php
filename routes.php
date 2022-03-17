<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
      case 'posts':
        // we need the model to query the database later in the controller
        require_once('models/post.php');
        $controller = new PostsController();
      break;
      case 'products':
        require_once('models/products.php');
        $controller = new ProductsController();
        break;
      case 'carts':
        require_once('models/cart.php');
        $controller = new CartController();
        break;
    }

    $controller->{ $action }();
  }

  // we're adding an entry for the new controller and its actions
  $controllers = ['pages' =>  ['home', 'about', 'contact', 'error'],
                  'posts' =>  ['index', 'show'],
                  'products'=>['index', 'show'],
                  'carts' =>   ['index', 'show']
                 ];

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>