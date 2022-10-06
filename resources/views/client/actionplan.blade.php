
<html>
<head>
    <title>How to Use Summernote WYSIWYG Editor with Laravel? - ItSolutionStuff.com</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <style>
        body{
            background-color: #D7E2D8;
        }
    </style>
</head>
<body>
    <div class="container">
    <h4 class="text-center mt-5"><i class="fas fa-hands-helping pr-3"></i>Facilitez votre vie
    </h4>
    <hr>
    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::get('etat'))
                    <div class="alert alert-success">
                    {{ Session::get('etat') }}
                    </div>
                 @endif 
                 
                 @if($texts_plan->isEmpty() and $texts->isEmpty() and  $texts_plan_new->isEmpty())
                 <div class="card  alert-warning mb-3" >
            <div class="card-header"><i class="fas fa-exclamation-circle pr-3"></i>Plans d'actions pour ce théme n'est pas encore Créé !</div>
            <div class="card-body">
                <p class="card-text">Si vous n'avez pas encore évaluez les textes de lois qui vous concernent ! Pensez à les évaluer pour mettre un plan d'actions dans le cas où ils ne sont pas conformes avec ce votre entreprise </p>
            </div>
              </div>
              @endif

              @if($texts_plan_new->isNotEmpty())
     
              <div class="alert alert-danger">
              <i class="fas fa-bell mr-3"></i>Des plans d'actions assignés à Vous !
                    </div>
    @foreach($texts_plan_new as $tplan_new)
    <form action="/actionplanaccompliuser/{{$tplan_new->id}}" method="POST">
    @csrf
    <div class="card text-center" >
    <div class="card-header mt-2 col-md-12">
        <div class=" h6">{{$tplan_new->description}}</div>
    </div>
  <div class="container">
  <div class="card-body">
      <div class="card mb-2">
          <div class="card-header">{{$tplan_new->title}}
          </div>
          <div class="card-body">
              <?php echo $tplan_new->content ?>
          </div>
       </div> 
    <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <p class="font-weight-bolder  text-secondary col-md-4">Status:</p>
                        <p class=" col-md-8">{{$tplan_new->status}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                    <p class="font-weight-bolder text-secondary col-md-4">Type d'actions:</p>
                    <p class=" col-md-8">{{$tplan_new->type}}</p>
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <p class="font-weight-bolder text-secondary col-md-4">Initié par:</p>
                        <p class=" col-md-8">{{$tplan_new->creator_last." ".$tplan_new->creator_first}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                    <p class="font-weight-bolder text-secondary col-md-4">Criticité:</p>
                    @if($tplan_new->criticality=='Mineure')
					<p class="col-md-8"><span class="badge badge-pill badge-info ">{{$tplan_new->criticality}}</span></p>
					@endif
					@if($tplan_new->criticality=='Majeure')
					<p class="col-md-8"><span class="badge badge-pill badge-secondary ">{{$tplan_new->criticality}}</span></p>
					@endif
					@if($tplan_new->criticality=='Sévére')
					<p class="col-md-8"><span class="badge badge-pill badge-warning ">{{$tplan_new->criticality}}</span></p>
					@endif
					@if($tplan_new->criticality=='Bloquante')
					<p class="col-md-8"><span class="badge badge-pill badge-danger ">{{$tplan_new->criticality}}</span></p>
					@endif
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <p class="font-weight-bolder text-secondary col-md-4">Assigné à:</p>
                        <p class=" col-md-8">Vous : {{$tplan_new->user_last." ".$tplan_new->user_first}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                    <p class="font-weight-bolder text-secondary col-md-4">Date d'échéance:</p>
                    <p class=" col-md-8">{{$tplan_new->date}}</p>
                    </div>
                </div>
                
            </div> 
            <div class="row d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-success "><i class="fas fa-clipboard-check pr-3"></i>Plan Accompli</button>
                    </div>

         
    </div>


  </div>
 
</div>
</div>
<hr>

    </form>
  @endforeach
    @endif












              @if($texts_plan->isNotEmpty())
              <div class="alert alert-warning">
              <i class="fas fa-bell mr-3"></i>Des plans d'actions Crée par Vous !
                    </div>   
    @foreach($texts_plan as $tplan)
    <form action="/actionplanaccompliuser/{{$tplan->id}}" method="POST">
    @csrf
    <div class="card text-center" >
    <div class="card-header mt-2 col-md-12">
        <div class=" h6">{{$tplan->description}}</div>
    </div>
  <div class="container">
  <div class="card-body">
      <div class="card mb-2">
          <div class="card-header">{{$tplan->title}}<div class=" d-flex justify-content-center mt-2"><a href="/updateplanpageuser/{{$tplan->id}}/{{$theme_plan}}" type="button" class="btn btn-outline-primary mr-2">Modifier</a><a href="/deleteplanuser/{{$tplan->id}}" type="button" class="btn btn-outline-danger">Supprimer</a></div>
          </div>
          <div class="card-body">
              <?php echo $tplan->content ?>
          </div>
       </div> 
    <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <p class="font-weight-bolder  text-secondary col-md-4">Status:</p>
                        <p class=" col-md-8">{{$tplan->status}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                    <p class="font-weight-bolder text-secondary col-md-4">Type d'actions:</p>
                    <p class=" col-md-8">{{$tplan->type}}</p>
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <p class="font-weight-bolder text-secondary col-md-4">Initié par:</p>
                        <p class=" col-md-8">{{$tplan->creator_last." ".$tplan->creator_first}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                    <p class="font-weight-bolder text-secondary col-md-4">Criticité:</p>
                    @if($tplan->criticality=='Mineure')
					<p class="col-md-8"><span class="badge badge-pill badge-info ">{{$tplan->criticality}}</span></p>
					@endif
					@if($tplan->criticality=='Majeure')
					<p class="col-md-8"><span class="badge badge-pill badge-secondary ">{{$tplan->criticality}}</span></p>
					@endif
					@if($tplan->criticality=='Sévére')
					<p class="col-md-8"><span class="badge badge-pill badge-warning ">{{$tplan->criticality}}</span></p>
					@endif
					@if($tplan->criticality=='Bloquante')
					<p class="col-md-8"><span class="badge badge-pill badge-danger ">{{$tplan->criticality}}</span></p>
					@endif
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <p class="font-weight-bolder text-secondary col-md-4">Assigné à:</p>
                        <p class=" col-md-8">{{$tplan->user_last." ".$tplan->user_first}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                    <p class="font-weight-bolder text-secondary col-md-4">Date d'échéance:</p>
                    <p class=" col-md-8">{{$tplan->date}}</p>
                    </div>
                </div>
            </div> 
            <div class="row d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-success "><i class="fas fa-clipboard-check pr-3"></i>Plan Accompli</button>
                    </div>

         
    </div>


  </div>
 
</div>
</div>
<hr>

    </form>
  @endforeach
    @endif
    @if($texts->isNotEmpty())
    <h6 class="alert alert-warning"><i class="fas fa-bell-slash mr-3"></i>Des Textes Non Conformes Sans Plans d'Action </h6>
    @foreach($texts as $k=>$v)
        <div class="row">
            <div class="col-md mt-2">
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white">{{$v}} </h6>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="/actionplanuser/{{$k}}" >
                            @csrf
                            <div class="form-group">
                                <label>Titre</label>
                                <input type="text" name="title" class="form-control"/>
                            </div>  
                            <div class="form-group">
                                <label><strong>Actions :</strong></label>
                                <textarea class="summernote" name="description"></textarea>
                            </div>
                            <div class="form-group row  text-center">
                                <div class="col-md-12">
                                   <h5 class="col-form-label col-md-5 text-left">Exigences:</h5>
                                    <hr>
                                    @if(isset($exigences[$k]))
                                    <div class="row">
                                  <div class="col-md-11">
                                  @foreach($exigences[$k] as $l=>$m)
                                      @if(isset($m))
                                    <li class="text-left"><?php echo $m; ?></li>
                                    @endif
                                  @endforeach
                                   </div>
                                     
                               
                                <div class="col-md-1">
                                    <span
                                    class="badge badge-danger offer-badge  float-right d-flex justify-content-end">Non Conforme</span>
                                </div>
                      
                                        
                                </div>
                            @endif


                                   
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="row">
                                    <div class="col-md-6">
                                        <label for="Tel" class="col-form-label col-md-12">Type d'action:</label>
                                        <select class="form-control form-style @error('typecriticity') is-invalid @enderror" name="type" value="statut">
                                            <option>Corrective</option>
                                            <option>Currative</option>
                                            <option>Préventive</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="statut" class="col-form-label col-md-12">Statut:</label>
                                        <select class="form-control form-style @error('statut') is-invalid @enderror" name="statut" value="{{old('statut')}}">
                                            <option>Nouveau</option>
                                            <option>En Cours..</option>
                                        
                                        </select>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-4">
                                            <label for="criticity" class="col-form-label col-md-12">Criticité:</label>
                                            <select class="form-control form-style @error('criticity') is-invalid @enderror" name="criticity" value="">
                                            <option>Mineure</option>
                                            <option>Majeure</option>
                                            <option>Sévére</option>
                                            <option>Bloquante</option>
                                            </select>
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <label for="user" class="col-form-label col-md-12">Assigné à:</label>
                                        <select class="form-control form-style @error('user') is-invalid @enderror" name="user" >
                                        <option value="{{session('Loggedclient')}}">Moi</option>
                                     
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                    <div class="row mt-4">
                                        <div class="datepicker date input-group p-0 shadow-sm">
                                                <input type="text" name='date' placeholder="Choisir une date .." class="form-control py-4 px-4" id="reservationDate">
                                                <div class="input-group-append"><span class="input-group-text px-4"><i class="fa fa-clock-o"></i></span></div>
                                        </div>
                                    </div>
                                    </div>
                                        </div>
                            

                                  
                            </div>
                            
                           
                        <div class="d-flex justify-content-center pt-5">
                            
                                <button type="submit" class="text-center btn btn-success btn-sm ">Enregistrer</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <hr>
       
          
    @endforeach 
    @endif
    </div>
    
    <script>$(function () {

// INITIALIZE DATEPICKER PLUGIN
$('.datepicker').datepicker({
    clearBtn: true,
    format: "yyyy-mm-dd"
});


// FOR DEMO PURPOSE
$('#reservationDate').on('change', function () {
    var pickedDate = $('input').val();
    $('#pickedDate').html(pickedDate);
});
});</script>
    <script type="text/javascript">
        $(document).ready(function() {
          $('.summernote').summernote();
        });
    </script>
</body>
</html>



