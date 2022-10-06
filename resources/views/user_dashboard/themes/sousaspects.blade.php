@extends('user_dashboard.index')
@section('themes','active')
@section('theme','show')
@section('Sous Aspects','bg-danger')
@section('pagecontent')
<script>
function getid(button){
let idch=button.parentElement.parentElement;
document.getElementById("name").value=idch.children[1].innerText;
document.getElementById("id").value=idch.children[0].innerText;
}

function getid2(id){ 
let idch=id.parentElement.parentElement;                  
 document.getElementById("formdelete").action="/dashboard/themes/sousaspects/delete/"+idch.children[0].innerText;}
</script>
<!-- Modal -->
<!-- add modal -->
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
      <form action="/dashboard/themes/sousaspects/addsousaspect/"  method="POST">
                @csrf
                <div class="form-group row">
               
                    <div class="col-md-6">
                        <label for="name" class="col-form-label col-md">Nom du sous aspect:</label>
                        <input type="text" class="form-style form-control @error('names') is-invalid @enderror" id="names" name="names"  value="{{ old('names') }}" placeholder="name...">
                    </div>
                   
                    <div class="col-md-6">
                        <label for="name" class="col-form-label col-md">N°1 aspect:</label>
                        <select class="form-control form-control-sm" id="example" name="n2aspects"  aria-label="Default select example">
                          @foreach($aspects as $k=>$v)
                          <option  title="{{$v}}" value="{{$k}}">{{$v}}</option>
                          @endforeach
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
      <form action="/dashboard/themes/sousaspects/update/"  method="POST">
                @csrf
                <input type="text" style="display:none;" id="id" name="id"  value="{{ old('id') }}">
                <div class="form-group row">
               
                    <div class="col-md-6">
                        <label for="name" class="col-form-label col-md">Nom du sous aspect:</label>
                        <input type="text" class="form-style form-control @error('name') is-invalid @enderror" id="name" name="name"  value="{{ old('name') }}" placeholder="name...">
                       
                    </div>
                   
                    <div class="col-md-6">
                        <label for="name" class="col-form-label col-md">N°1 aspect:</label>
                        <select class="form-control form-control-sm" id="example" name="n2aspect"  aria-label="Default select example">
                          @foreach($aspects as $k=>$v)
                          <option  title="{{$v}}" value="{{$k}}">{{$v}}</option>
                          @endforeach
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
<!-- Modal edit -->
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
                          <button data-toggle="modal" class="btn btn-primary" data-target="#addmodal"><i class="fas fa-plus-square pr-2 fa-lg"></i>Ajouter un Sous Aspect</button>
                    </div>
                                  </div>
                          </div>
                    <div class="col-md-12 mt-4">
                        <div class="card">
                            <h5 class="card-header">Sous Aspects</h5>
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
                                            <th class="border-top-0">N°</th>
                                            <th class="border-top-0">name</th>
                                            <th class="border-top-0">Aspects</th>
                                            <th class="border-top-0">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($sousaspects))
                                    @foreach ($sousaspects as $sousaspect)
                                        <tr>
                                            <td>{{$sousaspect->id}}</td>
                                            <td>{{$sousaspect->name}}</td>
                                            <td>{{$sousaspect->n1_aspectname}}</td>
                                            <td>
                                            <a  data-toggle="modal"  id="updatesousaspect" class="badge badge-light edit" data-target="#editmodal" onclick='getid(this)'><i class="fas fa-edit"></i></a>
                                            <a  data-toggle="modal"   class="badge badge-light edit" data-target="#delete" onclick='getid2(this)' ><i class="fas fa-trash-alt"></i></a>
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