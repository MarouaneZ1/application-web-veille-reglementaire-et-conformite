@extends('user_dashboard.parent')
@section('content')
<div id="wrapper">
   <div class="overlay"></div>
        <!-- Sidebar -->
    <nav class="fixed-top align-top" id="sidebar-wrapper" role="navigation">
       <div class="simplebar-content" style="padding: 0px;">
				<a class="sidebar-brand" href="index.html">
          <span class="align-middle">LEGIX</span>
        </a>
				 <ul class="navbar-nav align-self-stretch">
                    <li class=""> 
                        <a class="nav-link  text-left @yield('synthese')" href="/acceuil"  role="button"  >
                      <i class="flaticon-user"></i>Acceuil
                       </a>
                        </li>
                            <li class="has-sub"> 
                                <a class="nav-link collapsed text-left @yield('utilisateur')" href="#collapseExample1" role="button" data-toggle="collapse" >
                              <i class="flaticon-user"></i>Utilisateurs
                               </a>
                                <div class="collapse @yield('table') menu mega-dropdown" id="collapseExample1">
                              <div class="dropmenu" aria-labelledby="navbarDropdown">
                              <div class="container-fluid ">
                                                  <div class="row">
                                                      <div class="col-lg-12 px-2">
                                                          <div class="submenu-box"> 
                                                              <ul class="list-unstyled m-0">
                                                                  <li><a class="@yield('Tableau')" href="/dashboard/utilisateurs/tableau">Tableau</a></li>
                                                                  <li><a class="@yield('Activités et Thèmes')" href="/dashboard/utilisateurs/activites_user">Activités et Thèmes</a></li>
                                                                  <li><a class="@yield('Sociétés')" href="/dashboard/utilisateurs/societies/">Sociétés</a></li>
                                                              </ul>
                                                          </div>
                                                      </div>
                                                      
                                                  </div>
                                              </div>
                                   </div>
                                </div>
                                </li>
                                <li class="has-sub"> 
                                    <a class="nav-link collapsed text-left @yield('secteurs')" href="#collapseExample2" role="button" data-toggle="collapse" >
                                  <i class="flaticon-user"></i>Secteurs d'activités
                                   </a>
                          
                                    <div class="collapse menu mega-dropdown @yield('sections')" id="collapseExample2">
                                  <div class="dropmenu" aria-labelledby="navbarDropdown">
                                  <div class="container-fluid ">
                                                      <div class="row">
                                                          <div class="col-lg-12 px-2">
                                                              <div class="submenu-box"> 
                                                                  <ul class="list-unstyled m-0">
                                                                      <li><a class="@yield('Sections')" href="/dashboard/secteursdactivites/sections">Sections</a></li>
                                                                      <li><a  class="@yield('Branches')" href="/dashboard/secteursdactivites/branche">Branches</a></li>
                                                                      <li><a class="@yield('Sous Branches')" href="/dashboard/secteursdactivites/sousbranche">Sous Branches</a></li>
                                                                      <li><a class="@yield('Activités')" href="/dashboard/secteursdactivites/activities">Activités</a></li>
                                                                  </ul>
                                                              </div>
                                                          </div>
                                                          
                                                      </div>
                                                  </div>
                                       </div>
                                    </div>
                                    </li>
                                    <li class="has-sub"> 
                                        <a class="nav-link collapsed text-left @yield('themes')" href="#collapseExample3" role="button" data-toggle="collapse" >
                                      <i class="flaticon-user"></i>Thèmes
                                       </a>
                              
                                        <div class="collapse menu mega-dropdown @yield('theme')" id="collapseExample3">
                                      <div class="dropmenu" aria-labelledby="navbarDropdown">
                                      <div class="container-fluid ">
                                                          <div class="row">
                                                              <div class="col-lg-12 px-2">
                                                                  <div class="submenu-box"> 
                                                                      <ul class="list-unstyled m-0">
                                                                      <li><a class="@yield('Thèmes')" href="/dashboard/themes/theme">Thèmes</a></li>
                                                                      <li><a class="@yield('Aspects')" href="/dashboard/themes/aspects">Aspects</a></li>
                                                                      <li><a class="@yield('Sous Aspects')" href="/dashboard/themes/sousaspects">Sous Aspects</a></li>
                                                                      </ul>
                                                                  </div>
                                                              </div>
                                                              
                                                          </div>
                                                      </div>
                                           </div>
                                        </div>
                                        </li>
                                        <li class="has-sub"> 
                                            <a class="nav-link collapsed text-left @yield('TR')" href="#collapseExample4" role="button" data-toggle="collapse" >
                                          <i class="flaticon-user"></i>Texte réglementaire
                                           </a>
                                  
                                            <div class="collapse menu mega-dropdown @yield('text')" id="collapseExample4">
                                          <div class="dropmenu" aria-labelledby="navbarDropdown">
                                          <div class="container-fluid ">
                                                              <div class="row">
                                                                  <div class="col-lg-12 px-2">
                                                                      <div class="submenu-box"> 
                                                                          <ul class="list-unstyled m-0">
                                                                          <li><a class="@yield('Textes')" href="/dashboard/TexteReglementaire/texts">Textes</a></li>
                                                                          <li><a class="@yield('Bulletins Officiels')" href="/dashboard/TexteReglementaire/BO">Bulletins Officiels</a></li>
                                                                          <li><a class="@yield('Exigences')"  href="/dashboard/TexteReglementaire/rules">Exigences</a></li>
                                                                          <li><a class="@yield('Sanctions')" href="/dashboard/TexteReglementaire/sanctions">Sanctions</a></li>
                                                                          <li><a class="@yield('Définitions')" href="/dashboard/TexteReglementaire/definitions">Définitions</a></li>
                                                                          </ul>
                                                                      </div>
                                                                  </div>
                                                                  
                                                              </div>
                                                          </div>
                                               </div>
                                            </div>
                                            </li>
                                            <li class="has-sub"> 
                                                <a class="nav-link collapsed text-left @yield('territoire')" href="#collapseExample5" role="button" data-toggle="collapse" >
                                              <i class="flaticon-user"></i> Territoires
                                               </a>
                                      
                                                <div class="collapse menu mega-dropdown @yield('region')" id="collapseExample5">
                                              <div class="dropmenu" aria-labelledby="navbarDropdown">
                                              <div class="container-fluid ">
                                                                  <div class="row">
                                                                      <div class="col-lg-12 px-2">
                                                                          <div class="submenu-box"> 
                                                                              <ul class="list-unstyled m-0">
                                                                           
                                                                                  <li><a class="@yield('Régions')" href="/dashboard/territoire/region">Régions</a></li>
                                                                                  <li><a class="@yield('Préféctures')" href="/dashboard/territoire/prefecture">Préféctures</a></li>                                                                           
                                                                              </ul>
                                                                          </div>
                                                                      </div>
                                                                      
                                                                  </div>
                                                              </div>
                                                   </div>
                                                </div>
                                                </li>
                                                </ul>
                                                </div>
                                              </nav>
                                                  <!-- /#sidebar-wrapper -->
                                                  <!-- Page Content -->
                                                  <div id="page-content-wrapper">
                                                <div id="content">
                                                <div class="container-fluid p-0 px-lg-0 px-md-0">
                                                  <!-- Topbar -->
                                                  <nav class="navbar navbar-expand navbar-light my-navbar">

                                                    <!-- Sidebar Toggle (Topbar) -->
                                                      <div type="button"  id="bar" class="nav-icon1 hamburger animated fadeInLeft is-closed open" data-toggle="offcanvas">
                                                        <span></span>
                                                    <span></span>
                                                  <span></span>
                                                      </div>
                                                    <!-- Topbar Navbar -->
                                                    <ul class="navbar-nav ml-auto">
                                                      <!-- Nav Item - User Information -->
                                                      <li class="nav-item dropdown mx-2">
                                                              <a href="#" class="btn-dark nav-link dropdown-toggle" data-toggle="dropdown">{{ $LoggedUserInfo['last_name']." ".$LoggedUserInfo['first_name'] }}</a>
                                                              <div class="dropdown-menu dropdown-menu-right">
                                                              <a href=" /Adminprofile " class="dropdown-item"><i class="fas fa-user-circle pr-3"></i>Profile</a>
                                                                  <a href="{{ route('Cpass') }}" class="dropdown-item"><i class="fas fa-key pr-3"></i>Changer le mot de passe</a>
                                                                  <div class="dropdown-divider"></div>
                                                                 
                                                                  

                                                                  <a href="{{ route('logout') }}" class="dropdown-item"><i class="fas fa-sign-out-alt pr-3"></i>Déconnexion</a>
                                                              </div>
                                                             
                                                      </li>
                                                    </ul>
                                                  </nav>
                                                  <!-- End of Topbar -->
                                                  @yield('pagecontent')
                                                  @yield('index')
                                              </div>
                                              <!-- /#wrapper -->
@endsection  