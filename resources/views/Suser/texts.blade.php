@extends('Suser.SUser')
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
                                            <h5 class="card-header  mb-4">Conformes <span class="badge badge-success float-right"><?php if($total!=0){echo round($lesconformes/$total*100);}  else echo '0'?> %</span></h5>
											<div class="card-body">
											<h1>{{$lesconformes}}</h1>
                                            <small>Exigences  Conformes</small><h5 class="text-success float-right">{{$lesconformes}}/{{$total}}</h5>
											</div> 
										</div>
										
									</div>
									<div class="col-sm-4">
										<div class="card">
                                            <h5 class="card-header  mb-4">Non Conformes <span class="badge badge-danger float-right"><?php if($total!=0){echo round($lesnonconformes/$total*100);} else echo '0' ?> %</span></h5></h5>
											<div class="card-body">
                                            <h1>{{$lesnonconformes}}</h1>
                                            <small>Exigences Non Conformes</small><h5 class="text-danger float-right">{{$lesnonconformes}}/{{$total}}</h5>
											</div>
										</div>
										
									</div>
									<div class="col-sm-4">
										<div class="card">
                                            <h5 class="card-header  mb-4">Evaluations Expirées
                                            <span class="badge badge-info float-right"><?php if($expiration!=0){echo round($lesexpires/$expiration*100);} else echo '0' ?> %</span></h5>
											<div class="card-body">
											<h1>{{$lesexpires}}</h1>
                                            <small>Textes à re-évaluer</small><h5 class="text-info float-right">{{$lesexpires}}/{{$expiration}}</h5>
											</div> 
										</div>
										
									</div>
									
									
								</div>
</div>


     
                    <!-- column -->
                    <div class="col-md-12 mt-4">
                        <div class="card">
                            <h5 class="card-header">Textes des lois</h5>
                            <div class="card-body">
                                <!-- title -->

                                <!-- title 
                            <tr class="bg-light">
                                            <th class="border-top-0">Dernière modification</th>
                                            <th class="border-top-0">Numéro</th>
                                            <th class="border-top-0">Résumé</th>
                                            <th class="border-top-0">Conformité</th>
                                            <th class="border-top-0"></th>
                                           
                                        </tr>
                            -->
                            </div>
                            <div class="table-responsive px-3">
                                <table id="table" class=" table table-striped table-bordered dt-responsive nowrap v-middle">
                                    <thead>
                                    <tr class="bg-light">
                                            <th class="border-top-0">Dernière modification</th>
                                            <th class="border-top-0">Numéro</th>
                                            <th class="border-top-0">Résumé</th>
                                            <th class="border-top-0">Conformité</th>
                                            <th class="border-top-0">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($texts))
                                    @foreach ($texts as $text)
                                        <tr>
                                            <td>{{$text->updateAt}}</td>
                                            <td>{{$text->name}}</td>
                                            <td>{{$text->description}}</td>
                                            <td>
                                            @if($text->conformite==0)
                                            <span class="badge badge-pill badge-danger col-md-12"><i class="fas fa-times-circle pr-2"></i>Non Conforme</span>
                                            @endif
                                            @if($text->conformite==1)
                                            <span class="badge badge-pill badge-success col-md-12 "><i class="fas fa-check-circle pr-2"></i>Conforme</span>
                                            @endif
                                            </td>
                                            <td>
                                            <a href='/lois_Suser/{{$text->id}}' class="badge badge-info edit" ><i class="fas fa-tasks fa-2x"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                   

        </div>

        </div>
@endsection