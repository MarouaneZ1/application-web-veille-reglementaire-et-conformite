
<html>
<head>
    <title></title>
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
    <h4 class="text-center mt-5">Nouveau Plans d'Actions
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
                   
  <h6 class="alert alert-success"><i class="fas fa-check-double pr-3"></i>Pilotez Vos Plans d'actions </h6>
 
    @if($texts_plan->isNotEmpty())
    @foreach($texts_plan as $tplan)
    <form action="/actionplanaccompli/{{$tplan->id}}" method="POST">
    @csrf
    <div class="card text-center" >
    <div class="card-header mt-2 col-md-12">
        <div class=" h6">{{$tplan->description}}</div>
    </div>
  <div class="container">
  <div class="card-body">
      <div class="card mb-2">
          <div class="card-header">{{$tplan->title}}<div class=" d-flex justify-content-center mt-2"><a href="/updateplanpage/{{$tplan->id}}/{{$theme_plan}}" type="button" class="btn btn-outline-primary mr-2">Modifier</a><a href="/deleteplan/{{$tplan->id}}" type="button" class="btn btn-outline-danger">Supprimer</a></div>
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
                        <form method="POST" action="/actionplan/{{$k}}" >
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
                                        <option value="{{session('LoggedSUser')}}">Moi</option>
                                        <?php foreach($usersth as $k=>$v){
                                             ?><option value="{{$v->id}}"><?php echo  $v->last_name." ".$v->first_name ?></option>
                                       <?php  }?>
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



