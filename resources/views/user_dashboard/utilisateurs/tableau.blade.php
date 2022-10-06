@extends('user_dashboard.index')
@section('utilisateur','active')
@section('Tableau','bg-danger')
@section('table','show')
@section('pagecontent')
<script>
function getid(button){
  let idch=button.parentElement.parentElement;
  document.getElementById("cin").value=idch.children[1].innerText;
 document.getElementById("Nom").value=idch.children[2].innerText;
 document.getElementById("Prenom").value=idch.children[3].innerText;
 document.getElementById("Email").value=idch.children[4].innerText;
 document.getElementById("id").value=idch.children[0].innerText;
              }
function getid2(id){ 
let idch=id.parentElement.parentElement;                  
document.getElementById("formdelete").action="/dashboard/utilisateurs/tableau/delete/"+idch.children[0].innerText;}
 </script> 
<!-- modal add -->
<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ajouter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/dashboard/utilisateurs/tableau/adduser/"  method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="Nom" class="col-form-label col-md-5">Nom:</label>
                        <input type="text" class="form-style form-control @error('Nomu') is-invalid @enderror"  name="Nomu"  value="{{ old('Nomu') }}" placeholder="Nom...">
                    </div>
                    <div class="col-md-4">
                        <label for="Prenom" class="col-form-label col-md-5">Prenom:</label>
                        <input type="text" class="form-style form-control @error('Prenomu') is-invalid @enderror"  name="Prenomu" value="{{ old('Prenomu') }}" placeholder="Prenom...">
                        
                    </div>
                    <div class="col-md-4">
                    <label for="cin" class="col-form-label col-md-5">CIN:</label>
                    <input type="text" class="form-style form-control @error('cin') is-invalid @enderror"  name="cin" value="{{ old('cin') }}" placeholder="CIN..."> 
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="Email" class="col-form-label col-md-5">Email:</label>
                        <input type="text" class="form-style form-control @error('Emailu') is-invalid @enderror"  name="Emailu"  value="{{ old('Emailu') }}" placeholder="Email...">
                       
                    </div>
                    <div class="col-md-6">
                        <label for="Profile" class="col-form-label col-md-5">Profile:</label>
                        <select class="form-control form-style @error('Profileu') is-invalid @enderror" name="Profileu" value="{{ old('Profileu') }}">
                        <option>Admin</option>
                        <option>User</option>
                      </select>
                    </div>
                </div>
                @if ($errors->adduser->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->adduser->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
            </form>
      </div>

    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modifier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/dashboard/utilisateurs/tableau/update/"  method="POST">
                @csrf
                <input type="text" style="display:none;" id="id" name="id"  value="{{ old('id') }}">
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="Nom" class="col-form-label col-md-5">Nom:</label>
                        <input type="text" class="form-style form-control @error('Nom') is-invalid @enderror" id="Nom" name="Nom"  value="{{ old('Nom') }}" placeholder="Nom...">
                    </div>
                    <div class="col-md-4">
                        <label for="Prenom" class="col-form-label col-md-5">Prenom:</label>
                        <input type="text" class="form-style form-control @error('Prenom') is-invalid @enderror" id="Prenom" name="Prenom" value="{{ old('Prenom') }}" placeholder="Prenom...">
                    </div>
                    <div class="col-md-4">
                    <label for="cin" class="col-form-label col-md-5">CIN:</label>
                    <input type="text" class="form-style form-control @error('cin') is-invalid @enderror" id="cin" name="cin" value="{{ old('cin') }}" placeholder="CIN...">  
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="Email" class="col-form-label col-md-5">Email:</label>
                        <input type="text" class="form-style form-control @error('Email') is-invalid @enderror" id="Email" name="Email"  value="{{ old('Email') }}" placeholder="Email...">
                    </div>
                    <div class="col-md-6">
                        <label for="Profile" class="col-form-label col-md-5">Profile:</label>
                        <select class="form-control form-style @error('Profile') is-invalid @enderror" id="Profile" name="Profile" value="{{ old('Profile') }}">
                        <option>Admin</option>
                        <option>User</option>
                      </select>
                    </div>
                </div>
                @if ($errors->updateuser->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->updateuser->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
            </form>
      </div>

    </div>
  </div>
</div>
<!-- Modal delete -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Supprimer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <form action="" id="formdelete" method="POST">
                @csrf
                <p style="text-align:center;">Vous êtes sûre de supprimer cet enregistrement?</p>
                    <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">supprimer</button>
                    </div>
            </form>
      </div>
    </div>
  </div>
</div>
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
                <div class="col-md-12 mt-lg-4 mt-4">
                    <div class="d-sm-flex align-items-end justify-content-end mb-2">
                          <button data-toggle="modal" class="btn btn-primary" data-target="#addmodal"><i class="fas fa-plus-square pr-2 fa-lg"></i>Ajouter un Utilisateur</button>
      </div>
                    </div>
		        </div>
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
                            <div class="table-responsive px-3">
                                <table id="table" class="table table-striped ">
                                    <thead>
                                        <tr class="bg-light">
                                            <th class="border-top-0">N°utilisateur</th>
                                            <th class="border-top-0">CIN</th>
                                            <th class="border-top-0">Nom</th>
                                            <th class="border-top-0">Prenom</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Profile</th>
                                            
                                            <th class="border-top-0">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($users))
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->CIN}}</td>
                                            <td>{{$user->last_name}}</td>
                                            <td>{{$user->first_name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->profile}}</td>
                                           
                                            <td>
                                            <a  data-toggle="modal" id="updateuser" class="badge badge-light edit" data-target="#editmodal" onclick='getid(this)'><i class="fas fa-edit"></i></a>
                                            <a  data-toggle="modal" class="badge badge-light edit" data-target="#delete" onclick='getid2(this)'><i class="fas fa-trash-alt"></i></a>
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
        <!-- /#page-content-wrapper -->
        <!-- modal supprimer -->
        


@endsection