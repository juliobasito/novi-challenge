    <div class="container mycontent ">
      <h2>Ajouter un utilisateur</h2>
      <ul class="list-inline intro-social-buttons">
        <li>
          <a href="#" class="btn btn-default btn-lg btAdmin" onclick="admin()" id="adminbtn"><i class="fa fa-wrench fa-fw"></i> <span class="network-name">Administrateur</span></a>
        </li>
        <li>
          <a href="#" class="btn btn-default btn-lg btTeacher" onclick="teacher()" id="teacherbtn"><i class="fa fa-tachometer fa-fw"></i> <span class="network-name">Formateur</span></a>
        </li>
        <li>
          <a href="#" class="btn btn-default btn-lg btUser" onclick="user()" id="userbtn" style="display:none"><i class="fa fa-graduation-cap fa-fw"></i> <span class="network-name">Etudiant</span></a>
        </li>

      </ul>
      <?php if(isset($_POST['type']))
      {
      if($_POST['type'] == 1) // Student
      {
        if($result == 1)
        {
          echo '<div class="alert alert-success" role="alert">Etudiant ajouté avec succes</div>';
        }
      }

      else if($_POST['type'] == 2) // Teacher
      {
        if($result == 1)
        {
          echo '<div class="alert alert-success" role="alert">Formateur ajouté avec succes</div>'; 
        }
      }
      else if($_POST['type'] == 3) //Admin
      {
        echo '<div class="alert alert-success" role="alert">Administrateur ajouté avec succes</div>';
      }
    }?>
    <div id="user">
      <form method="POST" action="" class="form-group">
        <input value='1' name="type" hidden>
        <h3>Etudiant: </h3><br/>
        <label>Mail: </label><br/>
        <input type="mail" name="mail" required class="form-control"><br/>
        <label>Mot de passe: </label><br/>
        <input type="password" name="password" required class="form-control"><br/>
        <label>Classe: </label><br/>
        <?php
        $i =0;
        $size = sizeof($allclass);
        ?>
        <select name="class" class="form-control">
          <?php while($i < $size)
          {
            echo'<option value="'.$allclass[$i]["classId"].'">'.$allclass[$i]["className"].'</option>';              
            $i++;
          }
          ?>
        </select><br/>
        <input type="submit" value="Valider" class="btn btn-default">
      </form>
    </div>
    <div id="teacher" style="display:none">        
      <form method="POST" action="" class="form-group">
        <input value='2' name="type" hidden>
        <h3>Formateur: </h3><br/>
        <label>Mail: </label><br/>
        <input type="mail" name="mail" required class="form-control"><br/>
        <label>Mot de passe: </label><br/>
        <input type="password" name="password" required class="form-control"><br/>
        
        <input type="submit" value="Valider" class="btn btn-default"><br/>
      </form>
    </div>
    <div id="admin" style="display:none">
      <form method="POST" action="" class="form-group">
        <input value='3' name="type" hidden>
        <h3>Administrateur: </h3><br/>
        <label>Mail: </label><br/>
        <input type="mail" name="mail" required class="form-control"><br/>
        <label>Mot de passe: </label><br/>
        <input type="password" name="password" required class="form-control"><br/>
        <input type="submit" value="Valider" class="btn btn-default">
      </form>
    </div>
  </div>
  <script>
  function user()
  {
    document.getElementById('user').style.display="block";
    document.getElementById('teacher').style.display="none";
    document.getElementById('admin').style.display="none";

    document.getElementById('userbtn').style.display="none";
    document.getElementById('teacherbtn').style.display="block";
    document.getElementById('adminbtn').style.display="block";
  }
  function teacher()
  {
    document.getElementById('user').style.display="none";
    document.getElementById('teacher').style.display="block";
    document.getElementById('admin').style.display="none";

    document.getElementById('userbtn').style.display="block";
    document.getElementById('teacherbtn').style.display="none";
    document.getElementById('adminbtn').style.display="block";
  }
  function admin()
  {
    document.getElementById('user').style.display="none";
    document.getElementById('teacher').style.display="none";
    document.getElementById('admin').style.display="block";

    document.getElementById('userbtn').style.display="block";
    document.getElementById('teacherbtn').style.display="block";
    document.getElementById('adminbtn').style.display="none";
  }
  </script>