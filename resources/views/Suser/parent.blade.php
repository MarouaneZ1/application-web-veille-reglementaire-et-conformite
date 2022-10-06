<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <title>@yield('titre')</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
	
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	    <!--fontawesome-->
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" 
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
		 <link rel="stylesheet" href="font/font/flaticon.css">
         <link rel="stylesheet" href="{{asset('css/dash2.css')}}">
         <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>


  </head>
  <body>
      @yield('content')
  </body>
      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

 <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
<script>
    $(document).ready(function() {
        var ctx = $("#text-line");
        var myLineChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Evalué", "Non évalué"],
                datasets: [{
                    data: [<?php echo $evaluation["evaluated"] ?>,<?php echo $evaluation["notevaluated"] ?>],
                    backgroundColor: ["rgb(6, 68, 32,0.7)", "rgb(206, 18, 18,0.7)"]
                }]
            },
           
        });
    });
    $(document).ready(function() {
        var ctx = $("#conforme-line");
        var myLineChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Conforme", "Non Conforme"],
                datasets: [{
                    data: [<?php echo $conformite["conforme"] ?>,<?php echo $conformite["notconforme"] ?>],
                    backgroundColor: ["rgb(6, 68, 32,0.7)", "rgb(206, 18, 18,0.7)"]
                }]
            },
            
        });
    });
    $(document).ready(function() {
        var ctx = $("#domain-line");
        var myLineChart = new Chart(ctx, {
          type: 'horizontalBar',
            data: {

                labels: <?php echo '["' . implode('", "', $domain[0]) . '"]' ;?>,
                datasets: [{
                    data: <?php echo '["' . implode('", "', $domain[1]) . '"]' ;?>,
                    label: "Conforme",
                    borderColor: "#064420",
                    backgroundColor: '#064420',
                    fill: true
                }, {
                    data:<?php echo '["' . implode('", "', $domain[2]) . '"]' ;?>,
                    label: "Non Conforme",
                    borderColor: "#ce1212",
                    fill: true,
                    backgroundColor: '#ce1212'
                }]
            },
            
        });
    });
    
</script>
 <script type="text/javascript">
        $(document).ready(function() {
          $('.summernote').summernote();
        });
    </script>
 <script>
   $('.plan').hide();
   console.log($('.hide-btn'));
   $('.hide-btn').click(function(){
    let nbr=$(this).val();
    $(this).parent().next().removeClass('active');
    $(this).parent().addClass('active');
    $('#'+nbr).hide();

});
$('.show-btn').click(function(){
    let nbr=$(this).val();
    $(this).parent().prev().removeClass('active');
    $(this).parent().addClass('active');
    $('#'+nbr).show();
})
$('#bar').click(function(){
	$(this).toggleClass('open');
	$('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled' );
});

@hasSection('content')
        $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled' );
        @endif
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

  </body>
</html>