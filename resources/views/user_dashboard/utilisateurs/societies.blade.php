@extends('user_dashboard.index')
@section('utilisateur','active')
@section('Sociétés','bg-danger')
@section('table','show')
@section('pagecontent')
<script>
function getid(button){

  let idch=button.parentElement.parentElement;
  document.getElementById("id").value=idch.children[0].innerText;
  document.getElementById("Npatente").value=idch.children[1].innerText;
  document.getElementById("ice").value=idch.children[2].innerText;
  document.getElementById("idf").value=idch.children[3].innerText;
  document.getElementById("rc").value=idch.children[4].innerText;
  document.getElementById("cnss").value=idch.children[5].innerText;
 document.getElementById("nameu").value=idch.children[6].innerText;
 document.getElementById("adresseu").value=idch.children[7].innerText;
 document.getElementById("telu").value=idch.children[8].innerText;
document.getElementById("faxu").value=idch.children[9].innerText;
document.getElementById("contact_nameu").value=idch.children[10].innerText;
document.getElementById("contact_telu").value=idch.children[11].innerText;
 document.getElementById("contact_mailu").value=idch.children[12].innerText;
               }
function getid2(id){ 
let idch=id.parentElement.parentElement;                  
document.getElementById("formdelete").action="/dashboard/utilisateurs/societies/delete/"+idch.children[0].innerText;}
</script>
<!-- Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ajouter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/dashboard/utilisateurs/societies/update/" id="form" method="POST">
                @csrf
                <input type="text" style="display:none;" id="id" name="id"  value="{{ old('id') }}">
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="nameu" class="col-form-label col-md">Nom:</label>
                        <input type="text" class="form-style form-control @error('nameu') is-invalid @enderror" id="nameu" name="nameu"  value="{{ old('nameu') }}" placeholder="Nom...">
                        
                    </div>
                    <div class="col-md-4">
                        <label for="adresseu" class="col-form-label col-md">Adresse:</label>
                        <input type="text" class="form-style form-control @error('adresseu') is-invalid @enderror" id="adresseu" name="adresseu" value="{{ old('adresseu') }}" placeholder="adresse...">
                        
                    </div>
                    <div class="col-md-4">
                    <label for="Npatente" class="col-form-label col-md-7">N°Patente:</label>
                        <input type="text" class="form-style form-control @error('Npatente') is-invalid @enderror" value="{{ old('Npatente') }}" id="Npatente" name="Npatente"  placeholder="N°Patente..."> 
                        
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="ice" class="col-form-label col-md-12">Identifiant Commun de l'Entreprise (ICE):</label>
                        <input type="text" class="form-style form-control" id="ice" name="ice" value="{{ old('ice') }}" placeholder="ice...">
                       
                    </div>
                    <div class="col-md-6">
                        <label for="idf" class="col-form-label col-md-12">Identifiant Fiscal (IF) :</label>
                        <input type="text" class="form-style form-control" id="idf" name="idf" value="{{ old('idf') }}" placeholder="idfIDF...">
                        
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="rc" class="col-form-label col-md-12">Registre de Commerce (RC):</label>
                        <input type="text" class="form-style form-control" id="rc" name="rc" value="{{ old('rc') }}" placeholder="RC...">
                        
                    </div>
                    <div class="col-md-6">
                        <label for="cnss" class="col-form-label col-md-12">CNSS:</label>
                        <input type="text" class="form-style form-control"  id="cnss"name="cnss" value="{{ old('cnss') }}" placeholder="CNSS...">
                       
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="telu" class="col-form-label col-md">Tel:</label>
                        <input type="text" class="form-style form-control @error('telu') is-invalid @enderror" id="telu" name="telu"  value="{{ old('telu') }}" placeholder="tel...">
                        
                    </div>
                    <div class="col-md-6">
                        <label for="faxu" class="col-form-label col-md">Fax:</label>
                        <input type="text" class="form-style form-control @error('faxu') is-invalid @enderror" id="faxu" name="faxu" value="{{ old('faxu') }}" placeholder="fax...">
                        
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="contact_nameu" class="col-form-label col-md">Contact name:</label>
                        <input type="text" class="form-style form-control @error('contact_nameu') is-invalid @enderror" id="contact_nameu" name="contact_nameu"  value="{{ old('contact_nameu') }}" placeholder="contact name...">
                        
                    </div>
                    <div class="col-md-4">
                        <label for="contact_tel" class="col-form-label col-md">Contact tel :</label>
                        <input type="text" class="form-style form-control @error('contact_telu') is-invalid @enderror" id="contact_telu" name="contact_telu" value="{{ old('contact_telu') }}" placeholder="contact tel...">
                        
                    </div>
                    <div class="col-md-4">
                        <label for="contact_mailu" class="col-form-label col-md">Contact mail:</label>
                        <input type="email" class="form-style form-control @error('contact_mailu') is-invalid @enderror" id="contact_mailu" name="contact_mailu" value="{{ old('contact_mailu') }}" placeholder="contact mail...">
                        
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
<!-- Modal -->
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
      <form action="/dashboard/utilisateurs/societies/addsociety/" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="name" class="col-form-label col-md">Nom:</label>
                        <input type="text" class="form-style form-control @error('name') is-invalid @enderror" id="name" name="name"  value="{{ old('name') }}" placeholder="Nom...">
                        
                    </div>
                    <div class="col-md-4">
                        <label for="adresse" class="col-form-label col-md">Adresse:</label>
                        <input type="text" class="form-style form-control @error('adresse') is-invalid @enderror" id="adresse" name="adresse" value="{{ old('adresse') }}" placeholder="adresse...">
                        
                    </div>
                    <div class="col-md-4">
                    <label for="Npatente" class="col-form-label col-md-7">N°Patente:</label>
                        <input type="text" class="form-style form-control @error('Npatente') is-invalid @enderror" value="{{ old('Npatente') }}"  name="Npatente"  placeholder="N°Patente..."> 
                        
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="ice" class="col-form-label col-md-12">Identifiant Commun de l'Entreprise (ICE):</label>
                        <input type="text" class="form-style form-control"  name="ice" value="{{ old('ice') }}" placeholder="ice...">
                       
                    </div>
                    <div class="col-md-6">
                        <label for="idf" class="col-form-label col-md-12">Identifiant Fiscal (IF) :</label>
                        <input type="text" class="form-style form-control"  name="idf" value="{{ old('idf') }}" placeholder="idfIDF...">
                      
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="rc" class="col-form-label col-md-12">Registre de Commerce (RC):</label>
                        <input type="text" class="form-style form-control" name="rc" value="{{ old('rc') }}" placeholder="RC...">
                        
                    </div>
                    <div class="col-md-6">
                        <label for="cnss" class="col-form-label col-md-12">CNSS:</label>
                        <input type="text" class="form-style form-control"  name="cnss" value="{{ old('cnss') }}" placeholder="CNSS...">
                       
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="tel" class="col-form-label col-md">Tel:</label>
                        <input type="text" class="form-style form-control @error('tel') is-invalid @enderror" id="tel" name="tel"  value="{{ old('tel') }}" placeholder="tel...">
                        
                    </div>
                    <div class="col-md-6">
                        <label for="fax" class="col-form-label col-md">Fax:</label>
                        <input type="text" class="form-style form-control @error('fax') is-invalid @enderror" id="fax" name="fax" value="{{ old('fax') }}" placeholder="fax...">
                        
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="contact_name" class="col-form-label col-md">Contact name:</label>
                        <input type="text" class="form-style form-control @error('contact_name') is-invalid @enderror" id="contact_name" name="contact_name"  value="{{ old('contact_name') }}" placeholder="contact_name...">
                        
                    </div>
                    <div class="col-md-4">
                        <label for="contact_tel" class="col-form-label col-md">Contact tel :</label>
                        <input type="text" class="form-style form-control @error('contact_tel') is-invalid @enderror" id="contact_tel" name="contact_tel" value="{{ old('contact_tel') }}" placeholder="contact_tel...">
                        
                    </div>
                    <div class="col-md-4">
                        <label for="contact_mail" class="col-form-label col-md">Contact mail:</label>
                        <input type="email" class="form-style form-control @error('contact_mail') is-invalid @enderror" id="contact_mail" name="contact_mail" value="{{ old('contact_mail') }}" placeholder="contact_mail...">
                        
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
                        <button id="addsociety" data-toggle="modal" class="btn btn-primary" data-target="#addmodal"><i class="fas fa-plus-square pr-2 fa-lg"></i>Ajouter une nouvelle société</button>
                    </div>
		        </div>
                    <!-- column -->
                    <div class="col-md-12 mt-4">
                        <div class="card">
                            <h5 class="card-header">Sociétés</h5>
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
                                            <th class="border-top-0">N°société</th>
                                            <th class="border-top-0">N°Patente</th> 
                                            <th class="border-top-0">ICE</th>
                                            <th class="border-top-0">IF</th>
                                            <th class="border-top-0">RC</th>
                                            <th class="border-top-0">CNSS</th>
                                            <th class="border-top-0">Nom</th>
                                            <th class="border-top-0">Adresse</th>
                                            <th class="border-top-0">Tel</th>
                                            <th class="border-top-0">Fax</th>
                                            <th class="border-top-0">Nom du contact</th>
                                            <th class="border-top-0">Tel du contact</th>
                                            <th class="border-top-0">Mail du contact</th>
                                            <th class="border-top-0">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($societies))
                                    @foreach ($societies as $soc)
                                        <tr>
                                            <td>{{$soc->id}}</td>
                                            <td>{{$soc->patente}}</td>
                                            <td>{{$soc->ICE}}</td>
                                            <td>{{$soc->IDF}}</td>
                                            <td>{{$soc->RC}}</td>
                                            <td>{{$soc->CNSS}}</td>
                                            <td>{{$soc->name}}</td>
                                            <td>{{$soc->adresse}}</td>
                                            <td>{{$soc->tel}}</td>
                                            <td>{{$soc->fax}}</td>
                                            <td>{{$soc->contact_name}}</td>
                                            <td>{{$soc->contact_tel}}</td>
                                            <td>{{$soc->contact_mail}}</td>
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
		</div>
        <!-- /#page-content-wrapper -->
        <!-- modal supprimer -->
        


@endsection