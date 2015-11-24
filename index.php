<?php
  // require composer autoload (load all my libraries)
  require 'vendor/autoload.php';


    // require my models
require_once 'models/User.php';
require_once 'models/Class.php';
require_once 'models/Task.php';
require_once 'models/Subject.php';

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



// POST de connexion
  $app->post('/logUser', function () use ($app) {
  session_destroy();
  $isconnected = User::connect_user($_POST['mail'], $_POST['password']);
  if ($isconnected){
    $app->redirect($app->urlFor('profil'));
  }
  else{
  $app->flash('erreur', 'Vous ne remplissez pas les conditions requises');
 }
})->name('logUser');

  $app->post('/logTeacher', function () use ($app) {
  session_destroy();
  $isconnected = User::connect_teacher($_POST['mail'], $_POST['password']);
  if ($isconnected){
    $app->redirect($app->urlFor('profil'));
  }
  else{
  $app->flash('erreur', 'Vous ne remplissez pas les conditions requises');
 }
})->name('logTeacher');


  // GET /
$app->get('/profil', function () use ($app) {
  $profil = User::getUserById($_SESSION['userid']);
  $class = StudentClass::getClassById($profil['classId']);
  $task = Task::getTaskByClassId($profil['classId']);

  $prenom= explode(".", $_SESSION['mail']);
  $rest = $prenom[1];
  $nom = explode("@", $rest);
  $profilName = ucfirst($prenom[0])." ".strtoupper($nom[0]);

  $app->render('profil/index.php', array('profil'=>$profil,  'class' => $class, 'task'=>$task, 'profilName'=>$profilName) );
  })->name('profil');



  // GET /books/:book_id
  $app->get('/books/:book_id', function ($book_id) use ($app) {

  });

  // always need to be at the bottom of this file !
  $app->run();