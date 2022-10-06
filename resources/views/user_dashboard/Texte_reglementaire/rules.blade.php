@extends('user_dashboard.index')
@section('TR','active')
@section('text','show')
@section('Exigences','bg-danger')
@section('pagecontent')
<script>
function getid(button){
  let idch=button.parentElement.parentElement;
document.getElementById("text_idu").value=idch.children[1].innerText;
document.getElementById("contentu").value=idch.children[2].innerText;
document.getElementById("avisu").value=idch.children[3].innerText;
document.getElementById("referenceu").value=idch.children[6].innerText;
document.getElementById("id").value=idch.children[0].innerText;
              }
function getid2(id){ 
let idch=id.parentElement.parentElement;                  
document.getElementById("formdelete").action="/dashboard/TexteReglementaire/rules/delete/"+idch.children[0].innerText;}
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
      <form action="/dashboard/TexteReglementaire/rules/addrule/"  method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="text_id" class="col-form-label col-md">N° Texte:</label>
                        <input type="number" class="form-style form-control @error('text_id') is-invalid @enderror" id="text_id" name="text_id"  value="{{ old('text_id') }}" placeholder="text_id...">
                        @error('text_id')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-12">
                        <label for="content" class="col-form-label col-md">Contenu:</label>
                        <textarea class="form-style form-control @error('content') is-invalid @enderror" id="content" name="content" value="{{ old('content') }}" placeholder="content..."></textarea>
                        @error('content')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="avis" class="col-form-label col-md">Avis:</label>
                        <input type="text" class="form-style form-control @error('avis') is-invalid @enderror" id="avis" name="avis"  value="{{ old('avis') }}" placeholder="avis...">
                        @error('avis')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="reference" class="col-form-label col-md">Reference:</label>
                        <input type="text" class="form-style form-control @error('reference') is-invalid @enderror" id="reference" name="reference" value="{{ old('reference') }}" placeholder="reference...">
                        @error('reference')<span style="color:red;">{{ $message }}</span>@enderror
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
      <form action="/dashboard/TexteReglementaire/rules/update/"  method="POST">
                @csrf
                <input type="text" style="display:none;" id="id" name="id"  value="{{ old('id') }}">
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="text_idu" class="col-form-label col-md">N° Texte:</label>
                        <input type="number" class="form-style form-control @error('text_idu') is-invalid @enderror" id="text_idu" name="text_idu"  value="{{ old('text_idu') }}" placeholder="text_id...">
                    </div>
                    <div class="col-md-12">
                        <label for="contentu" class="col-form-label col-md">Contenu:</label>
                        <textarea class="form-style form-control @error('contentu') is-invalid @enderror" id="contentu" name="contentu" value="{{ old('contentu') }}" placeholder="content..."></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="avisu" class="col-form-label col-md">Avis:</label>
                        <input type="text" class="form-style form-control @error('avisu') is-invalid @enderror" id="avisu" name="avisu"  value="{{ old('avisu') }}" placeholder="avis...">
                    </div>
                    <div class="col-md-6">
                        <label for="referenceu" class="col-form-label col-md">Reference:</label>
                        <input type="text" class="form-style form-control @error('referenceu') is-invalid @enderror" id="referenceu" name="referenceu" value="{{ old('referenceu') }}" placeholder="reference...">
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
                          <button data-toggle="modal" class="btn btn-primary" data-target="#addmodal"><i class="fas fa-plus-square pr-2 fa-lg"></i>Ajouter une Exigence</button>
      </div>
                    </div>
		        </div>
                    <!-- column -->
                    <div class="col-md-12 mt-4">
                        <div class="card">
                            <h5 class="card-header">Exigences</h5>
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
                                            <th class="border-top-0">N°Exigence</th>
                                            <th class="border-top-0">N°Texte</th>
                                            <th class="border-top-0">Contenu</th>
                                            <th class="border-top-0">Avis</th>
                                            <th class="border-top-0">Crée à </th>
                                            <th class="border-top-0">Modifié à </th>
                                            <th class="border-top-0">Reference</th>
                                            <th class="border-top-0">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($rules))
                                    @foreach ($rules as $rules)
                                        <tr>
                                            <td>{{$rules->id}}</td>
                                            <td>{{$rules->text_id}}</td>
                                            <td> <?php echo $rules->content ?></td>
                                            <td><?php echo $rules->avis?></td>
                                            <td>{{$rules->createdAt}}</td>
                                            <td>{{$rules->updateAt}}</td>
                                            <td>{{$rules->reference}}</td>
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