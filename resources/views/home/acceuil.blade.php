@extends('home.master')
@section('content')
<header> 
      <div class="header">
        <div class="progress-container">
          <div class="progress-bar" id="myBar"></div>
        </div>  
      </div>
    
        <nav class="navbar navbar-expand-lg ftco_navbar fixed-top ftco-navbar-light" id="ftco-navbar">
          <div class="container">
            <a class="navbar-brand" href="index.html"> <img src="{{ asset('ressources/Logos/logoS.png') }}" width="150" height="40" ></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="fa fa-bars"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
              <ul class="navbar-nav ml-auto mr-md-3">
                <li class="nav-item active"><a  href="#" class="nav-link linkd">Acceuil</a></li>
                <li class="nav-item"><a href="#" class="nav-link linkd">Fonctionnalités</a></li>
                <li class="nav-item"><a href="/prices" class="nav-link linkd">Tarifs</a></li>
                <li class="nav-item"><a href="#footer" class="nav-link linkd">Contact</a></li>
                <li class="nav-item"><a class="nav-link login-houda" href="/acceuil">Se connecter</a></li>
              </ul>
            </div>
          </div>
        </nav>
      <!-- END nav -->

    

</header>
   

        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                <li data-target="#carousel-example-generic" data-slide-to="4"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="banner" style=" background-image: -o-linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('images/1.jpg');
    background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('images/1.jpg');"></div>
                    <div class="carousel-caption">
                        <h2 class="animated bounceInRight" style="animation-delay: 1s">FACILITER  <span>VOTRE VIE PROFESSIONNELLE</span></h2>
                        <h3 class="animated bounceInLeft" style="animation-delay: 2s">Veille réglementaire</h3>
                        <h3 class="animated bounceInRight" style="animation-delay: 2s">Suivi de la conformité</h3>
                        <h3 class="animated bounceInLeft" style="animation-delay: 2s">Plan d’actions</h3>
                        <h3 class="animated bounceInRight" style="animation-delay: 2s">Multi-utilisateur</h3>
                        <h3 class="animated bounceInLeft" style="animation-delay: 2s">Multi-sites</h3>

                        <p class="animated bounceInRight" style="animation-delay: 3s"><a href="#">Tarifs pour chaque fonctionnalité</a></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="banner" style=" background-image: -o-linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('images/5.jpg');
    background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('images/5.jpg');"></div>
                    <div class="carousel-caption">
                        <h2 class="animated slideInDown" style="animation-delay: 1s">Santé <span>et Sécurité</span></h2>
                        <h3 class="animated fadeInUp" style="animation-delay: 2s">Les employeurs sont juridiquement responsables de la création et du maintien d'un environnement de travail dans lequel les employés peuvent travailler en toute sécurité, sans risque pour leur santé et leur bien-être physique et psychologique. </h3>
                        <p class="animated zoomIn" style="animation-delay: 3s"><a href="#">Consulter nos services</a></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="banner" style=" background-image: -o-linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('images/2.jpg');
    background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('images/2.jpg');"></div>
                    <div class="carousel-caption">
                        <h2 class="animated slideInDown" style="animation-delay: 1s">Envir<span>onnement</span></h2>
                        <h3 class="animated fadeInUp" style="animation-delay: 2s">Identifier les textes réglementaires qui vous concernent dans les domaines des ICPE, des produits dangereux, de l’eau, des déchets, du bruit, des risques chimiques, des risques électriques, de l’organisation et la prévention, etc.,
                            </h3>

                        <p class="animated zoomIn" style="animation-delay: 3s"><a href="#">Consulter nos services</a></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="banner" style=" background-image: -o-linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('images/3.jpg');
    background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('images/3.jpg');"></div>
                    <div class="carousel-caption">
                        <h2 class="animated slideInDown" style="animation-delay: 1s">Qua <span>lité</span></h2>
                        <h3 class="animated fadeInUp" style="animation-delay: 2s">Toutes les entreprises sont soumises à des réglementations liés à la qualité.Une veille réglementaire personnalisée permet de connaître les textes applicables à son activité et de mettre en œuvre les actions adaptées pour maîtriser les risques et être en conformité.</h3> 
                        <p class="animated zoomIn" style="animation-delay: 3s"><a href="#">Consulter nos services</a></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="banner" style=" background-image: -o-linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('images/4.jpg');
    background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('images/4.jpg');"></div>
                    <div class="carousel-caption">
                        <h2 class="animated zoomIn" style="animation-delay: 1s">Admin <span>istrative</span></h2>
                        <h3 class="animated fadeInLeft" style="animation-delay: 2s">Le travail de veille peut se faire en interne. Mais il requiert du temps et surtout des connaissances spécifiques.
                         Pour y voir plus clair, LEGIX vous propose une assistance dans la gestion administrative du personnel et vous conseille en droit social.</h3>
                        <p class="animated zoomIn" style="animation-delay: 3s"><a href="#">Consulter nos services</a></p>
                    </div>
                </div>

            </div>

            <!-- Controls -->
           
            <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>

    </header>
    <div class="container bcontent" >
        <div class="na" >
            <h5 class="text-center ">
          Notre accompagnement, qui porte sur l’ensemble de vos activités, a pour objectif de vous 
  donner une information claire et exploitable, « clé-en-main ». Pour cela, nos experts vous 
  fournissent, à la fréquence de votre choix :</h5></div>
      </div>
  <br><!--hr style="color:#ce1212; width:30%; margin-left:400px;"--><br>
  
  <div class="container " id="e">
    <div class="card" >
        <div class="row no-gutters">
            <div class="col-sm-3 img-hover-zoom" style=" margin-top: 5px; margin-bottom: 5px; ">
                <img class="card-img" src="images/11(1).jpg" alt="Suresh Dasari Card" style="height: 170px;">
            </div>
            <div class="col-sm-9">
                <div class="card-body" style="text-align: justify;">
                    <h5 class="card-title"><i class="fas fa-balance-scale pr-3"></i>Veille Réglementaire</h5>
                    <p class="card-text">Identification des textes et exigences réglementaires 
                      par des juristes experts en HSE (Hygiène, Sécurité, Environnement) en fonction de l'activité, 
                      la région (site) et les thèmes ou aspects sélectionnés.</p>
                </div>
            </div>
        </div>
    </div>
  </div>
  
  <br>
  
  
  <div class="container" id="e" >
  <div class="card" >
  <div class="row no-gutters">
      <div class="col-sm-3 img-hover-zoom" style="margin-top: 5px; margin-bottom: 5px; ">
          <img class="card-img" src="images/33(1).png" alt="Suresh Dasari Card" style="height: 170px;">
      </div>
      <div class="col-sm-9">
          <div class="card-body" style="text-align: justify;">
              <h5 class="card-title"><i class="fas fa-chart-line pr-3"></i>Synthèse Conformité</h5>
              <p class="card-text">Mesure du niveau de conformité réglementaire de l’organisme aux exigences, 
                qui sera conduite lors d’un audit. Son but est double:
                   mesurer l’écart entre les obligations légales et les pratiques de l’entreprise, puis, dans le cas de non conformité, 
                   de mettre en oeuvre les actions correctives nécessaires.</p>
          </div>
      </div>
  </div>
  </div>
  </div>
  
  <br>
  
  <div class="container " id="e">
  <div class="card" >
  <div class="row no-gutters">
      <div class="col-sm-3 img-hover-zoom" style="margin-top: 5px; margin-bottom: 5px; ">
          <img class="card-img" src="images/44(1).png" alt="Suresh Dasari Card" style="height: 170px;">
      </div>
      <div class="col-sm-9">
          <div class="card-body" style="text-align: justify;">
              <h5 class="card-title"><i class="fas fa-tasks pr-3"></i>Plan D’action</h5>
              <p class="card-text">Associer vos plans d’action aux exigences réglementaires pour viser 
                les 100% de conformité.</p>
          </div>
      </div>
  </div>
  </div>
  </div>
  
  
  <br>
  
  <div class="container" id="e">
  <div class="card">
  <div class="row no-gutters">
      <div class="col-sm-3 img-hover-zoom" style="margin-top: 5px; margin-bottom: 5px; ">
          <img class="card-img" src="images/22(1).png" alt="Suresh Dasari Card" style="height: 170px;">
      </div>
      <div class="col-sm-9">
          <div class="card-body" style="text-align: justify;">
              <h5 class="card-title"><i class="fas fa-envelope-open-text pr-3"></i>Alerte</h5>
              <p class="card-text">Nous pensons que les entreprises devraient pouvoir être informées rapidement et simplement
                de toute nouveauté réglementaire pouvant
                  impacter leurs activités. C'est la raison pour laquelle une alerte par Email systématique dès l’apparition de nouveaux textes vous
                   impactant.</p>
          </div>
      </div>
  </div>
  </div>
  </div>
  <div class="bodyy">
    <h4 class="text-center article-recent">
    BULLETINS OFFICIELS POUR 2021</h4>
    <div class="pt-5 pb-5">
        <div class="container">
          <div class="row">
              <div class="col-12">
                  <div id="mycar" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                          <div class="carousel-item active">
                              <div class="row">
                                  <div class="col-md-4 mb-3">
                                      <div class="card">                            
                                          <img class="img-fluid imgsize" alt="1"  src="ressources/coursel_images/BO.png">
                                          <div class="card-body">
                                             <h6 class="text-center"><a class="text-secondary"  href="http://www.sgg.gov.ma/Legislation/DernierBulletinOfficiel.aspx">Nouveau bulletin Officiel N°7004</a></h6>
                                              
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4 mb-3">
                                      <div class="card">                            
                                          <img class="img-fluid imgsize" alt="1" src="ressources/coursel_images/BO.png">  
                                          <div class="card-body">
                                          <h6 class="text-center"><a class="text-secondary"  href="http://www.sgg.gov.ma/Legislation/DernierBulletinOfficiel.aspx">Nouveau bulletin Officiel N°7000</a></h6>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4 mb-3">
                                      <div class="card">
                                          <img class="img-fluid imgsize" alt="1" src="ressources/coursel_images/BO.png">
                                          <div class="card-body">
                                          <h6 class="text-center"><a class="text-secondary"  href="http://www.sgg.gov.ma/Legislation/DernierBulletinOfficiel.aspx">Nouveau bulletin Officiel N°6996</a></h6>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="carousel-item">
                              <div class="row">
                                  <div class="col-md-4 mb-3">
                                      <div class="card">                            
                                          <img class="img-fluid imgsize" alt="1" src="ressources/coursel_images/BO.png">
                                          <div class="card-body">
                                          <h6 class="text-center"><a class="text-secondary"  href="http://www.sgg.gov.ma/Legislation/DernierBulletinOfficiel.aspx">Nouveau bulletin Officiel N°6992</a></h6>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4 mb-3">
                                      <div class="card">                            
                                          <img class="img-fluid imgsize" alt="1" src="ressources/coursel_images/BO.png">
                                        <div class="card-body">
                                        <h6 class="text-center"><a class="text-secondary"  href="http://www.sgg.gov.ma/Legislation/DernierBulletinOfficiel.aspx">Nouveau bulletin Officiel N°6988</a></h6>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4 mb-3">
                                      <div class="card">
                                        <div class="img-hover-zoom img-hover-zoom--slowmo">
                                        <img class="img-fluid imgsize" alt="1" src="ressources/coursel_images/BO.png">  
                                    </div>                                     
                                      <div class="card-body">
                                      <h6 class="text-center"><a class="text-secondary"  href="http://www.sgg.gov.ma/Legislation/DernierBulletinOfficiel.aspx">Nouveau bulletin Officiel N°6984</a></h6>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="carousel-item">
                              <div class="row">
                                  <div class="col-md-4 mb-3">
                                      <div class="card">
                                          <img class="img-fluid imgsize" alt="1" src="ressources/coursel_images/BO.png">  
                                            <div class="card-body">
                                            <h6 class="text-center"><a class="text-secondary"  href="http://www.sgg.gov.ma/Legislation/DernierBulletinOfficiel.aspx">Nouveau bulletin Officiel N°6978</a></h6>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4 mb-3">
                                      <div class="card">
                                          <img class="img-fluid imgsize" alt="1" src="ressources/coursel_images/BO.png">  
                                            <div class="card-body">
                                            <h6 class="text-center"><a class="text-secondary"  href="http://www.sgg.gov.ma/Legislation/DernierBulletinOfficiel.aspx">Nouveau bulletin Officiel N°6974</a></h6>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4 mb-3">
                                      <div class="card">
                                          <img class="img-fluid imgsize" alt="1" src="ressources/coursel_images/BO.png">
                                          <div class="card-body">
                                          <h6 class="text-center"><a class="text-secondary"  href="http://www.sgg.gov.ma/Legislation/DernierBulletinOfficiel.aspx">Nouveau bulletin Officiel N°6970</a></h6>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col text-right">
                        <a class="btn btn-primary mb-3 mr-1" href="#mycar" role="button" data-slide="prev">
                            Précedent
                        </a>
                        <a class="btn btn-primary mb-3" href="#mycar" role="button" data-slide="next">
                            Suivant
                        </a>
                    </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <footer class="text-center text-lg-start bg-light text-muted">
        <div class="container justify-content-center justify-content-lg-between p-4 border-bottom">
          <div class="row">
            <div class="col-6 col-sm-5">
              <span>Vous pouvez se connecter avec nous sur:</span>
            </div>
            <div class="col-6 col-sm-7">
                <a href="#" class="me-4 text-reset">
                  <img src="ressources/icons/facebook.png" alt="facebook" >
                </a>
                <a href="#" class="me-4 text-reset">
                  <img src="ressources/icons/instagram.png" alt="instagram">
                </a>
                <a href="#" class="me-4 text-reset">
                  <img src="ressources/icons/twitter.png" alt="twitter" >
                </a>
              </div>
          </div>
        </div>
        <div>
          <div class="container text-center text-md-start mt-5" id="footer">
            <div class="row mt-3">
              <div class="col-md-3 d-flex justify-content-center pt-5 col-lg-4 col-xl-3 mb-4 ">
                <img src="{{ asset('ressources/Logos/logoM.png') }}" width="200" height="50" >
              </div>
             
              <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="fw-bold mb-4">LIENS</h6>
                <p><a href="#" class="text-reset">Rejoindre Nous</a></p>
                <p><a href="#" class="text-reset">Fonctionalités</a></p>
                <p><a href="#" class="text-reset">Tarifs</a></p>
                <p><a href="#" class="text-reset">Contacter Nous</a></p>
              </div>
              <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <h6 class="text-uppercase fw-bold mb-4">INFO</h6>
                <p>Casablanca, 5000, Maroc</p>
                <p>legix@gmail.com</p>
                <p>+212 620 45 67 25</p>
                <p>+212 523 45 67 89</p>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
          © 2021 Copyright:
          <a class="text-reset fw-bold" href="#">Legix.com</a>
        </div>
      </footer>
    </div>
@endsection