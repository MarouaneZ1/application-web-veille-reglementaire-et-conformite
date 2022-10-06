@extends('Suser.SUser')
@section('pcontent') 
      <!-- Begin Page Content -->
        <div class="container">   
                   <!-- column -->
                   @if(Session::get('etat'))
                    <div class="alert alert-success">
                    {{ Session::get('etat') }}
                    </div>
                    @endif 
                   <div class="col-md-12 mt-4 mt-5">
                       <div class="card text-center" >
                           <div class="card-body">
                             <h4 class="text-success pb-2">@if(isset($resume)){{$resume}}@endif</h4>
                             <a  href="{{ asset('storage/'.$file_bo) }}"  target="_blank" class="btn btn-info">Voir/Télécharger le texte original</a>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-12 mb-3">
                       <div class="card h-100">
                         <div class="card-body">
                        <form action="/updaterules" method="POST">
                        @csrf
                      @foreach($articles as $k=>$v)
                          <div class="border">
                            <div class="alert alert-secondary"><i class="fas fa-newspaper pr-3"></i>Article</div>
                               <div class="card-header">
                                 {{$k}}
                               </div>
                  
                              
                               <div class=" row card-body">
                               @if(in_array($v, $def_id))
                                @if($definitions[$v])
                                
                                <div class="col-md-6">
                                <div class=" row alert alert-success"><i class="fas fa-search pr-3"></i>Définitions</div>
                               
                                  <li>{{$definitions[$v]}}</li>
                                  <hr>
</div>
                               
                        
                                @endif
                               @endif
                               @if(in_array($v, $sanc_id))
                                @if($sanctions[$v])
                                <div class="col-md-6">

                                <div class=" row alert alert-danger"><i class="fas fa-exclamation-triangle pr-3"></i>Sanctions</div>
                                
                                  <li>{{$sanctions[$v]}}</li>
                                
                                  <hr> 
                             </div>
                             
                                @endif
                                @endif
                                    
                          
                                @if(in_array($v, $rule_id_f))
                               
                               <div class="col-md-7">
                               <div class=" row alert alert-info"><i class="fas fa-star pr-3"></i>Exigences</div>
                               {{$rules[$v]}}
                               </div> 
                               @endif  
                               
                               
                               @if(in_array($v, $rule_id_f))
                               <div class="col-md-5" >
                               <div class="btn-group btn-group-toggle mb-3 pl-2 pt-5" >
                              
                                        <label class="btn btn-outline-primary <?php if(isset($status[$rule_id[$v]]) and $status[$rule_id[$v]] == 1) echo 'active' ;?>">
                                            <input type="radio" name="{{$rule_id[$v]}}" class="hide-btn" value="1" autocomplete="off" <?php if(isset($status[$rule_id[$v]]) and $status[$rule_id[$v]] == 1) echo 'checked' ;?>>CONFORME
                                        </label>
                                        <label class="btn btn-outline-primary <?php if(isset($status[$rule_id[$v]]) and $status[$rule_id[$v]] == 0) echo 'active' ;?> ">
                                            <input type="radio" name="{{$rule_id[$v]}}" class="show-btn" value="0" autocomplete="off"  <?php if(isset($status[$rule_id[$v]]) and $status[$rule_id[$v]] == 0) echo 'checked' ;?>>NON CONFORME
                                        </label>
                               </div>
                               </div>
                               @endif
                              
                                  <!--   <div id="{{$k}}" class="plan">
                                        <div class="d-flex flex-column pl-2 ">
                                            <div class="form-group">
                                                <textarea class="form-control" placeholder="Commentaire..." rows="3"></textarea>
                                            </div>
                                                <button type="button" class="btn btn-outline-primary btn-block">+ Ajouter un plan d'actions</button>
                                        </div>
                                   </div> -->
                               
                               
                                  
                               </div>
                           </div>

                         <hr>


                        @endforeach
</div>
</div>

                         
                       
                       

                       <div class="d-flex justify-content-center pb-5">
                       <button type="submit" class="btn btn-success">Sauvegarder</button>
                       <div>
                       </form>

                     </div>
                    </div>
                </div>
        
       
@endsection