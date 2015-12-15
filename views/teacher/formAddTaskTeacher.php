<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Bootstrap 101 Template</title>

	<!-- Bootstrap -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/mycss.css" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  </head>
  <body>
  	 <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand navOnglet" href="#">NOVI</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
             <li><a class="navOnglet" href="formAddTaskTeacher">Ajouter une tache</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
              <li><a href="" class="navOnglet">Déconnexion</a></li>

            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
  	<?php
  	$size = sizeof($subject); 
  	$i=0;
  	if(isset($_POST['subjectId']))
  	{

  	}
  	?>
  	<div class="container">
  		<form method="POST" action="" class="form-group">
  				<label>Matière:</label>
  				<select name="subjectId" class="form-control" required>
  					<?php while($i < $size){?>
  					<option value="<?php echo $subject[$i]['subjectId']?>"><?php echo $subject[$i]['subjectName']?><option>
  						<?php $i++;
  					} ?>
  				</select>
  			<?php
  			$size = sizeof($class); 
  			$i=0;
  			?>
  				<label >Classe:</label>
  				<select name="classId" class="form-control" required>
  					<?php while($i < $size){?>
  					<option value="<?php echo $class[$i]['classId']?>"><?php echo $class[$i]['className']?><option>
  						<?php $i++;
  					} ?>
  				</select>
          <label>Nom de la tâche: </label>
          <input type="text" name="name" class="form-control" required>
  				<label for="dateDebut">Date de début:</label>
  				<input id="dateDebut" type="date" name="dateStart" class="form-control" required>
  				<label for="dateFin">Date de fin:</label>
  				<input id="dateFin" type="date" name="dateEnd" class="form-control" required><br/>
  			<input type="submit" class="btn btn-success" value="Valider">
  		</form>
  	</div>
  	<script src="js/bootstrap.min.js"></script>
  </body>
  </html