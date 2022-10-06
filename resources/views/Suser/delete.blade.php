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
            <form action="/deletepage/{{$id}}"  method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="Nom" class="col-form-label col-md-5">Nom:</label>
                        <input type="text" class="form-style form-control @error('Nom') is-invalid @enderror" id="Nom" name="Nom"  value="{{ $user->last_name }}"  readonly placeholder="Nom...">
                    </div>
                    <div class="col-md-4">
                        <label for="Prenom" class="col-form-label col-md-5">Prenom:</label>
                        <input type="text" class="form-style form-control @error('Prenom') is-invalid @enderror" id="Prenom" name="Prenom" value="{{$user->first_name }}"readonly placeholder="Prenom...">
                    </div>
                    <div class="col-md-4">
                        <label for="cin" class="col-form-label col-md-5">CIN:</label>
                        <input type="text" class="form-style form-control @error('cin') is-invalid @enderror" id="cin" name="cin" value="{{$user->CIN }}"readonly placeholder="CIN...">
                    </div>
                </div>
                
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="Email" class="col-form-label col-md-5">Email:</label>
                        <input type="text" class="form-style form-control @error('Email') is-invalid @enderror" id="Email" name="Email"  value="{{$user->email }}"readonly placeholder="Email...">
                    </div>
                    <div class="col-md-6">
                        <label for="Tel" class="col-form-label col-md-5">Téléphone:</label>
                        <input type="text" class="form-style form-control @error('Tel') is-invalid @enderror" id="Tel" name="Tel"  value="{{$user->Tel }}"readonly placeholder="Tel...">
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
                <div class="d-flex justify-content-center pt-5">
                <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading"><i class="fas fa-exclamation-triangle pr-3"></i>Vous êtes sûr de supprimer cet utilisateur ?</h4>
                <hr>
                <div class="d-flex justify-content-center pt-3">
                <button type="submit" class="btn btn-danger">Supprimer</button>
               </div>
 
                </div>
          
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