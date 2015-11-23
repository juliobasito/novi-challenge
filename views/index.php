

<div class="container">
  <div class="row">
    <div class="col-md-5 col-md-offset-3">
      <br/>
      <button id="btUser" type="button" class="btn btn-info" onclick="user()" style="display:none">Etudiant</button>
      <button id="btTeacher" type="button" class="btn btn-info" onclick="teacher()">Formateur</button>
      <button id="btAdmin" type="button" class="btn btn-info" onclick="admin()">Administration</button>
    </div>
  </div>

  <!--FORMULAIRE ETUDIANT-->
  <div class="row">
    <div class="col-md-5 col-md-offset-3">
      <form id="user"  method="POST" class="form-group">
        <h3 id="title">Connexion Etudiant</h3>
        Mail : <input type="mail" name="mail" required class="form-control"><br/>
        Mot de passe : <input type="password" name="password" required class="form-control"><br/>
        <input type="submit" value="Login" class="btn btn-success">
      </form>
    </div>
  </div>

  <!--FORMULAIRE FORMATEUR-->
  <div class="row">
    <div class="col-md-5 col-md-offset-3">
      <form id="teacher"  method="POST" class="form-group" style="display:none">
        <h3 id="title">Connexion Formateur</h3>
        Mail : <input type="mail" name="mail" required class="form-control"><br/>
        Mot de passe : <input type="password" name="password" required class="form-control"><br/>
        <input type="submit" value="Login" class="btn btn-success">
      </form>
    </div>
  </div>

  <!--FORMULAIRE ADMINISTRATION-->
  <div class="row">
    <div class="col-md-5 col-md-offset-3">
      <form id="admin"  method="POST" class="form-group" style="display:none">
        <h3 id="title">Connexion Administration</h3>
        Mail : <input type="mail" name="mail" required class="form-control"><br/>
        Mot de passe : <input type="password" name="password" required class="form-control"><br/>
        <input type="submit" value="Login" class="btn btn-success">
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">

  function user()
  {
    document.getElementById('user').style.display="block";
    document.getElementById('teacher').style.display="none";
    document.getElementById('admin').style.display="none";

    document.getElementById('btUser').style.display="none";
    document.getElementById('btTeacher').style.display="inline-block";
    document.getElementById('btAdmin').style.display="inline-block";
  }

  function teacher()
  {
    document.getElementById('user').style.display="none";
    document.getElementById('teacher').style.display="block";
    document.getElementById('admin').style.display="none";

    document.getElementById('btUser').style.display="inline-block";
    document.getElementById('btTeacher').style.display="none";
    document.getElementById('btAdmin').style.display="inline-block";
  }

  function admin()
  {
    document.getElementById('user').style.display="none";
    document.getElementById('teacher').style.display="none";
    document.getElementById('admin').style.display="block";

    document.getElementById('btUser').style.display="inline-block";
    document.getElementById('btTeacher').style.display="inline-block";
    document.getElementById('btAdmin').style.display="none";
  }
</script>
