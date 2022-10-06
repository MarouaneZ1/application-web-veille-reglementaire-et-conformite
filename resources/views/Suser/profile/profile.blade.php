@extends('Suser.SUser')
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
         
         <div class="col-md-12">
           <div class="card mb-3 ">
           <div class="card-header">
                      <h5 class="text-center d-flex justify-content-center">Société</h5>
                    </div>
             <div class="card-body "id="society-error">
                    @if(Session::get('fail'))
                    <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                    </div>
                    @endif
                    @if(Session::get('success'))
                    <div class="alert alert-success">
                    {{ Session::get('success') }}
                    </div>
                    @endif 
               <div class="row">
                  <div class="col-sm-4">
                     <h6 class="mb-0">Nom du Société </h6>
                 
                  </div>
                 <div class="col-sm-8 text-secondary  society" id="0">
              {{$societies->name}}
                 </div>
              </div>
               <hr>
              <div class="row">
                 <div class="col-sm-4">
                   <h6 class="mb-0">ICE</h6>
                 
                 </div>
                 <div class="col-sm-8 text-secondary society" id="1">
                 {{$societies->ICE}}
                 </div>
               </div>
               <hr>
               <div class="row">
                 <div class="col-sm-4">
                   <h6 class="mb-0">IF</h6>
                 </div>
                 <div class="col-sm-8 text-secondary society" id="2">
                 {{$societies->IDF}}
                 </div>
               </div>
               <hr>
               <div class="row">
                 <div class="col-sm-4">
                   <h6 class="mb-0">RC</h6>
                 </div>
                 <div class="col-sm-8 text-secondary society" id="3">
                 {{$societies->RC}}
                 </div>
               </div>
              
               <hr>
               <div class="row">
                 <div class="col-sm-4">
                   <h6 class="mb-0">CNSS</h6>
                 
                 </div>
                 <div class="col-sm-8 text-secondary society" id="4">
                 {{$societies->CNSS}}
                 </div>
               </div>
               <hr>
               <div class="row">
                 <div class="col-sm-4">
                   <h6 class="mb-0">N° Patente</h6>
                 
                 </div>
                 <div class="col-sm-8 text-secondary society" id="5">
                 {{$societies->patente}} 
                 </div>
               </div>
               <hr>
               <div class="row">
                 <div class="col-sm-4">
                   <h6 class="mb-0">Téléphone de la société</h6>
                 
                 </div>
                 <div class="col-sm-8 text-secondary society" id="6">
                 {{$societies->tel}} 
                 </div>
               </div>
               <hr>
               <div class="row">
                 <div class="col-sm-4">
                   <h6 class="mb-0">Fax</h6>
                 
                 </div>
                 <div class="col-sm-8 text-secondary society" id="7">
                 {{$societies->fax}} 
                 </div>
               </div>
               <hr>
               <div class="row">
                 <div class="col-sm-4">
                   <h6 class="mb-0">Adresse</h6>
                 
                 </div>
                 <div class="col-sm-8 text-secondary society" id="8">
                 {{$societies->adresse}} 
                 </div>
               </div>
               <hr>
               <div class="row">
                 <div class="col-sm-4">
                   <h6 class="mb-0">Nom du Contact</h6>
                 
                 </div>
                 <div class="col-sm-8 text-secondary society" id="9">
                 {{$societies->contact_name}} 
                 </div>
               </div>
               <hr>
               <div class="row">
                 <div class="col-sm-4">
                   <h6 class="mb-0">Email du Contact</h6>
                 
                 </div>
                 <div class="col-sm-8 text-secondary society" id="10">
                 {{$societies->contact_mail}} 
                 </div>
               </div>
               <hr>
               <div class="row">
                 <div class="col-sm-4">
                   <h6 class="mb-0">Téléphone du Contact</h6>
                 
                 </div>
                 <div class="col-sm-8 text-secondary society" id="11">
                 {{$societies->contact_tel}} 
                 </div>
               </div>
               <hr>
               <div class="row">
                 <div class="col-sm-12 text-center d-flex justify-content-center">
                   <a class="btn  " style="color:white;background-color:blue;" href="/editsociety" >Modifier</a>
                 </div>
               </div>
             </div>
           </div>
           </div>
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
                {{$societies->name}} 
                 </div>
               </div>
               <hr>
               <div class="row">
                 <div class="col-sm-12 text-center d-flex justify-content-center">
                   <a class="btn  " style="color:white;background-color:blue;"  id="editresponsible" href="/responsable" >Modifier</a>
                 </div>
               </div>
             </div>
           </div>
           </div>
    
         
 
            
                <div class="col-md-12 ">
                  <div class="card mb-3">
                    <div class="card-header">
                      <h5 class="text-center d-flex justify-content-center">Secteurs D'activités </h5>
                    </div>
                    <ul class="list-group list-group-flush">
                    @foreach ($activity as $ac)
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"> {{$ac}} </h6> 
                    @endforeach
                    
                      
                    </ul>
                  </div>
                </div>
                </div>            
          </div>
        </div>



@endsection