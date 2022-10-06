@extends('Suser.SUser')
@section('pcontent')

        <div class="container-fluid px-lg-4">

                    <!-- column -->
                    <div class="col-md-12 mt-4 ">
                        <div class="card pb-5">
                            <h5 class="card-header">Utilisateurs</h5>
                            <div class="card-body">
                                <!-- title -->
                                
                                <div class="d-md-flex align-items-center">
                                
                                </div>
                                <!-- title -->
                            </div>
            <div class="container">
            <form action="/addusers"  method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="Nom" class="col-form-label col-md-5">Nom:</label>
                        <input type="text" class="form-style form-control @error('Nom') is-invalid @enderror" id="Nom" name="Nom"  value="{{ old('Nom') }}" placeholder="Nom...">
                    </div>
                    <div class="col-md-4">
                        <label for="Prenom" class="col-form-label col-md-5">Prenom:</label>
                        <input type="text" class="form-style form-control @error('Prenom') is-invalid @enderror" id="Prenom" name="Prenom" value="{{ old('Prenom') }}" placeholder="Prenom...">
                    </div>
                    <div class="col-md-4">
                        <label for="cin" class="col-form-label col-md-5">CIN:</label>
                        <input type="text" class="form-style form-control @error('cin') is-invalid @enderror" id="cin" name="cin" value="{{old('cin') }}" placeholder="CIN...">
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="Email" class="col-form-label col-md-5">Email:</label>
                        <input type="text" class="form-style form-control @error('Email') is-invalid @enderror" id="Email" name="Email"  value="{{old('Email') }}" placeholder="Email...">
                    </div>
                    <div class="col-md-6">
                        <label for="Tel" class="col-form-label col-md-5">Téléphone:</label>
                        <input type="text" class="form-style form-control @error('Tel') is-invalid @enderror" id="Tel" name="Tel"  value="{{old('Tel') }}" placeholder="Tel...">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md">
                        <label for="theme" class="col-form-label col-md-5">Théme:</label>
                        @if(isset($themesdb))
                        @foreach($themesdb as $k=>$v)
                        <div class="form-check">
                             <input class="form-check-input" type="checkbox" id="{{$v->name}}" name="theme[]" value="{{$v->id}}"/>
                            <label class="form-check-label" for="{{$v->name}}">{{$v->name}}</label>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
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