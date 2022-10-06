<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <title>Admin</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
<!-- 	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	    <!--fontawesome-->
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" 
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		
	<link rel="stylesheet" href="font/font/flaticon.css">
    <link rel="stylesheet" href="{{ asset('css/dash.css') }}">

  </head>
  <body>
    @yield('content')
  </body>
      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> -->
 <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>


 <script>
   var maxLength = 63;
$('#example > option').text(function(i, text) {
    if (text.length > maxLength) {
        return text.substr(0, maxLength) + '...';  
    }
});
$(function () {
  $('[data-toggle="popover"]').popover()
});
$('#searchColumn').keyup(function() {
  $('#multiCollapseExample1').collapse('show')
    var value = $(this).val();
    var exp = new RegExp('^' + value, 'i');
    $(".activite").each(function() {
        var isMatch = exp.test($(this).attr("data-id"));
        $(this).parent().toggle(isMatch);
    });
});
      @if(count($errors->adduser)>0)
      $('#addmodal').modal('show');
      @endif
      @if(count($errors->updateuser)>0)
      $('#editmodal').modal('show');
      @endif
        
  </script>
  <script>
    $('#table').DataTable({
          "language": {
            "lengthMenu": "Afficher _MENU_ enregistrements par page",
            "zeroRecords": "Rien trouvé - désolé",
            "info": "Affichage de la page _PAGE_ de _PAGES_",
            "infoEmpty": "Aucun enregistrement disponible",
            "infoFiltered": "(filtré à partir de _MAX_ enregistrements totaux)",
            "search":"Rechercher:",
            "paginate": {
                  "first":      "Premier",
                  "last":       "Dernier",
                  "next":       "Suivant",
                  "previous":   "précédent"
              },
            "aria": {
                "sortAscending":  ": activer pour trier les colonnes par ordre croissant",
                "sortDescending": ": activer pour trier les colonnes par ordre décroissant"
            }
        }
        });
  </script>
  <script>
            $('#bar').click(function(){
            $(this).toggleClass('open');
            $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled');
            });
        @hasSection('pagecontent')
        $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled');
        @endif
  </script>
</html>