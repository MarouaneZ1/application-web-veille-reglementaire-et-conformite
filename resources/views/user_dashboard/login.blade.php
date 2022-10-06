<!doctype html>
<html lang="en">
  <head>
  	<title>S'authentifier</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/auth.css">
	
	</head>
	<style>
	#aa{
    text-decoration: underline;
	}
	.az{
		background-color: white; 
        color: #ce1212; 
		border-color:#ce1212;
	}
	
	.aze:hover{
        color: #ce1212;
	}

	.checkbox-wrap{
		color:#ce1212;
	}



	
	</style>
	<body>
	<section class="ftco-section">
		<div class="container" >
			<div class=" row justify-content-center" >
				<div class="card justify-content-center" style="width:850px;">
					<div class="wrap d-md-flex justify-content-center"style=" border-radius: 5px; background-color:#ce1212;box-shadow:  0 0 10px  rgba(0,0,0,0.6);-moz-box-shadow: 0 0 10px  rgba(0,0,0,0.6);-webkit-box-shadow: 0 0 10px  rgba(0,0,0,0.6);-o-box-shadow: 0 0 10px  rgba(0,0,0,0.6);" >         
						
							<div style="background-color:#ce1212; width:540px;" class=" p-1 p-lg-5 text-center d-flex  justify-content-center">
						  <div class="justify-content-center">
                               
                                        <div class="ml-1 mt-1 bg-white justify-content-center" style="border-radius:8px;">
							                  <div class="mx-auto" style="height:fit-content; width:fit-content;"> 
							                     <img src="{{ asset('ressources/Logos/logoS.png') }}" alt="" >
							                  </div>
							            </div>
                                
                                <div class="col mt-5 justify-content-center">
                                        <div class="text-white"> Vous n'avez pas encore de compte ? 

										</div>
                                </div>
                                <div class="col mt-5 justify-content-center">
								<a type='submit' href="/forms" class="aze btn btn-outline-light mb-sm-5" role="button">S'inscrire</a>
                                </div>
                            </div> 

	</div>
	<div class="login-wrap p-4 p-lg-5" style="float:left; width:540px;" >
								<div class="d-flex justify-content-center" style="margin-left:20px;">
									<h3 class="mb-4">S'authentifier</h3>
								</div>
								<!-- <div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div> -->
									<form  action="{{ route('check') }}" class="signin-form" >
										@if(Session::get('fail'))
										<div class="alert alert-danger">
											{{ Session::get('fail') }}
										</div>
										@endif
										@csrf
													<div class="form-group mb-3">
														<label class="label" for="name">Email</label>
														<input type="email" name="email" class="form-control" placeholder="entrez votre email" value="{{ old('email') }}" required>
														<span class="text-danger">@error('email'){{ $message }}@enderror</span>
													</div>
												<div class="form-group mb-3">
													<label class="label" for="password">Mot de passe</label>
												<input type="password" name="password" class="form-control" placeholder="mot de passe" required>
												<span class="text-danger">@error('password'){{ $message }}@enderror</span>
												</div>
												<div class="form-group">
													<button type="submit" class="az form-control btn btn-outline-danger submit px-3">Se connecter</button>
												</div>
												<div class="form-group">
																<div class="justify-content-center d-flex" >
																	<a href="{{ route('forget.password.get') }}">Mot de passe oublié ?  </a>
																</div>
												</div>
									</form>
							</div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>




