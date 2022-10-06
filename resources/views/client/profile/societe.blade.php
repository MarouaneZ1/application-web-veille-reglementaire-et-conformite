@extends('client.parent')
@section('content')
<div class="row d-flex justify-content-center p-5">
<form id="form" action="/editprofile" class="alert-info border p-2" method="POST">
     @csrf
                <h5 class="row text-center d-flex justify-content-center" >Modification Société</h5><hr>
                <div class="form-group row">
                    <div class="col-md-6">
                    <label for="Nomentreprise" class="col-form-label col-md-7">Nom entreprise:</label>
                        <input type="text" class="form-style form-control" id="Nomentreprise" name="Nomentreprise" value="{{ old('Nomentreprise',$info[0]->name) }}"  placeholder="Nom entreprise...">
                        @error('Nomentreprise')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-6">
                    <label for="Npatente" class="col-form-label col-md-7">N°Patente:</label>
                        <input type="text" class="form-style form-control @error('Npatente') is-invalid @enderror" value="{{ old('Npatente',$info[0]->patente) }}" id="Npatente" name="Npatente"  placeholder="N°Patente...">
                        @error('Npatente')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="ice" class="col-form-label col-md-12">Identifiant Commun de l'Entreprise (ICE):</label>
                        <input type="text" class="form-style form-control" id="ice" name="ice" value="{{ old('ice',$info[0]->ICE) }}" placeholder="ice...">
                        @error('ice')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="idf" class="col-form-label col-md-12">Identifiant Fiscal (IF) :</label>
                        <input type="text" class="form-style form-control" id="idf" name="idf" value="{{ old('idf',$info[0]->IDF) }}" placeholder="idfIDF...">
                        @error('idf')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="rc" class="col-form-label col-md-12">Registre de Commerce (RC):</label>
                        <input type="text" class="form-style form-control" id="rc" name="rc" value="{{ old('rc',$info[0]->RC) }}" placeholder="RC...">
                        @error('rc')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="cnss" class="col-form-label col-md-12">CNSS:</label>
                        <input type="text" class="form-style form-control" id="cnss" name="cnss" value="{{ old('cnss',$info[0]->CNSS) }}" placeholder="CNSS...">
                        @error('cnss')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="Tel" class="col-form-label col-md-5">Telephone:</label>
                        <input type="text" class="form-style form-control" id="Tel" name="Tel" value="{{ old('Tel',$info[0]->tel) }}" placeholder="Telephone...">
                        @error('Tel')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="Fax" class="col-form-label col-md-5">Fax:</label>
                        <input type="text" class="form-style form-control" id="Fax" name="Fax" value="{{ old('Fax',$info[0]->fax) }}" placeholder="Fax...">
                        @error('Fax')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="Nom_Contact" class="col-form-label col-md-12">Nom Contact:</label>
                        <input type="text" class="form-style form-control" id="Nom_Contact" name="Nom_Contact" value="{{ old('Nom_Contact',$info[0]->contact_name) }}" placeholder="Nom Contact...">
                        @error('Nom_Contact')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-4">
                        <label for="Telephone_du_Contact" class="col-form-label col-md-12">Telephone du Contact:</label>
                        <input type="text" class="form-style form-control" id="Telephone_du_Contact" name="Telephone_du_Contact" value="{{ old('Telephone_du_Contact',$info[0]->contact_tel) }}" placeholder="Telephone du Contact...">
                        @error('Telephone_du_Contact')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-4">
                        <label for="Email_contact" class="col-form-label col-md-12">Email du Contact:</label>
                        <input type="text" class="form-style form-control" id="Email_contact" name="Email_contact" value="{{ old('Email_contact',$info[0]->contact_mail) }}" placeholder="Email du Contact...">
                        @error('Email_contact')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group row p-3 mb-3">
                    <label for="Adresse_entreprise" class="col-form-label col-md-12">Adresse de l'entrepise:</label>
                        <textarea class="form-style form-textarea form-control" id="Adresse_entreprise" name="Adresse_entreprise" placeholder="Adresse de l'entrepise...">{{ old('Adresse_entreprise',$info[0]->adresse) }}</textarea>
                        @error('Adresse_entreprise')<span style="color:red;">{{ $message }}</span>@enderror
                </div>
                <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
</form>

</div>
@endsection