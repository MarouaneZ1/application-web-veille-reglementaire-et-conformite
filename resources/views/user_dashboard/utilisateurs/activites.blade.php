@extends('user_dashboard.index')
@section('utilisateur','active')
@section('Activités et Thèmes','bg-danger')
@section('table','show')
@section('pagecontent')
@if(Session::get('dsuccess'))
                    <div class="alert alert-success">
                    {{ Session::get('dsuccess') }}
                    </div>
                    @endif 
                    @if(Session::get('dfail'))
                    <div class="alert alert-danger">
                    {{ Session::get('dfail') }}
                    </div>
                    @endif 
        <!-- Begin Page Content -->
        <div class="container-fluid px-lg-4">
            <div class="row">
                <!-- <div class="col-md-12 mt-lg-4 mt-4">
                    Page Heading 
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Utilisateurs</h1>
                    </div>
		        </div> -->
                    <!-- column -->
                    <div class="col-md-12 mt-4">
                        <div class="card">
                            <h5 class="card-header">Utilisateurs</h5>
                            <div class="card-body">
                                <!-- title -->
                                
                                <div class="d-md-flex align-items-center">
                                
                                     <!-- Topbar Search -->
<!--                                     <form class="d-none d-sm-inline-block form-inline navbar-search">
                                        <div class="input-group">
                                        <input type="text" class="form-control bg-light " placeholder="Rechercher par domaine..." aria-label="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-search" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                        </div>
                                    </form> -->
                                </div>
                                <!-- title -->
                            </div>
                            <div class="table-responsive">
                                <table id="table" class="table table-striped">
                                    <thead>
                                        <tr class="bg-light">
                                            <th class="border-top-0">N°utilisateur</th>
                                            <th class="border-top-0">Nom</th>
                                            <th class="border-top-0">Prenom</th>
                                            <th class="border-top-0">thèmes</th>
                                            <th class="border-top-0">Activités</th>
                                            <th class="border-top-0">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($users))
                                    @foreach ($users as $k=>$user)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <h4 class="m-b-0 font-16">{{$user->id}}</h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$user->last_name}}</td>
                                            <td>{{$user->first_name}}</td>
                                            <td>
                                                @if(isset($themeusers))
                                                  @foreach($themeusers[$user->id] as $k => $v)
                                                  <span class="badge alert-success">{{$v}}</span></br>
                                                  @endforeach
                                                @endif
                                              </td>
                                            <td>
                                                @if(isset($activityusers))
                                                  @foreach($activityusers[$user->id] as $k => $v)
                                                  <span class="badge alert-danger">{{$v}}</span></br>
                                                  @endforeach
                                                @endif

                                            </td>
                                            <td>
                                            <a  class="badge badge-light edit"  href="/updateusertheact/{{$user->id}}"><i class="fas fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                   

        </div>

        </div>
        <!-- /.container-fluid -->

      </div>
			
        </div>
		</div>
        <!-- /#page-content-wrapper -->
        <!-- modal supprimer -->
        


@endsection