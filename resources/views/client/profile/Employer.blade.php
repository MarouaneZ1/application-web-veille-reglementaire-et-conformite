@extends('client.parent')
@section('content')
<div class="row d-flex justify-content-center  p-5">
<form action="/edituserp" class="alert-info border p-2" method="POST">
     @csrf
     <h5 class="row text-center d-flex justify-content-center" >Modification Responsable</h5><hr>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="Nom" class="col-form-label col-md-5">Nom:</label>
                        <input type="text" class="form-style form-control @error('Nom') is-invalid @enderror" id="Nom" name="Nom"  value="{{ old('Nom',$info[0]->last_name) }}" placeholder="Nom...">
                        @error('Nom')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-12">
                        <label for="Prenom" class="col-form-label col-md-5">Prenom:</label>
                        <input type="text" class="form-style form-control @error('Prenom') is-invalid @enderror" id="Prenom" name="Prenom" value="{{ old('Prenom',$info[0]->first_name) }}" placeholder="Prenom...">
                        @error('Prenom')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-12">
                        <label for="cin" class="col-form-label col-md-5">CIN:</label>
                        <input type="text" class="form-style form-control @error('cin') is-invalid @enderror" id="cin" name="cin" value="{{ old('cin',$info[0]->CIN) }}" placeholder="CIN...">
                        @error('cin')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="Email" class="col-form-label col-md-5">Email:</label>
                        <input type="text" class="form-style form-control @error('Email') is-invalid @enderror" id="Email" name="Email"  value="{{ old('Email',$info[0]->email) }}" placeholder="Email...">
                        @error('Email')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-12">
                        <label for="Telephone" class="col-form-label col-md-5">Telephone:</label>
                        <input type="text" class="form-style form-control @error('Telephone') is-invalid @enderror" id="Telephone" name="Telephone" value="{{ old('Telephone',$info[0]->Tel) }}" placeholder="Telephone...">
                        @error('Telephone')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
</form>

</div>
@endsection