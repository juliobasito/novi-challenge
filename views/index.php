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
                                <a href="#" class="btn btn-default btn-lg btAdmin"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Administrateur</span></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg btTeacher"><i class="fa fa-github fa-fw"></i> <span class="network-name">Formateur</span></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg btUser"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Etudiant</span></a>
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
                      <form id="admin"  method="POST" class="form-group" style="display:none">
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

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->

	<a  name="services"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Une solution professionnelle
                    <p class="lead">La performance et la rapidité est essentielle au bon fonctionnement d'un projet. Utilisez maintenant nos services.</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="img/ipad.png" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <div class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Une montée en charges</h2>
                    <p class="lead">Accompagné vos étudiants dans une analyse poussée de leur projet. Analyse des charges et mesures concernant leurs travaux.</p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src="https://image.freepik.com/icones-gratuites/graphique-de-statistiques-sur-ecran-d&-39;ordinateur-portable_318-62448.png" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->

    <div class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Formateurs, Administrateurs et Etudi    ants</h2>
                    <p class="lead">Connectez vous avec tout les types de comptes possibles. Cohabitez entre étudiants et formateurs.</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="http://www.lesechos.fr/medias/2015/04/02/1107825_la-conference-sociale-du-3-avril-2015-peut-elle-sauver-la-formation-professionnelle-130201-1.jpg" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

	<a  name="contact"></a>
    <div class="banner">

        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <h2>Connect to Start :</h2>
                </div>
                <div class="col-lg-6">
                    <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="https://twitter.com/formations_ynov" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                        </li>
                        <li>
                            <a href="https://github.com/juliobasito/novi-challenge" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
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

