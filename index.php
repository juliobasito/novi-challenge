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
    $app->redirect($app->urlFor('calendrier'));
  }
  else{
  $app->flash('erreur', 'Vous ne remplissez pas les conditions requises');
  $app->redirect($app->urlFor('index'));
 }
})->name('logUser');

  $app->post('/logTeacher', function () use ($app) {
  session_destroy();
  $isconnected = User::connect_teacher($_POST['mail'], $_POST['password']);
  var_dump($isconnected);
  if ($isconnected){
    $app->redirect($app->urlFor('indexTeacher'));
  }
  else{
  $app->flash('erreur', 'Vous ne remplissez pas les conditions requises');
  $app->redirect($app->urlFor('index'));
 }
})->name('logTeacher');

$app->post('/logAdmin', function () use ($app) {
  session_destroy();
  $isconnected = User::connect_admin($_POST['mail'], $_POST['password']);
  if ($isconnected){
    $app->redirect($app->urlFor('indexAdmin'));
  }
  else{
  $app->flash('erreur', 'Vous ne remplissez pas les conditions requises');
  $app->redirect($app->urlFor('index'));
 }
})->name('logAdmin');

$app->get('/indexAdmin', function () use ($app) {
  $app->render('admin/index.php');
  })->name('indexAdmin');



  // GET /
$app->get('/profil/:user_id', function ($user_id) use ($app) {
  $profil = User::getUserById($_SESSION['userid']);
  $class = StudentClass::getClassById($profil['user']['classId']);
  $tache = Task::getTaskByClassId($profil['user']['classId']);
  var_dump($class);
  $app->render('profil/index.php', array('profil'=>$profil, 'class'=>$class, 'tache' => $tache));
  })->name('profil');

$app->get('/deconnexion', function () use ($app) {
  User::deconnexion();
  $app->redirect($app->urlFor('index'));
  })->name('deconnexion');

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
  $subject = Subject::getAllSubjectTeacherAndTaskAndClass($_SESSION['teacherId']);
  $app->render('teacher/index.php', array('subject' =>$subject));
  })->name('indexTeacher');

$app->post('/formAddTaskTeacher', function () use ($app) {
  $class = StudentClass::getAllClass();
  $subject = Subject::getAllSubjectTeacher($_SESSION['teacherId']);
  Task::addTaskTeacher($_POST['subjectId'], $_POST['classId'], $_POST['dateStart'], $_POST['dateEnd'], $_POST['name']);
  $app->render('teacher/formAddTaskTeacher.php', array('class' =>$class, 'subject' => $subject)); 
  });
  
 $app->get('/calendrier', function () use ($app) {
 $profil = User::getUserById($_SESSION['userid']);
 $task = Task::getTaskByClassId($_SESSION["classid"]);
  $app->render('calendrier/calendrier.php', array('profil' =>$profil, 'task'=>$task)); 
  })->name('calendrier');

$app->get('/formAddTaskTeacher', function () use ($app) {
  $class = StudentClass::getAllClass();
  $subject = Subject::getAllSubjectTeacher($_SESSION['teacherId']);
  $app->render('teacher/formAddTaskTeacher.php', array('class' =>$class, 'subject' => $subject)); 
  })->name('formAddTaskTeacher');
  
  $app->get('/listUser', function () use ($app) {
  $alluser = User::listUser();
  $app->render('admin/listUser.php', array('alluser' =>$alluser)); 
  })->name('listUser');
  
  $app->get('/listTeacher', function () use ($app) {
  $allteacher = User::listTeacher();
  $app->render('admin/listTeacher.php', array('allteacher' =>$allteacher)); 
  })->name('listTeacher');

  $app->get('/addUser', function () use ($app) {
    $allclass = StudentClass::getAllClass();
  $app->render('admin/addUser.php', array('allclass'=>$allclass)); 
  })->name('addUser');

  $app->post('/addUser', function () use ($app) {
    $allclass = StudentClass::getAllClass();
    if($_POST['type'] == 1) // Student
      {
       $result = User::addUser($_POST['mail'], $_POST['password'], $_POST['class']); 
      }

      else if($_POST['type'] == 2) // Teacher
      {
        $result = User::addTeacher($_POST['mail'], $_POST['password'], $_POST['subject']);
      }
      else if($_POST['type'] == 3) //Admin
      {
        $result = User::addAdmin($_POST['mail'], $_POST['password']);
      }
  $app->render('admin/addUser.php', array('allclass'=>$allclass, 'result'=>$result)); 
  });

  $app->get('/gestionUser', function () use ($app) {
  $alladmin = User::listAdmin();
  $allteacher = User::listTeacher();
  $i = 0;
  $size = sizeof($allteacher);
  $tab = [];
  while($i < $size)
  {
    $tab[] = subject::getAllSubject();
    $i++;
  }
  $subjectTeacher = array();
  $i =0;
  $j =0;
  while($i < $size)
  {
    $size2 = sizeof($tab[$i]);
    while($j < $size2)
    {
      $subjectTeacher[$tab[$i][$j]['teacherId']] = $tab[$i][$j]['subjectName'];
      $j++;
    }
    $i++;
  }
  $alluser = User::listUser();
  $allclass = StudentClass::getAllClass();
  $app->render('admin/gestionUser.php', array('alladmin'=>$alladmin,'allteacher' =>$allteacher, 'alluser' =>$alluser, 'allclass'=>$allclass, 'subjectTeacher'=>$subjectTeacher)); 
  })->name('gestionUser');

  $app->get('/delUser/:userId', function ($userId) use ($app) {
  User::delUser($userId);
  $app->redirect($app->urlFor('gestionUser'));
  })->name('delUser');
  
  $app->get('/delTeacher/:teacherId', function ($teacherId) use ($app) {
  User::delTeacher($teacherId);
  $app->redirect($app->urlFor('gestionUser'));
  })->name('delTeacher');
  

$app->get('/delAdmin/:adminId', function ($adminId) use ($app) {
  User::delAdmin($adminId);
  $app->redirect($app->urlFor('gestionUser'));
  })->name('delAdmin');

$app->get('/gestionClass', function () use ($app) {
  $allclass = StudentClass::getAllClass();
  $app->render('admin/gestionClass.php', array('allclass'=>$allclass));
  })->name('gestionClass');

$app->get('/addClass', function () use ($app) {
  $app->render('admin/addClass.php');
  })->name('addClass');

$app->post('/addClass', function () use ($app) {
  $result = StudentClass::addClass($_POST['className']);
  $app->redirect($app->urlFor('gestionClass'));
  });

$app->get('/delClass/:classId', function ($classId) use ($app) {
  $result = StudentClass::delClass($classId);
  $app->redirect($app->urlFor('gestionClass'));
  });

$app->get('/gestionSubject', function () use ($app) {
  $result = Subject::getAllSubject();
  $app->render('admin/gestionSubject.php');
  })->name('gestionSubject');

  

  $app->run();