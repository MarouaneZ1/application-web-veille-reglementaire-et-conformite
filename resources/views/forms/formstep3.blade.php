@extends('forms.parent')
@section('title',"step 3 :branche")
@section('formcontent')
<form action="{{route('forms.selectsousbranchepost')}}" method="POST" class="col-md-7 p-3 border ">
                
                <div class="row text-center d-flex justify-content-center">
                <img src="{{ asset('ressources/Logos/logoS.png') }}" class="img-fluid p-1 w-50"  alt="">
                    <p class="article-recent">Vous connaissez votre entreprise, nous connaissons la <br> réglementation. Ensemble nous sommes redoutables 
                        <br> Heureux de vous acceuillir:</p>
                </div>
                @csrf
                <div class="border-top border-bottom pb-3 pt-3">
                        <div class="btn-group w-100 mb-2" role="group" aria-label="Basic outlined example">
                        <button type="button" class="btn btn-Light">Infos</button>
                            <button type="button" class="btn btn-Light">société</button>
                            <button type="button" class="btn bg-danger">Secteurs d'activité</button>
                            <button type="button" class="btn btn-Light">Thémes</button>
                        </div>
                        <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 50.15%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                </div>
                @if($status)
                <div class="alert alert-success">
                {{ $status }}
                </div>
                @endif 
                @error('branche')               
                 <div class="alert alert-danger">
                 {{ $message }}
                </div>
                @enderror
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
@endsection