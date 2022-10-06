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


<div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white"></h6>
                    </div>

                    <div class="card-body">
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
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
                        <form method="POST" action="/updateplan/{{$id}}" >
                            @csrf
                            <div class="form-group">
                                <label>Titre</label>
                                <input type="text" name="title" value="{{ old('title',$updateinfo->title) }}" class="form-control"/>
                            </div>  
                            <div class="form-group">
                                <label><strong>Actions :</strong></label>
                                <textarea class="summernote" name="description">{{ old('description',$updateinfo->content) }}</textarea>
                            </div>
                            <div class="form-group row  text-center">
                                <div class="col-md-12">
                                   <h5 class="col-form-label col-md-5 text-left">Exigences:</h5>
                                    <hr>
                                    @if(isset($exigences))
                                    <div class="row">
                                  <div class="col-md-11">
                                  @foreach($exigences as $l=>$m)
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
                                        <select class="form-control form-style @error('typecriticity') is-invalid @enderror" name="type" >
                                            <option >Corrective</option>
                                            <option >Currative</option>
                                            <option >Préventive</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="statut" class="col-form-label col-md-12">Statut:</label>
                                        <select class="form-control form-style @error('statut') is-invalid @enderror" name="statut" >
                                            <option >Nouveau</option>
                                            <option>En Cours..</option>
                                        
                                        </select>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-4">
                                            <label for="criticity" class="col-form-label col-md-12">Criticité:</label>
                                            <select class="form-control form-style @error('criticity') is-invalid @enderror" name="criticity" >
                                            <option >Mineure</option>
                                            <option >Majeure</option>
                                            <option >Sévére</option>
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
                                                <input type="text" name='date' value="{{ old('date',$updateinfo->date) }}" placeholder="Choisir une date .." class="form-control py-4 px-4" id="reservationDate">
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