@extends('user_dashboard.index')
@section('synthese','active')
@section('pagecontent')

       <!-- Begin Page Content -->
        <div class="container-fluid px-lg-4">
            <div class="row">
                <div class="col-md-12 mt-lg-4 mt-4">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Synthése</h1>
                        </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
									<div class="col-sm-4">
										<div class="card bg-primary text-white h-100">
                                            <div class="card-header text-white-75"><i class="fas fa-users pr-2"></i>Client</div>
											<div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="container">
                                                        <div class="row text-lg fw-bold">
                                                            <div class="col-10">Utilisateurs</div> 
                                                            <div class="col-2">{{$info['users']}}</div>
                                                        </div>
                                                        <div class="row text-lg fw-bold">
                                                            <div class="col-10">Sociétés</div> 
                                                            <div class="col-2">{{$info['societies']}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                                <a href="/dashboard/utilisateurs/tableau" class="text-white stretched-link">Plus de détails</a>
                                                <div class="text-white"><a class="btn btn-outline-light" href="/dashboard/utilisateurs/tableau"><i class="fas fa-chevron-right"></i></a></div>
                                            </div>
										</div>
									</div>
									<div class="col-sm-4">
                                    <div class="card bg-warning text-white h-100">
                                            <div class="card-header text-white-75"><i class="fas fa-briefcase pr-2"></i>Secteurs D'activités</div>
											<div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="container">
                                                        <div class="row text-lg fw-bold">
                                                            <div class="col-9">Section</div> 
                                                            <div class="col-3">{{$info['section']}}</div>
                                                        </div>
                                                        <div class="row text-lg fw-bold">
                                                            <div class="col-9">Branches</div> 
                                                            <div class="col-3">{{$info['branches']}}</div>
                                                        </div>
                                                        <div class="row text-lg fw-bold">
                                                            <div class="col-9">sousbranches</div> 
                                                            <div class="col-3">{{$info['sousbranches']}}</div>
                                                        </div>
                                                        <div class="row text-lg fw-bold">
                                                            <div class="col-9">Activité</div> 
                                                            <div class="col-3">{{$info['activity']}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a href="dashboard/secteursdactivites/sections" class="text-white stretched-link">Plus de détails</a>
                                            <div class="text-white"><a class="btn btn-outline-light" href="dashboard/secteursdactivites/sections"><i class="fas fa-chevron-right"></i></a></div>
                                            </div>
										</div>
									</div>
									<div class="col-sm-4">
                                    <div class="card bg-success text-white h-100">
                                            <div class="card-header text-white-75"><i class="fas fa-palette pr-2"></i>Thèmes</div>
											<div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="container">
                                                        <div class="row text-lg fw-bold">
                                                            <div class="col-9">Thèmes</div> 
                                                            <div class="col-3">{{$info['theme']}}</div>
                                                        </div>
                                                        <div class="row text-lg fw-bold">
                                                            <div class="col-9">Aspects</div> 
                                                            <div class="col-3">{{$info['aspects']}}</div>
                                                        </div>
                                                        <div class="row text-lg fw-bold">
                                                            <div class="col-9">Sous Aspects</div> 
                                                            <div class="col-3">{{$info['sousaspects']}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a href="dashboard/themes/theme" class="text-white stretched-link">Plus de détails</a>
                                            <div class="text-white"><a class="btn btn-outline-light" href="dashboard/themes/theme"><i class="fas fa-chevron-right"></i></a></div>
                                            </div>
										</div>
									</div>
									<div class="col-sm-4 mt-3">
                                        <div class="card bg-danger text-white h-100">
                                            <div class="card-header text-white-75"><i class="fas fa-file-alt pr-2"></i></i>Texte Réglementaire</div>
                                            <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="container">
                                                            <div class="row text-lg fw-bold">
                                                                <div class="col-9">Texts</div> 
                                                                <div class="col-3">{{$info['text']}}</div>
                                                            </div>
                                                            <div class="row text-lg fw-bold">
                                                                <div class="col-9">Bulletins Officiels</div> 
                                                                <div class="col-3">{{$info['bo']}}</div>
                                                            </div>
                                                            <div class="row text-lg fw-bold">
                                                                <div class="col-9">Exigances</div> 
                                                                <div class="col-3">{{$info['rules']}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a href="dashboard/TexteReglementaire/texts" class="text-white stretched-link">Plus de détails</a>
                                        <div class="text-white"><a class="btn btn-outline-light" href="dashboard/TexteReglementaire/texts"><i class="fas fa-chevron-right"></i></a></div>
                                        </div>
									</div>
								</div>
                                <div class="col-sm-4 mt-3">
                                        <div class="card bg-info text-white h-100">
                                            <div class="card-header text-white-75"><i class="fas fa-globe-africa pr-2"></i>Territoires</div>
                                            <div class="card-body">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="container">
                                                            <div class="row text-lg fw-bold">
                                                                <div class="col-9">Région</div> 
                                                                <div class="col-3">{{$info['region']}}</div>
                                                            </div>
                                                            <div class="row text-lg fw-bold">
                                                                <div class="col-9">Préfécture</div> 
                                                                <div class="col-3">{{$info['prefecture']}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a href="/dashboard/territoire/region" class="text-white stretched-link">Plus de détails</a>
                                        <div class="text-white"><a class="btn btn-outline-light" href="/dashboard/territoire/region"><i class="fas fa-chevron-right"></i></a></div>
                                        </div>
									</div>
							</div>
                            <div class="col-sm-4 mt-3">
                                        <div class="card bg-secondary text-white h-100">
                                            <div class="card-header text-white-75"><i class="far fa-newspaper pr-2"></i>Changer le mot de passe</div>
                                            <div class="card-body">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                    <i class="fas fa-user-cog fa-7x"></i>
                                                    </div>
                                                </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a href="{{ route('Cpass') }}" class="text-white stretched-link">Plus de détails</a>
                                        <div class="text-white"><a class="btn btn-outline-light" href="{{ route('Cpass') }}"><i class="fas fa-chevron-right"></i></a></div>
                                        </div>
									</div>
                                    <!-- jdfhdjf	 -->
                            <!-- kdfjdkjf -->	
						</div>
                    </div>
                    <!-- column -->
                    <div class="col-md-12 mt-4">

                    </div>
                   

        </div>

        </div>
        <!-- /.container-fluid -->

      </div>
			
        </div>
		</div>
        <!-- /#page-content-wrapper -->
@endsection