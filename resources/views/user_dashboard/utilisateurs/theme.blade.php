@extends('user_dashboard.index')
@section('utilisateur','active')
@section('table','show')
@section('pagecontent')
<!-- Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modifier L'utilisateur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="name" class="col-form-label col-md-5">Name:</label>
                        <input type="text" class="form-style form-control @error('name') is-invalid @enderror" id="name" name="name"  value="{{ old('name') }}" placeholder="name...">
                        @error('name')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="numero" class="col-form-label col-md-5">N° :</label>
                        <input type="number"  class="form-style form-control @error('numero') is-invalid @enderror" id="numero" name="numero" value="{{ old('numero') }}" placeholder="">
                        @error('numero')<span style="color:red;">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary">Enregistrer</button>
      </div>
            </form>
      </div>

    </div>
  </div>
</div>
<!-- Modal delete -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Supprimer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                <form action="" method="POST">
                @csrf
                <p style="text-align:center;">Vous êtes sûre de supprimer cet enregistrement?</p>
                    <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">supprimer</button>
                    </div>
            </form>
      </div>
    </div>
  </div>
</div>
        <!-- Begin Page Content -->
        <div class="container-fluid px-lg-4">
            <div class="row">
                <!-- <div class="col-md-12 mt-lg-4 mt-4">
                    Page Heading 
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Utilisateurs</h1>
                    </div>
		        </div> -->
                    <!-- column -->
                    <div class="col-md-12 mt-4">
                        <div class="card">
                            <h5 class="card-header">Thèmes</h5>
                            <div class="card-body">
                                <!-- title -->
                                
                                <div class="d-md-flex align-items-center">
                                
                                     <!-- Topbar Search -->
<!--                                     <form class="d-none d-sm-inline-block form-inline navbar-search">
                                        <div class="input-group">
                                        <input type="text" class="form-control bg-light " placeholder="Rechercher par domaine..." aria-label="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-search" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                        </div>
                                    </form> -->
                                </div>
                                <!-- title -->
                            </div>
                            <div class="table-responsive">
                                <table id="table" class="table v-middle">
                                    <thead>
                                        <tr class="bg-light">
                                            <th class="border-top-0">N°utilisateur</th>
                                            <th class="border-top-0">Nom</th>
                                            <th class="border-top-0">Prenom</th>
                                            <th class="border-top-0">Thème</th>
                                            <th class="border-top-0">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($users))
                                    @foreach ($users as $user=>$theme)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <h4 class="m-b-0 font-16">{{$theme->id}}</h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$theme->last_name}}</td>
                                            <td>{{$theme->first_name}}</td>
                                            <td>
                                                @if(isset($themeusers))
                                                  @foreach($themeusers[$theme->id] as $k => $v)
                                                  <span class="badge alert-danger">{{$v}}</span></br>
                                                  @endforeach
                                                @endif
                                              </td>
                                            <td>
                                            <a  data-toggle="modal"  id="{{$theme->id}}" class="badge badge-light edit" data-target="#editmodal" ><i class="fas fa-edit"></i></a>
                                            <a  data-toggle="modal"  id="{{$theme->id}}" class="badge badge-light edit" data-target="#delete" ><i class="fas fa-trash-alt"></i></a>
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
        <!-- /.container-fluid -->

      </div>
			
        </div>
		</div>
        <!-- /#page-content-wrapper -->
        <!-- modal supprimer -->
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script>
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
        $('#bar').click(function(){
            $(this).toggleClass('open');
            $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled' );
            });
            $(".edit").click(function() {
                const id=$(this).attr('id');
                console.log(id);
                $.ajax({
                  url:"themes_detail/"+id,
                  type:'GET',
                  data:{
                    'id':id
                  },
                  success:function(data){
                    
                    $('#name').val(data[0].name);
                    $('#numero').val(data[0].id);
               
                  }
                })
            });
        </script>


@endsection