<?php
  // require composer autoload (load all my libraries)
  require 'vendor/autoload.php';

  // require database configuration (with Eloquent)
  require 'db/config.php';
  

  // require my models
  require 'models/Book.php';
  session_start();

  // Slim initialisation
  $app = new \Slim\Slim(array(
    'view' => '\Slim\LayoutView', // I activate slim layout component
    'layout' => 'layouts/main.php' // I define my main layout
  ));

  // hook before.router, now $app is accessible in my views
  $app->hook('slim.before.router', function () use ($app) {
    $app->view()->setData('app', $app);
  });

  // views initiatilisation
  $view = $app->view();
  $view->setTemplatesDirectory('views');

  // GET /
  $app->get('/', function() use ($app) {
  $app->render('index.php');
  });

  // GET /books/:book_id
  $app->get('/books/:book_id', function ($book_id) use ($app) {

  });

  // always need to be at the bottom of this file !
  $app->run();