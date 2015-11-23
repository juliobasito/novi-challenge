<?php

session_start();


$app = new \Slim\Slim(array(
    'view' => '\Slim\LayoutView', // I activate slim layout component
    'layout' => 'layouts/main.php' // I define my main layout
    ));

  // views initiatilisation
$app->hook('slim.before.router', function () use ($app) {
  $app->view()->setData('app', $app);
});

$app->hook('verification.admin', function () use ($app) {
  if( isset($_SESSION['admin']) && $_SESSION['admin'] )
  {
    return true;
  }
  else
  {
    $app->redirect($app->urlFor('accueil'));
  }
});


   $app->run();


   ?>