    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>NOVI Team</h1>
                        <h3>Une solution innovante et performante.</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="#" class="btn btn-default btn-lg btAdmin"><i class="fa fa-wrench fa-fw"></i> <span class="network-name">Administrateur</span></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg btTeacher"><i class="fa fa-tachometer fa-fw"></i> <span class="network-name">Formateur</span></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg btUser"><i class="fa fa-graduation-cap fa-fw"></i> <span class="network-name">Etudiant</span></a>
                            </li>
                            
                        </ul>
                        <div class="row">
                    <div class="col-md-6 col-md-offset-3">
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
                    <div class="col-md-6 col-md-offset-3">
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
                    <div class="col-md-6 col-md-offset-3">
                      <form id="admin"  method="POST" class="form-group" style="display:none" action="logAdmin">
                        <h3 id="title">Connexion Administration</h3>
                        Mail : <input type="mail" name="mail" required class="form-control"><br/>
                        Mot de passe : <input type="password" name="password" required class="form-control"><br/>
                        <input type="submit" value="Login" class="btn btn-success">
                      </form>
                    </div>
                  </div>
</div>
                    </div>
                    
                </div>
            </div>

        </div>
        <!-- /.container -->
 
 
    <!-- /.intro-header -->

    <!-- Page Content -->

    <!-- /.banner -->
    
    <script>
    $(document).ready(function(){
    // Le code jQuery ici !    
    $(".btTeacher").click(function()
    {
        $("#user").hide();
        $("#teacher").show();
        $("#admin").hide();
    });
        
    $(".btUser").click(function()
    {
        $("#user").show();
        $("#teacher").hide();
        $("#admin").hide();

    });
    
    $(".btAdmin").click(function()
    {
        $("#user").hide();
        $("#teacher").hide();
        $("#admin").show();
    });     
});
</script>

