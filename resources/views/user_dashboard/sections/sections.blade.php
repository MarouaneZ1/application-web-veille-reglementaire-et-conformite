@extends('user_dashboard.index')
@section('secteurs','active')
@section('Sections','bg-danger')
@section('sections','show')
@section('pagecontent')
<script>
function getid(button){
                let idch=button.parentElement.parentElement;
               document.getElementById("Name").value=idch.children[1].innerText;
               document.getElementById("Code").value=idch.children[2].innerText;
               document.getElementById("id").value=idch.children[0].innerText;
              }
       
function getid2(id){ 
let idch=id.parentElement.parentElement;                  
 document.getElementById("formdelete").action="/dashboard/secteursdactivites/sections/delete/"+idch.children[0].innerText;
}
</script>
<!-- Modal -->
<!-- Add modal -->
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
      <form action="/dashboard/secteursdactivites/sections/addsection/"  method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-md">
                        <label for="Names" class="col-form-label col-md-5">Name:</label>
                        <input type="text" class="form-style form-control @error('Names') is-invalid @enderror" id="Names" name="Names"  value="{{ old('Names') }}" placeholder="Name...">
                        
                    </div></div>
                <div class="form-group row">
                    <div class="col-md">
                        <label for="Codes" class="col-form-label col-md-5">Code:</label>
                        <input type="text" class="form-style form-control @error('Codes') is-invalid @enderror" id="Codes" name="Codes" value="{{ old('Codes') }}" placeholder="Code...">
                        
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
      <form action="/dashboard/secteursdactivites/sections/update/"  method="POST">
                @csrf
                <input type="text" style="display:none;" id="id" name="id"  value="{{ old('id') }}">

                <div class="form-group row">
                    <div class="col-md">
                        <label for="Name" class="col-form-label col-md-5">Name:</label>
                        <input type="text" class="form-style form-control @error('Name') is-invalid @enderror" id="Name" name="Name"  value="{{ old('Name') }}" placeholder="Name...">
                      
                    </div></div>
                <div class="form-group row">
                    <div class="col-md">
                        <label for="Code" class="col-form-label col-md-5">Code:</label>
                        <input type="text" class="form-style form-control @error('Code') is-invalid @enderror" id="Code" name="Code" value="{{ old('Code') }}" placeholder="Code...">
                       
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
                          <button data-toggle="modal" class="btn btn-primary" data-target="#addmodal"><i class="fas fa-plus-square pr-2 fa-lg"></i>Ajouter une Section</button>
                    </div>
                                  </div>
                          </div>
                    <div class="col-md-12 mt-4">
                        <div class="card">
                            <h5 class="card-header">Sections</h5>
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
                                <table id="table" class="table" class="table table-striped ">
                                    <thead>
                                        <tr class="bg-light">
                                            <th class="border-top-0">N°</th>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Code</th>
                                            <th class="border-top-0">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($sections))
                                    @foreach ($sections as $section)
                                        <tr>
                                            <td>
                                               {{$section->id}}
                                            </td>
                                            <td>{{$section->name}}</td>
                                            <td>{{$section->code}}</td>
                                            <td>
                                            <a  data-toggle="modal"  id="updatesection" class="badge badge-light edit" data-target="#editmodal" onclick='getid(this)'><i class="fas fa-edit"></i></a>
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
		</div>
        <!-- /#page-content-wrapper -->
        <!-- modal supprimer -->


@endsection