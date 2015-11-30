<div class="container">
	<div class="col-md-3 col-md-offset-4">
		<form>
			<select>
				<?php
				var_dump($class);
				while ($donnee = $class->fetch()) {
				echo $donnee['className'];	
				}
				?>
			</select>
			Date de début: 
			<input type="date" class="form-control" name="dateStart">
			Date de rendu:
			<input type="date" class="form-control" name="dateEnd"><br/>
			<input type="submit" value = "valider" class="btn btn-success">
		</form>
	</div>
</div>