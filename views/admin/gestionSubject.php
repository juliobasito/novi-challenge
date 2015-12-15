<div class="row">
	<div class="col-md-6 col-md-offset-3 mycontent">
		<a href="addSubject" class="btn btn-default btn-lg btUser"><i class="glyphicon glyphicon-plus"></i> <span class="network-name">Ajouter une matière</span></a>
		<h3>Liste des matière :</h3>
		<?php
		$i =0;
		$size = sizeof($allsubject);
		?>
		<table class="table table-striped">
			<?php
			while($i < $size)
			{
				echo '
				<tr>
				<td>'.$allsubject[$i]["subjectName"].'</td>
				<td>'.$tab[$allsubject[$i]["teacherId"]].'</td>
				<td><a href="delSubject/'.$allsubject[$i]["subjectId"].'">Supprimer</a></td>
				</tr>
				';
				$i++;
			}
			?>
		</table>
	</div>
</div>