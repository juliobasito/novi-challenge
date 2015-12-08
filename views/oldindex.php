<div class="container">
  <div class="row">
    <div class="col-md-5 col-md-offset-3">
      <br/>
      <button id="btUser" type="button" class="btn btn-info onglet"style="display:none">Etudiant</button>
      <button id="btTeacher" type="button" class="btn btn-info onglet">Formateur</button>
      <button id="btAdmin" type="button" class="btn btn-info onglet">Administration</button>
    </div>
  </div>

  <!--FORMULAIRE ETUDIANT-->
  <div class="row">
    <div class="col-md-5 col-md-offset-3">
      <form id="user"  method="POST" class="form-group" action="logUser" >
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
      <form id="teacher"  method="POST" class="form-group" action="logTeacher" style="display:none">
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

<script>
    $(document).ready(function(){
    // Le code jQuery ici !    
    $("#btTeacher").click(function()
    {
        $("#user").hide();
        $("#teacher").show();
        $("#admin").hide();
        
        
        $("#btTeacher").hide();
        $("#btUser").show();
        $("#btAdmin").show();
    });
        
    $("#btUser").click(function()
    {
        $("#user").show();
        $("#teacher").hide();
        $("#admin").hide();
        
        $("#btTeacher").show();
        $("#btUser").hide();
        $("#btAdmin").show();
    });
    
    $("#btAdmin").click(function()
    {
        $("#user").hide();
        $("#teacher").hide();
        $("#admin").show();
        
        $("#btTeacher").show();
        $("#btUser").show();
        $("#btAdmin").hide();
    });
        
    });
</script>