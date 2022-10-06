@extends('user_dashboard.index')
@section('TR','active')
@section('text','show')
@section('Textes','bg-danger')
@section('pagecontent')
<script>
function getid(button){
  let idch=button.parentElement.parentElement;
document.getElementById("Nomu").value=idch.children[2].innerText;
document.getElementById("descriptionu").innerText=idch.children[3].innerText;
document.getElementById("dateu").value=idch.children[4].innerText;
document.getElementById("id").value=idch.children[0].innerText;
              }
function getid2(id){ 
let idch=id.parentElement.parentElement;                  
document.getElementById("formdelete").action="/dashboard/TexteReglementaire/texts/delete/"+idch.children[0].innerText;}
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
      <form action="/dashboard/TexteReglementaire/texts/addtext/"  method="POST">
                @csrf
                <div class="form-group row">
                <div class="col-md-12">
                              <div class="btn-group btn-group-toggle mb-3 pl-2" >
                                        <label class="btn btn-outline-primary">
                                            <input type="radio" name="status" class="hide-btn" value="Publié" autocomplete="off" >Publié
                                        </label>
                                        <label class="btn btn-outline-primary active">
                                            <input type="radio" name="status" class="show-btn" value="Non Publié" autocomplete="off" checked>Non Publié
                                        </label>
                                    </div></div>
                    <div class="col-md-12">
                        <label for="cat" class="col-form-label col-md-5">Catégorie:</label>
                        <select class="form-style form-control @error('cat') is-invalid @enderror" id="cat" name="cat"  aria-label="Default select example">
                          @foreach($categories as $k=>$v)
                          <option value="{{$k}}">{{$v}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="BO" class="col-form-label col-md-5">BO:</label>
                        <select class="form-control form-control-sm" id="example" name="BO"  aria-label="Default select example">
                          @foreach($BOS as $k=>$v)
                          <option  value="{{$k}}">{{$v}}</option>
                          @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="Nom" class="col-form-label col-md-5">Nom:</label>
                        <input type="text" class="form-style form-control @error('Nom') is-invalid @enderror"  name="Nom"  value="{{ old('Nom') }}" placeholder="Nom...">
                    </div>
                    <div class="col-md-12">
                        <label for="description" class="col-form-label col-md-5">Description:</label>
                        <textarea  class="form-style form-control @error('description') is-invalid @enderror"  name="description" cols="30" rows="2"  >{{ old('description') }}</textarea>
                    </div>
                   
                </div>
                <div class="form-group row">
                <div class="col-md-12">
                        <label for="date" class="col-form-label col-md-5">Date:</label>
                        <input type="date" class="form-style form-control @error('date') is-invalid @enderror"  name="date" value="{{ old('date') }}" placeholder="Description...">
                    </div>
                </div>
                <div class="form-group row">
                <div class="col-md-12">
                        <label for="BO" class="col-form-label col-md-5">Thème:</label>
                        <select class="form-control form-control-sm" id="example" name="theme"  aria-label="Default select example">
                          @foreach($themes as $k=>$v)
                          <option  value="{{$k}}">{{$v}}</option>
                          @endforeach
                        </select>
                    </div></div>
                    <div class="form-group row">
                    <div class="col-md-12">
                        <label for="BO" class="col-form-label col-md-5">Activité:</label>
                        <select class="form-control form-control-sm" id="example" name="activite"  aria-label="Default select example">
                          @foreach($activity as $k=>$v)
                          <option  value="{{$k}}">{{$v}}</option>
                          @endforeach
                        </select>
                    </div></div>
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
      <form action="/dashboard/TexteReglementaire/texts/update/"  method="POST">
                @csrf
                <input type="text" style="display:none;" id="id" name="id"  value="{{ old('id') }}">
                <div class="form-group row">
                    <div class="col-md-12">                
                        <label for="catu" class="col-form-label col-md-5">Catégorie:</label>
                        <select class="form-style form-control @error('catu') is-invalid @enderror" id="catu" name="catu"  aria-label="Default select example">
                          @foreach($categories as $k=>$v)
                          <option value="{{$k}}">{{$v}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="BOu" class="col-form-label col-md-5">BO:</label>
                        <select class="form-control form-control-sm" id="example" name="BOu"  aria-label="Default select example">
                          @foreach($BOS as $k=>$v)
                          <option title="{{$v}}" value="{{$k}}">{{$v}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="BO" class="col-form-label col-md-5">Thème:</label>
                        <select class="form-control form-control-sm" id="example" name="themeu"  aria-label="Default select example">
                          @foreach($themes as $k=>$v)
                          <option  value="{{$k}}">{{$v}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="BO" class="col-form-label col-md-5">Activité:</label>
                        <select class="form-control form-control-sm" id="example" name="activiteu"  aria-label="Default select example">
                          @foreach($activity as $k=>$v)
                          <option  value="{{$k}}">{{$v}}</option>
                          @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="Nomu" class="col-form-label col-md-5">Nom:</label>
                        <input type="text" class="form-style form-control @error('Nomu') is-invalid @enderror" id="Nomu" name="Nomu"  value="{{ old('Nomu') }}" placeholder="Nom...">
                    </div>
                    <div class="col-md-12">
                        <label for="descriptionu" class="col-form-label col-md-5">Description:</label>
                        <textarea  class="form-style form-control @error('descriptionu') is-invalid @enderror"  name="descriptionu" id="descriptionu" cols="30" rows="2"  >{{ old('descriptionu') }}</textarea>
                    </div>
                   
                </div>
                <div class="form-group row">
                <div class="col-md-12">
                        <label for="dateu" class="col-form-label col-md-5">Date:</label>
                        <input type="dateu" class="form-style form-control @error('dateu') is-invalid @enderror" id="dateu" name="dateu" value="{{ old('dateu') }}" placeholder="Date...">
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
                          <button data-toggle="modal" class="btn btn-primary" data-target="#addmodal"><i class="fas fa-plus-square pr-2 fa-lg"></i>Ajouter un Texte</button>
      </div>
                    </div>
		        </div>
                    <!-- column -->
                    <div class="col-md-12 mt-4">
                        <div class="card">
                            <h5 class="card-header">Textes</h5>
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
                                            <th class="border-top-0">N°Texte</th>
                                            <th class="border-top-0">Catégorie</th>
                                            <th class="border-top-0">Nom</th>
                                            <th class="border-top-0">Description</th>
                                            <th class="border-top-0">Date</th>
                                            <th class="border-top-0">BO</th>
                                            <th class="border-top-0">Thème</th>
                                            <th class="border-top-0">Activité</th>
                                            <th class="border-top-0">Publié/non Publié</th>
                                            <th class="border-top-0">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($texts))
                                    @foreach ($texts as $text)
                                        <tr>       
                                            <td>{{$text->id}}</td>
                                            <td>{{$text->category_id}}</td>
                                            <td>{{$text->name}}</td>
                                            <td>{{$text->description}}</td>
                                            <td>{{$text->date}}</td>
                                            <td>{{$text->bo_id}}</td>
                                            <td>{{$text->theme_id}}</td>
                                            <td>{{$text->activity_id}}</td>
                                            <td>{{$text->state}}</td>
                                            <td>
                                              @if($text->state=="Non Publié")
                                            <a tabindex="0"  role="button" data-toggle="popover" data-trigger="focus" title="Vous êtes sûr vous voulez partager le text <a href='/'>oui</a> <a href='/'>non</a>"><i class="fas fa-share-alt"></i></a>
                                            @endif
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