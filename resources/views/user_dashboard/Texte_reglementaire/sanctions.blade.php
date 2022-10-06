@extends('user_dashboard.index')
@section('TR','active')
@section('text','show')
@section('Sanctions','bg-danger')
@section('pagecontent')
<script>
    function getid(button){
    let idch=button.parentElement.parentElement;
    document.getElementById("contentu").innerText=idch.children[1].innerText;
    document.getElementById("avisu").innerText=idch.children[2].innerText;
    document.getElementById("referenceu").innerText=idch.children[3].innerText;
    document.getElementById("sanction_id").value=idch.children[0].innerText;
                }
    function getid2(id){ 
    let idch=id.parentElement.parentElement;                  
    document.getElementById("formdelete").action="/dashboard/TexteReglementaire/deletesanction/"+idch.children[0].innerText;}
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
      <form action="/dashboard/TexteReglementaire/addsanction"  method="POST" >
                @csrf
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="text" class="col-form-label col-md-5">Text:</label>
                        <select class="form-control form-control-sm" id="example" name="text_id"  aria-label="Default select example">
                          @foreach($texts as $k=>$v)
                          <option title="{{$v}}" value="{{$k}}">{{$v}}</option>
                          @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="content" class="col-form-label col-md-5">content:</label>
                        <textarea name="content" id="content" cols="30" rows="2" class="form-style form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="avis" class="col-form-label col-md-5">avis:</label>
                        <textarea name="avis" id="avis" cols="30" rows="2" class="form-style form-control @error('avis') is-invalid @enderror">{{ old('avis') }}</textarea>

                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="reference" class="col-form-label col-md-5">reference:</label>
                        <input type="text" name="reference" id="reference"  class="form-style form-control @error('reference') is-invalid @enderror" value="{{ old('reference') }}">
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
      <form action="/dashboard/TexteReglementaire/updatesanction"  method="POST" >
                @csrf
                <input type="number" id="sanction_id" name="sanctionid" style="display:none;">
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="textu" class="col-form-label col-md-5">Text:</label>
                        <select class="form-control form-control-sm" id="example" name="textu_id"  aria-label="Default select example">
                          @foreach($texts as $k=>$v)
                          <option  title="{{$v}}" value="{{$k}}">{{$v}}</option>
                          @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="contentu" class="col-form-label col-md-5">content:</label>
                        <textarea name="contentu" id="contentu" cols="30" rows="2" class="form-style form-control @error('contentu') is-invalid @enderror">{{ old('contentu') }}</textarea>

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="avisu" class="col-form-label col-md-5">avis:</label>
                        <textarea name="avisu" id="avisu" cols="30" rows="2" class="form-style form-control @error('avisu') is-invalid @enderror">{{ old('avisu') }}</textarea>

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="referenceu" class="col-form-label col-md-5">reference:</label>
                        <textarea name="referenceu" id="referenceu" cols="30" rows="2" class="form-style form-control @error('referenceu') is-invalid @enderror">{{ old('referenceu') }}</textarea>

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
                          <button data-toggle="modal" class="btn btn-primary" data-target="#addmodal"><i class="fas fa-plus-square pr-2 fa-lg"></i>Ajouter une sanction</button>
      </div>
                    </div>
		        </div>
                    <!-- column -->
                    <div class="col-md-12 mt-4">
                        <div class="card">
                            <h5 class="card-header">Sanctions</h5>
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
                                                <th class="border-top-0">content</th>
                                                <th class="border-top-0">avis</th>
                                                <th class="border-top-0">reference</th>
                                                <th class="border-top-0">Text</th>
                                                <th class="border-top-0">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($sanctions))
                                    @foreach ($sanctions as $sanction)
                                        <tr>
                                            <td>{{$sanction->id}}</td>
                                            <td>{{$sanction->content}}</td>
                                            <td>{{$sanction->avis}}</td>
                                            <td>{{$sanction->reference}}</td>
                                            <td>{{$sanction->description}}</td>
                                            <td>
                                                <a  data-toggle="modal" class="badge badge-light edit" data-target="#editmodal" onclick='getid(this)'><i class="fas fa-edit"></i></a>
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