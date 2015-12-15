 <div class="row">
    <div class="col-md-6 col-md-offset-3 mycontent">
        <ul class="list-inline intro-social-buttons">
            <li>
                <a href="#admin" class="btn btn-default btn-lg btAdmin" onclick="admin()"><i class="fa fa-wrench fa-fw"></i> <span class="network-name">Administrateur</span></a>
            </li>
            <li>
                <a href="#teacher" class="btn btn-default btn-lg btTeacher" onclick="teacher()"><i class="fa fa-tachometer fa-fw"></i> <span class="network-name">Formateur</span></a>
            </li>
            <li>
                <a href="#user" class="btn btn-default btn-lg btUser" onclick="user()"><i class="fa fa-graduation-cap fa-fw"></i> <span class="network-name">Etudiant</span></a>
            </li>
            <li>
                <a href="addUser" class="btn btn-default btn-lg btUser"><i class="glyphicon glyphicon-plus"></i> <span class="network-name">Ajouter un utilisateur</span></a>
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
                    <td>
                    '.$alladmin[$i]['mail'].'
                    </td>
                    <td>
                    <a>Modifier</a>
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
                    <td>
                    '.$allteacher[$i]['mail'].'
                    </td>
                    <td>
                    '.$subjectTeacher[$allteacher[$i]['teacherId']].'
                    </td>
                    <td>
                    '.$allteacher[$i]['password'].'
                    </td>
                    <td>
                    <a>Modifier</a>
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
                    <td>
                    '.$alluser[$i]['mail'].'
                    </td><td>
                    '.$tabclass[$alluser[$i]['classId']].'
                    </td>
                    <td>
                    '.$alluser[$i]['password'].'
                    </td>
                    <td>
                    <a>Modifier</a>
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
<script>
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
