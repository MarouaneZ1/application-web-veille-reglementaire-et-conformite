@extends('client.bar')
@section('titre','Synthése')
@section('Synthése','active')
@section('pcontent')
 <!-- Begin Page Content -->
        <div class="container-fluid px-lg-4">
<div class="row">
<div class="col-md-12 mt-lg-4 mt-4">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"></h1>
            
          </div>
		  </div>
<div class="col-md-12">
       <div class="row">
       <div class="col-sm-4">
										<div class="card">
                                            <h5 class="card-header  mb-4">Textes évalués</h5>
                                            
											<div class="card-body">
												
											<canvas id="text-line" width="299" height="200" class="chartjs-render-monitor" style="display: block; width: 299px; height: 200px;"></canvas>
											</div>
										</div>
										
									</div>
									<div class="col-sm-4">
										<div class="card">
                                            <h5 class="card-header  mb-4">Conformité globale</h5>
											<div class="card-body">
												
											<canvas id="conforme-line" width="299" height="200" class="chartjs-render-monitor" style="display: block; width: 299px; height: 200px;"></canvas>
											</div> 
										</div>
										
									</div>
								<!-- 	<div class="col-sm-3">
										<div class="card">
                                            <h5 class="card-header  mb-4">Evaluations expirées</h5>
											<div class="card-body">
											
											</div>
										</div>
										
									</div> -->
									<div class="col-sm-4">
										<div class="card">
                                            <h5 class="card-header  mb-4">Conformité par domaine
                                            </h5>
											<div class="card-body">
											<canvas id="domain-line" width="299" height="200" class="chartjs-render-monitor" style="display: block; width: 299px; height: 200px;"></canvas>	
											
											</div>
										</div>
										
									</div>
								</div>
</div>
                    <div class="col-md-12 mt-4">
                        <div class="card">
                            <h5 class="card-header alert-danger"><i class="fas fa-exclamation-circle fa-lg  pr-3"></i>Des Plans d'actions Assignés à Vous !</h5>
                            <div class="card-body">
									 
    @if($texts_plan->isNotEmpty())
    @foreach($texts_plan as $tplan)
    
    <div class="card text-center" >
    <div class="card-header mt-2 col-md-12">
        <div class=" h6">{{$tplan->description}}</div>
    </div>
  <div class="container">
  <div class="card-body">
      <div class="card mb-2">
      <div class="card-header">{{$tplan->title}}
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
                        <p class=" col-md-8">{{"Vous : ".$tplan->user_last." ".$tplan->user_first}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                    <p class="font-weight-bolder text-secondary col-md-4">Date d'échéance:</p>
                    <p class=" col-md-8">{{$tplan->date}}</p>
                    </div>
                </div>
            </div> 

         
    </div>


  </div>
 
</div>
</div>
<hr>


    
    @endforeach
    @endif
                            </div>
                        </div>
                    </div>

        </div>

        </div>
        <!-- /.container-fluid -->
@endsection