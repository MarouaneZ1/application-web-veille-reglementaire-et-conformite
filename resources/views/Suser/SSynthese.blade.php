@extends('Suser.SUser')
@section('pcontent') 
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
@endsection