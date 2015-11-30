<?php
  // require composer autoload (load all my libraries)
  require 'vendor/autoload.php';


    // require my models
require_once 'models/User.php';
require_once 'models/Class.php';
require_once 'models/Task.php';
require_once 'models/subject.php';

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
  })->name('index');



// POST de connexion
  $app->post('/logUser', function () use ($app) {
  session_destroy();
  $isconnected = User::connect_user($_POST['mail'], $_POST['password']);
  if ($isconnected){
	$tache = Task::getTaskByClassId($_SESSION["classid"]);
    $app->redirect($app->urlFor('profil', array('tache'=>$tache)));
  }
  else{
  $app->flash('erreur', 'Vous ne remplissez pas les conditions requises');
  $app->redirect('index');
 }
})->name('logUser');

  $app->post('/logTeacher', function () use ($app) {
  session_destroy();
  $isconnected = User::connect_teacher($_POST['mail'], $_POST['password']);
  if ($isconnected){
    $app->redirect($app->urlFor('indexTeacher'));
  }
  else{
  $app->flash('erreur', 'Vous ne remplissez pas les conditions requises');
 }
})->name('logTeacher');

  // GET /
$app->get('/profil/:user_id', function ($user_id) use ($app) {
  $profil = User::getUserById($_SESSION['userid']);
  $class = StudentClass::getClassById($profil['user']['classId']);
  $tache = Task::getTaskByClassId($profil['user']['classId']);
  var_dump($class);
  $app->render('profil/index.php', array('profil'=>$profil, 'class'=>$class, 'tache' => $tache));
  })->name('profil');

  // GET /
$app->get('/profil', function () use ($app) {
 // $profil = User::getUser($_SESSION['userId']);
 $profil = User::getUserById($_SESSION['userid']);
  $class = StudentClass::getClassById($profil['user']['classId']);
  $app->render('profil/index.php');
  })->name('toutprofil');


$app->get('/getAllClass', function () use ($app) {
 
  $app->render('profil/index.php');
  })->name('getAllClass');

$app->get('/indexTeacher', function () use ($app) {
  $app->render('teacher/index.php');
  })->name('indexTeacher');

$app->post('/formAddTaskTeacher/:teacherId', function ($teacherId) use ($app) {
  $class = StudentClass::getAllClass();
  $subject = Subject::getAllSubjectTeacher($teacherId);
  Task::addTaskTeacher($_POST['subjectId'], $_POST['classId'], $_POST['dateStart'], $_POST['dateEnd']);
  $app->render('teacher/formAddTaskTeacher.php', array('class' =>$class, 'subject' => $subject)); 
  });

$app->get('/formAddTaskTeacher/:teacherId', function ($teacherId) use ($app) {
  $class = StudentClass::getAllClass();
  $subject = Subject::getAllSubjectTeacher($teacherId);
  $app->render('teacher/formAddTaskTeacher.php', array('class' =>$class, 'subject' => $subject)); 
  })->name('formAddTaskTeacher');
  $app->run();