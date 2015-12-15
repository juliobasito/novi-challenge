 <div class="row">
    <div class="col-md-6 col-md-offset-3 mycontent">
        <ul class="list-inline intro-social-buttons">
            <li>
                <a class="btn btn-default btn-lg btAdmin" onclick="admin()"><i class="fa fa-wrench fa-fw"></i> <span class="network-name">Administrateur</span></a>
            </li>
            <li>
                <a class="btn btn-default btn-lg btTeacher" onclick="teacher()"><i class="fa fa-tachometer fa-fw"></i> <span class="network-name">Formateur</span></a>
            </li>
            <li>
                <a class="btn btn-default btn-lg btUser" onclick="user()"><i class="fa fa-graduation-cap fa-fw"></i> <span class="network-name">Etudiant</span></a>
            </li>
            <li>
                <a class="btn btn-default btn-lg btUser"><i class="glyphicon glyphicon-plus"></i> <span class="network-name">Ajouter</span></a>
            </li>
            <li>
                <a onclick="updateShow()" class="btn btn-default btn-lg btUser"><i class="glyphicon glyphicon-plus"></i> <span class="network-name">Modifier</span></a>
            </li>
        </ul>
        <div id="listAdmin" style="display:none">
            <h3>Administration</h3>
            <table class="table table-striped">
                <?php 
                $i = 0;
                $size = sizeof($alladmin);
                while($i<$size)
                {
                 echo'
                 <tr>
                 <td>#'.$alladmin[$i]["adminId"].'<td>
                 <td>
                 '.$alladmin[$i]['mail'].'
                 </td>
                 <td>
                 <a href="delAdmin/'.$alladmin[$i]['adminId'].'">Supprimer</a>
                 </td>
                 </tr>
                 ';
                 $i++;
             }
             ?>
         </table>
     </div>
     <div id="listTeacher" style="display:none">
        <h3>Formateurs</h3>
        <table class="table table-striped">
            <?php 
            $i = 0;
            $size = sizeof($allteacher);
            while($i<$size)
            {
                echo'
                <tr>
                <td>#'.$allteacher[$i]["teacherId"].'<td>
                <td>
                '.$allteacher[$i]['mail'].'
                </td>
                <td>
                '.$allteacher[$i]['password'].'
                </td>
                <td>
                <a href="delTeacher/'.$allteacher[$i]['teacherId'].'">Supprimer</a>
                </td>
                </tr>
                ';
                $i++;
            }
            ?>
        </table>
    </div>

    <div id="listUser">
        <h3>Etudiants</h3>
        <table class="table table-striped">
            <?php 
            $i = 0;
            $size = sizeof($alluser);
            $j = 0;
            $size2 = sizeof($allclass);
            $tabclass = array("");
            while($j<$size2)
            {
                $tabclass[$allclass[$j]['classId']] = $allclass[$j]['className'];
                $j++;
            }
            while($i<$size)
            {
                echo'
                <tr>
                <td>#'.$alluser[$i]["userId"].'<td>
                '.$alluser[$i]['mail'].'
                </td><td>
                '.$tabclass[$alluser[$i]['classId']].'
                </td>
                <td>
                '.$alluser[$i]['password'].'
                </td>
                <td>
                </td>
                <td>
                <a href="delUser/'.$alluser[$i]['userId'].'">Supprimer</a>
                </td>
                </tr>
                ';
                $i++;
            }
            ?>
        </table>
    </div>
</div>
</div>
<div id="update" style="display:none;">
    <i class="glyphicon glyphicon-remove" onclick="updateHidden()"></i>
    <ul class="list-inline intro-social-buttons">
        <li>
            <a class="btn btn-default btn-lg btAdmin" onclick="adminUpdate()"><span class="network-name">Administrateur</span></a>
        </li>
        <li>
            <a class="btn btn-default btn-lg btTeacher" onclick="teacherUpdate()"><span class="network-name">Formateur</span></a>
        </li>
        <li>
            <a class="btn btn-default btn-lg btUser" onclick="userUpdate()"><span class="network-name">Etudiant</span></a>
        </li>


        <form method="POST" action="update" class="form-group" id="userUpdate">
            <input value='3' name="type" hidden>
            <h3>Modifier un Etudiant: </h3><br/>
            <label>Id: </label><br/>
            <input type="number" name="id" class="form-control" required><br/>
            <label>Classe: </label><br/>
            <select name="class" class="form-control">
                <?php
                $i = 0;
                $size = sizeof($allclass);
                while($i < $size)
                {
                    echo "
                    <option value='".$allclass[$i]['classId']."'>".$allclass[$i]['className']."</option>
                    ";
                    $i++;
                }
                ?>
            </select>
            <label>Mot de passe: </label><br/>
            <input type="password" name="password" required class="form-control"><br/>
            <input type="submit" value="Valider" class="btn btn-default">
        </form>

        <form method="POST" action="update" class="form-group" id="teacherUpdate" style="display:none">
            <input value='2' name="type" hidden>
            <h3>Modifier un Formateur: </h3><br/>
            <label>Id: </label><br/>
            <input type="number" name="id" class="form-control" required><br/>
            <label>Mail: </label><br/>
            <input type="mail" name="mail" class="form-control" required><br/>
            <label>Mot de passe: </label><br/>
            <input type="password" name="password" required class="form-control"><br/>
            <input type="submit" value="Valider" class="btn btn-default">
        </form>

        <form method="POST" action="update" class="form-group" id="adminUpdate"  style="display:none">
            <input value='1' name="type" hidden>
            <h3>Modifier un Administrateur: </h3><br/>
            <label>Id: </label><br/>
            <input type="number" name="id" class="form-control" required><br/>
            <label>Mail: </label><br/>
            <input type="mail" name="mail" class="form-control" required><br/>
            <label>Mot de passe: </label><br/>
            <input type="password" name="password" required class="form-control"><br/>
            <input type="submit" value="Valider" class="btn btn-default">
        </form>


    </div>
</div>
<script>
function updateShow()
{
    document.getElementById('update').style.display="block";
}

function updateHidden()
{
    document.getElementById('update').style.display="none";
}
function adminUpdate()
{
    document.getElementById('adminUpdate').style.display="block";
    document.getElementById('teacherUpdate').style.display="none";
    document.getElementById('userUpdate').style.display="none";
}
function teacherUpdate()
{
    document.getElementById('adminUpdate').style.display="none";
    document.getElementById('teacherUpdate').style.display="block";
    document.getElementById('userUpdate').style.display="none";
}
function userUpdate()
{
    document.getElementById('adminUpdate').style.display="none";
    document.getElementById('teacherUpdate').style.display="none";
    document.getElementById('userUpdate').style.display="block";
}
function user()
{
    document.getElementById('listUser').style.display='block';
    document.getElementById('listTeacher').style.display='none';
    document.getElementById('listAdmin').style.display='none';
}
function teacher()
{
    document.getElementById('listUser').style.display='none';
    document.getElementById('listTeacher').style.display='block';        
    document.getElementById('listAdmin').style.display='none';
}
function admin()
{
    document.getElementById('listUser').style.display='none';
    document.getElementById('listTeacher').style.display='none';        
    document.getElementById('listAdmin').style.display='block';
}
</script>
