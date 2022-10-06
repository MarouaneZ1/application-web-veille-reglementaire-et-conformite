@extends('forms.parent')
@section('title',"step 2 section")
@section('formcontent')
<form action="{{route('forms.selectbranchepost')}}" method="POST" class="col-md-7 p-3 border ">
                @csrf
                <div class="row text-center d-flex justify-content-center">
                <img src="{{ asset('ressources/Logos/logoS.png') }}" class="img-fluid p-1 w-50"  alt="">
                    <p class="article-recent">Vous connaissez votre entreprise, nous connaissons la <br> réglementation. Ensemble nous sommes redoutables 
                        <br> Heureux de vous acceuillir:</p>
                </div>
                <div class="border-top border-bottom pb-3 pt-3">
                        <div class="btn-group w-100 mb-2" role="group" aria-label="Basic outlined example">
                        <button type="button" class="btn btn-Light">Infos</button>
                            <button type="button" class="btn btn-Light">société</button>
                            <button type="button" class="btn bg-danger">Secteurs d'activité</button>
                            <button type="button" class="btn btn-Light">Thémes</button>
                        </div>
                        <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 41.2%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                </div>
                @if(isset($status))
                <div class="alert alert-success">
                {{ $status }}
                </div> 
                @endif
                @error('section')               
                 <div class="alert alert-danger">
                 {{ $message }}
                </div>
                @enderror
                <div class="form-group row"> 
                    <div class="col-md-12">
                        <label for="Secteur d'activité" class="col-form-label col-md-12">Secteur d'activité:</label>
                        @foreach ($titles as $id => $title)
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="section[]" id="{{$id}}" value="{{$id}}" >
                            <label class="form-check-label" for="{{$id}}">
                            {{$title}}
                            </label>
                        </div> 
                        @endforeach
                    </div>
                </div>
                <div class="form-group text-center row">
                    <div class="col">
                        <button type="submit" class="submitbut btn btn-red btn-sm">next</button>
                    </div>
                </div>
</form>
@endsection