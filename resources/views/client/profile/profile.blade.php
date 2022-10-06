@extends('client.parent')
@section('content')

    <div class="container">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>


      <div class="row gutters-sm">
    
          <!-- /Breadcrumb -->
          <div class="col-md-12">
           <div class="card mb-3">
           <div class="card-header">
                      <h5  class="text-center d-flex justify-content-center">Responsable</h5>
                    </div>
             <div class="card-body">
             @if(Session::get('failresp'))
                    <div class="alert alert-danger">
                    {{ Session::get('failresp') }}
                    </div>
                    @endif
                    @if(Session::get('successresp'))
                    <div class="alert alert-success">
                    {{ Session::get('successresp') }}
                    </div>
                    @endif
               <div class="row">
                  <div class="col-sm-4">
                     <h6 class="mb-0">Nom </h6>
                 
                  </div>
                 <div class="col-sm-8 text-secondary">
                 @foreach ($users as $user)
                     
                    
                     {{ $user->last_name }}
         
                 @endforeach
                 </div>
              </div>
               <hr>
              <div class="row">
                 <div class="col-sm-4">
                   <h6 class="mb-0">Prénom</h6>
                 
                 </div>
                 <div class="col-sm-8 text-secondary">
                 @foreach ($users as $user)
                     
                    
                     {{ $user->first_name }}
         
                 @endforeach
                 </div>
               </div>
               <hr>
               <div class="row">
                 <div class="col-sm-4">
                   <h6 class="mb-0">Email</h6>
                 </div>
                 <div class="col-sm-8 text-secondary">
                 @foreach ($users as $user)
                     
                    
                     {{ $user->email }}
         
                 @endforeach
                 </div>
               </div>
               <hr>
               <div class="row">
                 <div class="col-sm-4">
                   <h6 class="mb-0">N° du téléphone</h6>
                 </div>
                 <div class="col-sm-8 text-secondary">
                   @if(isset($user->Tel))
                 @foreach ($users as $user)
                     
                    
                     {{ $user->Tel }}
         
                 @endforeach
                 @endif
                 </div>
               </div>
              
               <hr>
               <div class="row">
                 <div class="col-sm-4">
                   <h6 class="mb-0">CIN</h6>
                 
                 </div>
                 <div class="col-sm-8 text-secondary">
                 @if(isset($user->CIN))
                 @foreach ($users as $user)
                     
                    
                     {{ $user->CIN }}
         
                 @endforeach
                 @endif
                 </div>
               </div>
               <hr>
               <div class="row">
                 <div class="col-sm-4">
                   <h6 class="mb-0">Société</h6>
                 
                 </div>
                 <div class="col-sm-8 text-secondary">
                 @if(isset($societies->name))
                   {{$societies->name}}
                 @endif
                 </div>
               </div>
               <hr>
               <div class="row">
                 <div class="col-sm-12 text-center d-flex justify-content-center">
                   <a class="btn  " style="color:white;background-color:blue;"  id="editresponsible" href="/userp" >Modifier</a>
                 </div>
               </div>
             </div>
           </div>
           </div>
    
         
 
            
               
                </div>            
          </div>
        </div>



@endsection