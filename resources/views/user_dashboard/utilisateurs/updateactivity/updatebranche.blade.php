@extends('user_dashboard.index')
@section('utilisateur','active')
@section('table','show')
@section('pagecontent')
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
            <div class="container ">
            <form action="/updateuseractthe" class=" border p-2" method="POST">
                @csrf
                <div class="form-group row"> 
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <?php 
                    $i=0;
                    for($j=0;$j<count($names);$j++) {?>
                    @foreach($names[$j] as $k=>$v)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading<?=$i?>">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?=$i?>" aria-expanded="false" aria-controls="flush-collapse<?=$i?>">
                                {{$v}}
                            </button>
                        </h2>
                            <div id="flush-collapse<?=$i?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?=$i?>" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                            <div class="col-md-12">
                                                    @foreach ($banches[$k] as $id => $title)
                                                    <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="branche[]" value="{{$id}}" >
                                                        <label class="form-check-label" for="{{$id}}">
                                                        {{$title}}
                                                        </label>
                                                    </div> 
                                                    @endforeach
                                            </div>
                                        </div> 
                                    </div>
                    </div> 
                        @endforeach
                    <?php $i+=1; } ?>
                     
                    </div>
                </div>
                <div class="form-group text-center row">
                    <div class="col">
                        <button type="submit" class="submitbut btn btn-red btn-sm">next</button>
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