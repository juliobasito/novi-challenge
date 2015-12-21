<?php
$size = sizeof($subject); 
$i=0;
?>
<div class="container mycontent">
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
      <?php while($i < $size)
      {?>
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
    <input type="submit" class="btn btn-default" value="Valider">
  </form>
</div>