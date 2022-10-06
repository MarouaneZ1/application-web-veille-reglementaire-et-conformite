@extends('client.parent')
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
                        <a class="nav-link  text-left " href="/user"  role="button"  >
                        <i class="fas fa-book-reader pr-2"></i>{{$urlsuser[1]}}
                       </a>
                        </li>
                        <?php $i=0 ?>
                        @foreach($themes as $k=>$v)
                            <li class=""> 
                              <a class="nav-link text-left  {{ request()->is($urls[$k-2]) ? 'active' : '' }}"  href="{{$url[$k-1]}}"  role="button">
                                <i class="fas fa-<?=$icon[$i]?> pr-2"></i>{{$v}}
                               </a>
                            </li>
                            <?php $i+=1 ?>
                        @endforeach
                                            <li class="has-sub"> 
                                                <a class="nav-link collapsed text-left" href="#collapseExample5" role="button" data-toggle="collapse" >
                                              <i class="flaticon-user"></i>  Plan d'actions
                                               </a>
                                      
                                                <div class="collapse menu mega-dropdown" id="collapseExample5">
                                              <div class="dropmenu" aria-labelledby="navbarDropdown">
                                              <div class="container-fluid ">
                                                                  <div class="row">
                                                                      <div class="col-lg-12 px-2">
                                                                          <div class="submenu-box"> 
                                                                              <ul class="list-unstyled m-0">
                                                                                @foreach($themes as $k=>$v)
                                                                                  <li><a href="">{{$v}}</a></li>
                                                                                @endforeach
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
            <div type="button"  id="bar" class="nav-icon1 hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
               <span></span>
			    <span></span>
				 <span></span>
            </div>
			

        
          <ul class="navbar-nav ml-auto">
                                                      <!-- Nav Item - User Information -->
                                                      <li class="nav-item dropdown mx-2">
                                                              <a href="#" class="btn-dark nav-link dropdown-toggle" data-toggle="dropdown">{{ $societies->name}}</a>
                                                              <div class="dropdown-menu dropdown-menu-right">
                                                                  <a href="/profile" class="dropdown-item"><i class="fas fa-user-circle pr-3"></i>Profile</a>
                                                                  <a href="/CSPass" class="dropdown-item"><i class="fas fa-key pr-3"></i>Changer Mot de Passe</a>
                                                                  <div class="dropdown-divider"></div>
                                                                  <a href="{{ route('logout') }}" class="dropdown-item"><i class="fas fa-sign-out-alt pr-3"></i>Déconnexion</a>
                                                              </div>
                                                      </li>
                                                    </ul>
        </nav>
        <!-- End of Topbar -->

 @yield('pcontent')
      </div>
        </div>
		</div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
@endsection