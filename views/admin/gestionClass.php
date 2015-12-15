<div class="row">
    <div class="col-md-6 col-md-offset-3 mycontent">
    	<a href="addClass" class="btn btn-default btn-lg btUser"><i class="glyphicon glyphicon-plus"></i> <span class="network-name">Ajouter une classe</span></a>
    	<h3>Liste des classes :</h3>
    	<?php
    	$i = 0;
    	$size = sizeof($allclass);
    	?>
    	<table class="table table-striped">
    		<?php
    		while($i < $size)
    		{
    			echo '
    			<tr>
    				<td>'.$allclass[$i]["className"].'</td>
    				<td><a href="delClass/'.$allclass[$i]["classId"].'">Supprimer</a></td>
    			</tr>
    			';
    			$i++;
    		}
    		?>
    	</table>
    </div>
</div>