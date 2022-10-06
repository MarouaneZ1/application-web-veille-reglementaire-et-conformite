@extends('forms.parent')
@section('title','step 1 user info')
@section('formcontent')
<form action="{{route('forms.addpost')}}" method="POST" class="col-md-7 p-3 border ">
                @csrf
                <div class="row text-center d-flex justify-content-center">
                <img src="{{ asset('ressources/Logos/logoS.png') }}" class="img-fluid p-1 w-50"  alt="">
                    <p class="article-recent">Vous connaissez votre entreprise, nous connaissons la <br> réglementation. Ensemble nous sommes redoutables 
                        <br> Heureux de vous acceuillir:</p>
                </div>
                <div class="border-top border-bottom pb-3 pt-3">
                        <div class="btn-group w-100 mb-2" role="group" aria-label="Basic outlined example">
                            <button type="button" class="btn btn-Light">société</button>
                            <button type="button" class="btn btn-Light">Secteurs d'activité</button>
                            <button type="button" class="btn btn-Light">Thémes</button>
                        </div>
                        <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-danger" role="progressbar"  aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                </div>
               
                <h5 class="row text-center d-flex justify-content-center" >Société</h5><hr>
                <div class="form-group row">
                    <div class="col-md-6">
                    <label for="Nomentreprise" class="col-form-label col-md-7">Nom entreprise:</label>
                        <input type="text" class="form-style form-control" id="Nomentreprise" name="Nomentreprise"  placeholder="Nom entreprise...">
                        @error('Nomentreprise')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-6">
                    <label for="Npatente" class="col-form-label col-md-7">N°Patente:</label>
                        <input type="text" class="form-style form-control @error('Npatente') is-invalid @enderror" id="Npatente" name="Npatente"  placeholder="N°Patente...">
                        @error('Npatente')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="ice" class="col-form-label col-md-12">Identifiant Commun de l'Entreprise (ICE):</label>
                        <input type="text" class="form-style form-control" id="ice" name="ice" value="{{ old('ice') }}" placeholder="ice...">
                        @error('ice')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="idf" class="col-form-label col-md-12">Identifiant Fiscal (IF) :</label>
                        <input type="text" class="form-style form-control" id="idf" name="idf" value="{{ old('idf') }}" placeholder="idfIDF...">
                        @error('idf')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="rc" class="col-form-label col-md-12">Registre de Commerce (RC):</label>
                        <input type="text" class="form-style form-control" id="rc" name="rc" value="{{ old('rc') }}" placeholder="RC...">
                        @error('rc')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="cnss" class="col-form-label col-md-12">CNSS:</label>
                        <input type="text" class="form-style form-control" id="cnss" name="cnss" value="{{ old('cnss') }}" placeholder="CNSS...">
                        @error('cnss')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="Tel" class="col-form-label col-md-5">Telephone:</label>
                        <input type="text" class="form-style form-control" id="Tel" name="Tel" value="{{ old('Tel') }}" placeholder="Telephone...">
                        @error('Tel')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="Fax" class="col-form-label col-md-5">Fax:</label>
                        <input type="text" class="form-style form-control" id="Fax" name="Fax" value="{{ old('Fax') }}" placeholder="Fax...">
                        @error('Fax')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="Nom_Contact" class="col-form-label col-md-12">Nom Contact:</label>
                        <input type="text" class="form-style form-control" id="Nom_Contact" name="Nom_Contact" value="{{ old('Nom_Contact') }}" placeholder="Nom Contact...">
                        @error('Nom_Contact')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-4">
                        <label for="Telephone_du_Contact" class="col-form-label col-md-12">Telephone du Contact:</label>
                        <input type="text" class="form-style form-control" id="Telephone_du_Contact" name="Telephone_du_Contact" value="{{ old('Telephone_du_Contact') }}" placeholder="Telephone du Contact...">
                        @error('Telephone_du_Contact')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-4">
                        <label for="Email_contact" class="col-form-label col-md-12">Email du Contact:</label>
                        <input type="text" class="form-style form-control" id="Email_contact" name="Email_contact" value="{{ old('Email_contact') }}" placeholder="Email du Contact...">
                        @error('Email_contact')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group row mb-3">
                @if(isset($regions))
                <div class="col-md-6">
                    <label for="region" class="col-form-label col-md-12">Région :</label>
                    <select class="form-control form-style @error('region') is-invalid @enderror" name="region" value="region">
                      
                    @foreach($regions as $k=>$v)                      
                    <option>{{$v}}</option>
                    @endforeach
                    </select>
                </div> 
                @endif
                <div class="col-md-6">
                    <label for="Adresse_entreprise" class="col-form-label col-md-12">Adresse de l'entrepise:</label>
                        <textarea class="form-style form-textarea form-control" id="Adresse_entreprise" name="Adresse_entreprise" value="{{ old('Adresse_entreprise') }}" placeholder="Adresse de l'entrepise..."></textarea>
                        @error('Adresse_entreprise')<span style="color:red;">{{ $message }}</span>@enderror
                </div>       
                </div>
             
                <hr><h5 class="row text-center d-flex justify-content-center" >Responsable</h5><hr>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="Nom" class="col-form-label col-md-5">Nom:</label>
                        <input type="text" class="form-style form-control @error('Nom') is-invalid @enderror" id="Nom" name="Nom"  value="{{ old('Nom') }}" placeholder="Nom...">
                        @error('Nom')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-4">
                        <label for="Prenom" class="col-form-label col-md-5">Prenom:</label>
                        <input type="text" class="form-style form-control @error('Prenom') is-invalid @enderror" id="Prenom" name="Prenom" value="{{ old('Prenom') }}" placeholder="Prenom...">
                        @error('Prenom')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-4">
                        <label for="cin" class="col-form-label col-md-5">CIN:</label>
                        <input type="text" class="form-style form-control @error('cin') is-invalid @enderror" id="cin" name="cin" value="{{ old('cin') }}" placeholder="CIN...">
                        @error('cin')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="Email" class="col-form-label col-md-5">Email:</label>
                        <input type="text" class="form-style form-control @error('Email') is-invalid @enderror" id="Email" name="Email"  value="{{ old('Email') }}" placeholder="Email...">
                        @error('Email')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="Telephone" class="col-form-label col-md-5">Telephone:</label>
                        <input type="text" class="form-style form-control @error('Telephone') is-invalid @enderror" id="Telephone" name="Telephone" value="{{ old('Telephone') }}" placeholder="Telephone...">
                        @error('Telephone')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="Mot de passe" class="col-form-label col-md">Mot de passe:</label>
                        <input type="password" class="form-style form-control @error('Motdepass') is-invalid @enderror" id="Mot de passe" name="Motdepasse" value="{{ old('Motdepasse') }}" placeholder="Mot de passe...">
                    </div>
                    <div class="col-md-6">
                        <label for="Confirmation Mot de passe" class="col-form-label col-md">Confirmation Mot de passe:</label>
                         <input type="password" class="form-style form-control @error('Motdepasse_confirmation') is-invalid @enderror" id="Confirmation Mot de passe" name="Motdepasse_confirmation" value="{{ old('Motdepasse_confirmation') }}" placeholder="Confirmation Mot de passe...">
                        
                    </div>
                </div>
                <div class="form-group row text-center">
                @error('Motdepasse')<span style="color:red;">{{ $message }}</span>@enderror
                @error('Motdepasse_confirmation')<span style="color:red;">{{ $message }}</span>@enderror
                </div>
                
                <div class="form-group text-center row">
                    <div class="col">
                        <button type="submit" class="submitbut btn btn-red btn-sm">S'inscrire</button>
                    </div>
                </div>
            </form>
@endsection