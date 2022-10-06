@extends('user_dashboard.index')
@section('TR','active')
@section('text','show')
@section('Bulletins Officiels','bg-danger')
@section('pagecontent')
<script>
    function getid(button){
    let idch=button.parentElement.parentElement;
    document.getElementById("nameu").value=idch.children[1].innerText;
    document.getElementById("Dateu").value=idch.children[2].innerText.replace(' ', 'T');
    document.getElementById("id").value=idch.children[0].innerText;
                }
    function getid2(id){ 
    let idch=id.parentElement.parentElement;                  
    document.getElementById("formdelete").action="/dashboard/TexteReglementaire/BO/delete/"+idch.children[0].innerText;}

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
      <form action="/dashboard/TexteReglementaire/BO/addBO/"  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="name" class="col-form-label col-md-5">Name:</label>
                        <input type="text" class="form-style form-control @error('name') is-invalid @enderror" id="name" name="name"  value="{{ old('name') }}" placeholder="name...">

                    </div>
                    <div class="col-md-12">
                        <label for="Date" class="col-form-label col-md-5">Date:</label>
                        <input type="datetime-local" value="2021-01-07T00:00" class="form-style form-control @error('Date') is-invalid @enderror" id="Date" name="Date" value="{{ old('Date') }}" placeholder="Date...">

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="File" class="col-form-label col-md-5">File:</label>
                        <input type="file" class="form-style form-control @error('File') is-invalid @enderror" id="File" name="File"  value="{{ old('File') }}" placeholder="File...">

                    </div>
                    <div class="col-md-4">
                        <label for="Jours Arabe" class="col-form-label col-md-12">Jours Arabe:</label>
                        <select name="JoursArabe" class="form-style form-control " id="JoursArabe"></select>
                    </div>
                    <div class="col-md-4">
                        <label for="Mois Arabe" class="col-form-label col-md-12">Mois Arabe:</label>
                        <select name="MoisArabe" class="form-style form-control " id="MoisArabe"></select>
                    </div>
                    <div class="col-md-4">
                        <label for="Annés Arabe" class="col-form-label col-md-12">Annés Arabe:</label>
                        <select name="Annesarabe" class="form-style form-control " id="Annesarabe"></select>

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
      <form action="/dashboard/TexteReglementaire/BO/update/"  method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" style="display:none;" id="id" name="id"  value="{{ old('id') }}">
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="nameu" class="col-form-label col-md-5">Name:</label>
                        <input type="text" class="form-style form-control @error('nameu') is-invalid @enderror" id="nameu" name="nameu"  value="{{ old('nameu') }}" placeholder="name...">
                    </div>
                    <div class="col-md-12">
                        <label for="Dateu" class="col-form-label col-md-5">Date:</label>
                        <input type="datetime-local" value="2021-01-07T00:00" class="form-style form-control @error('Dateu') is-invalid @enderror" id="Dateu" name="Dateu" value="{{ old('Dateu') }}" placeholder="Date...">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="Fileu" class="col-form-label col-md-5">File:</label>
                        <input type="file" class="form-style form-control @error('Fileu') is-invalid @enderror" id="Fileu" name="File"  value="{{ old('Fileu') }}" placeholder="File...">
                    </div>
                    <div class="col-md-4">
                        <label for="Jours Arabe" class="col-form-label col-md-12">Jours Arabe:</label>
                        <select name="JoursArabeu" class="form-style form-control " id="JoursArabeu"></select>
                    </div>
                    <div class="col-md-4">
                        <label for="Mois Arabe" class="col-form-label col-md-12">Mois Arabe:</label>
                        <select name="MoisArabeu" class="form-style form-control " id="MoisArabeu"></select>
                    </div>
                    <div class="col-md-4">
                        <label for="Annés Arabe" class="col-form-label col-md-12">Annés Arabe:</label>
                        <select name="Annesarabeu" class="form-style form-control " id="Annesarabeu"></select>
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
                          <button data-toggle="modal" class="btn btn-primary" data-target="#addmodal"><i class="fas fa-plus-square pr-2 fa-lg"></i>Ajouter un bulletin officiel</button>
      </div>
                    </div>
		        </div>
                    <!-- column -->
                    <div class="col-md-12 mt-4">
                        <div class="card">
                            <h5 class="card-header">Bulletin officiel</h5>
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
                                                <th class="border-top-0">Name</th>
                                                <th class="border-top-0">Date</th>
                                                <th class="border-top-0">File</th>
                                                <th class="border-top-0">Jours Arabe</th>
                                                <th class="border-top-0">Mois Arabe</th>
                                                <th class="border-top-0">Année Arabe</th>
                                                <th class="border-top-0">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($BOs))
                                    @foreach ($BOs as $BO)
                                        <tr>
                                            <td>{{$BO->id}}</td>
                                            <td>{{$BO->name}}</td>
                                            <td>{{$BO->date}}</td>
                                            <td>{{$BO->file}}</td>
                                            <td>{{$BO->day_arabe}}</td>
                                            <td>{{$BO->mount_arabe}}</td>
                                            <td>{{$BO->year_arabe}}</td>
                                            <td>
                                                <a href="{{ asset('storage/'.$BO->file) }}" class="badge badge-light" target="_blank"><i class="fas fa-search"></i></a>
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
        <script>
var Amonths = ["Muharram", "Safar" ,"Rabi al-awwal", "Rabi al-thani", "Jumada al-awwal", "Jumada al-thani", "Rajab", "Shaaban", "Ramadan", "Shawwal", "Dhu al-Qidah" ,"Dhu al-Hijjah"];     
var sel = document.getElementById('MoisArabeu');
var sel2 = document.getElementById('MoisArabe');
var sela = document.getElementById('JoursArabeu');
var sela2 = document.getElementById('JoursArabe');
var sely = document.getElementById('Annesarabeu');
var sely2 = document.getElementById('Annesarabe');
function mois(sel,table) {
    for(var i = 0; i < table.length; i++) {
    var opt = document.createElement('option');
    opt.innerHTML = table[i];
    opt.value = table[i];
    sel.appendChild(opt);}
}
function JJYY(db,fn,select) {
    for(var i = db; i < fn; i++) {
    var opt = document.createElement('option');
    opt.innerHTML = i;
    opt.value = i;
    select.appendChild(opt);}
}
mois(sel,Amonths);
mois(sel2,Amonths);
JJYY(1,31,sela);
JJYY(1,31,sela2);
JJYY(1318,1500,sely);
JJYY(1318,1500,sely2);
        </script>
@endsection