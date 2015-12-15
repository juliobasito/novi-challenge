<div class="row">
  <div class="col-md-6 col-md-offset-3 mycontent">
    <form method="POST" action="" class="form-group">
      <input value='1' name="type" hidden>
      <h3>Ajouter une matière: </h3><br/>
      <label>Nom de la matière: </label><br/>
      <input type="text" name="subjectName" required class="form-control"><br/>
      <label>Formateur</label>
      <select name="teacherId" class="form-control">
      	<?php
      		$i = 0;
      		$size = sizeof($allteacher);
      		while($i < $size)
      		{
      			echo'
      			<option value="'.$allteacher[$i]["teacherId"].'">'.$allteacher[$i]["mail"].'</option>
      			';
      			$i++;
      		}
      	?>
      </select><br/>
      <input type="submit" value="Valider" class="btn btn-default">
    </form>
  </div>
</div>