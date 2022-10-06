@extends('user_dashboard.index')
@section('utilisateur','active')
@section('table','show')
@section('pagecontent')
<div class="container-fluid px-lg-4">
                    @if(Session::get('dfail'))
                    <div class="alert alert-danger">
                    {{ Session::get('dfail') }}
                    </div>
                    @endif
                    @if(Session::get('dsuccess'))
                    <div class="alert alert-success">
                    {{ Session::get('dsuccess') }}
                    </div>
                    @endif
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
            
            <form action="/updateuseractthe/{{$id}}" class=" border p-2" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-md">
                        <label for="Nom" class="col-form-label col-md-5">Nom:</label>
                        <select class="form-control form-style @error('Nom') is-invalid @enderror" name="Nom" >
                            @foreach($users as $k=>$v)
                                @if (old('Nom') == $v->id or $id == $v->id)
                                    <option value="{{ $v->id }}" selected><?=$v->first_name." ".$v->last_name?></option>
                                @else
                                    <option value="{{ $v->id }}"><?=$v->first_name." ".$v->last_name?></option>
                                @endif
                            @endforeach
                                        </select>
                        @error('Nom')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md">
                        <label for="theme" class="col-form-label col-md-5">Thème:</label>
                        @if(isset($themes))
                        @foreach($themes as $k=>$v)
                        <div class="form-check">
                             <input class="form-check-input" type="checkbox" id="{{$v->name}}" name="theme[]" value="{{$v->id}}"/>
                            <label class="form-check-label" for="{{$v->name}}">{{$v->name}}</label>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="form-group row"> 
                    <div class="col-md-8">
                            <label for="Secteur d'activité" class="col-form-label col-md-12">Secteur d'activité:</label>
                            <input type="text" id="searchColumn" class="form-style form-control mb-3" placeholder="Chercher sur une activité.." >
                            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Les secteurs</a>
                            <div class="collapse multi-collapse" id="multiCollapseExample1">
                            <div class="card card-body">
                            @foreach ($titles as $id => $title)
                                                <div class="form-check" id="options">
                                                <input class="form-check-input activite" type="checkbox" name="section[]" id="{{$id}}" value="{{$id}}" data-id="{{$title}}" >
                                                    <label class="form-check-label" for="{{$id}}">
                                                    {{$title}}
                                                    </label>
                                                </div> 
                                                @endforeach
                            </div>
                        </div>
                
                        
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Modifier</button>
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