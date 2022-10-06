<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
 <style>
  body {
  font-family: 'Karla', sans-serif;
  background:#fff;
   }

.pricing-table-title {
  color: #000000;
  font-size: 35px;
  font-weight: bold;
  margin-top: 36px;
  margin-bottom: 36px; }

.pricing-tab {
  margin-bottom: 58px; }
  .pricing-tab .nav-link {
    color: #000000;
    position: relative;
    padding-left: 25px; }
    .pricing-tab .nav-link::before {
      content: "";
      display: inline-block;
      width: 14px;
      height: 14px;
      border-radius: 50%;
      position: absolute;
      left: 1.25px;
      top: 50%;
      -webkit-transform: translateY(-50%);
              transform: translateY(-50%);
      background-color: #000000;
      -webkit-transition: all 0.2s ease-in-out;
      transition: all 0.2s ease-in-out; }
    .pricing-tab .nav-link.active {
      background-color: transparent;
      color: #000000; }
      .pricing-tab .nav-link.active::before {
        left: 0;
        background-color:#064020;
        border: 5px solid #ce1212;
        color:white;
        width: 16.5px;
        height: 16.5px; }

.pricing-tab-content .tab-pane.active {
  -webkit-animation: slide-down 0.6s ease-in-out;
          animation: slide-down 0.6s ease-in-out; }

@-webkit-keyframes slide-down {
  0% {
    opacity: 0;
    -webkit-transform: translateY(5%);
            transform: translateY(5%); }
  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
            transform: translateY(0); } }

@keyframes slide-down {
  0% {
    opacity: 0;
    -webkit-transform: translateY(5%);
            transform: translateY(5%); }
  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
            transform: translateY(0); } }

.pricing-card {
  border: none;
  -webkit-transition: all 0.4s ease-in-out;
  transition: all 0.4s ease-in-out;
  border-radius: 8px; }
  @media (max-width: 767px) {
    .pricing-card {
      margin-bottom: 28px; } }
  .pricing-card .card-body {
    padding: 35px 35px 16px; }
  .pricing-card .card-footer {
    background-color: transparent;
    border-top: 0;
    padding: 0; }
  .pricing-card.pricing-card-highlighted, .pricing-card:hover {
    background-color: #ce1212 }

.pricing-plan-title {
  font-size: 18px;
  color: #000;
  margin-bottom: 7px;
  font-weight: bold;
  text-transform: uppercase; }
  .pricing-card-highlighted .pricing-plan-title, .pricing-card:hover .pricing-plan-title {
    color: #000000; }

.pricing-plan-original-cost {
  font-size: 20px;
  color: #c1c1c1;
  font-weight: bold;
  margin-bottom: 0; }
  .pricing-card-highlighted .pricing-plan-original-cost, .pricing-card:hover .pricing-plan-original-cost {
    color: #000000;
    opacity: 0.75; }

.pricing-plan-cost {
  font-size: 40px;
  font-weight: bold;
  margin-bottom: 17px;
  color: #000000; }
  .pricing-plan-cost .currency {
    font-size: 20px;
    position: relative;
    left: -5px; }
  .pricing-card-highlighted .pricing-plan-cost, .pricing-card:hover .pricing-plan-cost {
    color: #000000; }

.pricing-plan-features {
  list-style: none;
  padding-left: 0;
  line-height: 1.67;
  font-size: 15px;
  margin-bottom: 40px; }
  .pricing-card-highlighted .pricing-plan-features, .pricing-card:hover .pricing-plan-features {
    color: white; }
  .pricing-plan-features li {
    padding-left: 21px;
    position: relative; }
    .pricing-plan-features li::before {
      content: "\F12C";
      font-family: "Material Design Icons";
      color: #3ccf8e;
      position: absolute;
      left: 0; }
      .pricing-card-highlighted .pricing-plan-features li::before, .pricing-card:hover .pricing-plan-features li::before {
        color: #000; }

.pricing-plan-purchase-btn {
  color: #000;
  background-color: transparent;
  border: solid 1px #dde5f5;
  border-radius: 4px;
  padding: 15px 20px;
  font-size: 16px;
  text-align: center;
  font-weight: bold;
  display: block;
  -webkit-transition: all 0.4s;
  transition: all 0.4s;
  margin-bottom: 10px; }
  .pricing-plan-purchase-btn:hover {
    color: #ce1212; }
  .pricing-card-highlighted .pricing-plan-purchase-btn, .pricing-card:hover .pricing-plan-purchase-btn {
    border: 0;
    background-color: #fff; }

.pricing-plan-link {
  color: #c1c1c1;
  font-size: 14px; }
  .pricing-card-highlighted .pricing-plan-link, .pricing-card:hover .pricing-plan-link {
    color: #fff;
    opacity: 0.75; }

.offer-badge {
  padding: 8px 15px;
  background-color: #ce1212;
  color: #fff;
  font-size: 8px;
  font-weight: bold; }

/*# sourceMappingURL=pricing-plan.css.map */

 </style>
</head>
<body>
  <main>
    <div class="container">
      <h1 class="text-center pricing-table-title">Les Tarifs des Services</h1>

      <ul class="nav nav-pills justify-content-center pricing-tab" id="pricing-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="monthly-tab" data-toggle="pill" href="#monthly" role="tab" aria-controls="monthly"
            aria-selected="true">Mensuel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="yearly-tab" data-toggle="pill" href="#yearly" role="tab" aria-controls="yearly"
            aria-selected="false">Annuel</a>
        </li>
      </ul>
      <form method="post" action="{{route('process')}}">
        @csrf
      <div class="tab-content pricing-tab-content" id="pricing-tab-content">
        <div class="tab-pane active" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
          <div class="row">
            
            <div class="col-md-6">
              <div class="card pricing-card ">
                <div class="card-body">
                  <h3 class="pricing-plan-title d-flex align-items-center">BASIQUE<span
                      class="badge badge-pill offer-badge ml-auto">10% off</span></h3>
                  <p class="h1 pricing-plan-original-cost"><del>350 MAD</del></p>
                  <p class="h1 pricing-plan-cost">250 <span class="currency">MAD</span></p>
                  <ul class="pricing-plan-features">
                    <li>La consultation en ligne de toute la réglementation concernant votre secteur selon les thématiques choisies et les régions administratives correspondant aux lieux de vos activités. Votre évaluation de la conformité réglementaire se trouve ainsi aisée ; vous pouvez imprimer ces check-list et les traiter lors des réunions d’évaluation en interne. 
                   </li>
                    <li>Veille réglementaire et légale : des notifications vous sont adressées au fur et à mesure de l’apparition ou de l’introduction de nouvelles réglementations relatives aux thématiques sélectionnées, à votre secteur d’activité et à votre région administrative.</li>
               
                  </ul>
                  <input type="text" name="cmd" value="138ABC" hidden> <br/>
    <label hidden for="amount">Amount</label>
        <input hidden type="text" name="amount" class="input-control" placeholder="put amount here 10.65" value="10.60">
                  <div class="d-flex justify-content-center">
                  <button type="submit" class="btn pricing-plan-purchase-btn" >S'inscrire</button>
                    
                  </div>
                </div>
              </div>
            </div>
</form>
            <div class="col-md-6">
              <div class="card pricing-card pricing-card-highlighted">
                <div class="card-body">
                  <h3 class="pricing-plan-title d-flex align-items-center">PRO <span
                      class="badge badge-pill offer-badge ml-auto">15% off</span></h3>
                  <p class="h1 pricing-plan-original-cost"><del>1000 MAD</del></p>
                  <p class="h1 pricing-plan-cost">850 <span class="currency">MAD</span></p>
                  <ul class="pricing-plan-features">
                    <li>La réalisation des évaluations de conformité réglementaire en ligne à tout moment</li>
                    <li>Le lancement des plans d’action correspondants aux exigences réglementaires relevées non conformes</li>
                    <li>Le suivi de vos plans d’action selon leurs échéanciers respectifs : actualisation des actions au fur et à mesure de leur déroulement </li>
                    <li>Le reporting détaillé relatif à votre niveau de conformité. Ceci, à l’aide d’un système de cotation sur mesure (selon vos priorités et le niveau de criticité que vous établissez)</li>
                    <li>L’édition de graphiques de reproting (radars, chart, courbes). </li>
                    <li>La saisie des preuves de vos actions : enregistrements relatifs aux rapports, bilans etc… </li>
                    <li>Archivage de vos actions et de l’évolution de votre niveau de conformité à chaque évaluation.</li>                  
                  </ul>

                  <div class="d-flex justify-content-center">
                  <input type="button" class="btn pricing-plan-purchase-btn" value="S'inscrire">
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="yearly" role="tabpanel" aria-labelledby="yearly-tab">
          <div class="row">
        
            <div class="col-md-6">
              <div class="card pricing-card ">
                <div class="card-body">
                  <h3 class="pricing-plan-title d-flex align-items-center">BASIQUE <span
                      class="badge badge-pill offer-badge ml-auto">40% off</span></h3>
                  <p class="h1 pricing-plan-original-cost"><del>5000 MAD</del></p>
                  <p class="h1 pricing-plan-cost">3000 <span class="currency">MAD</span></p>
                  <ul class="pricing-plan-features">
                  <li>La consultation en ligne de toute la réglementation concernant votre secteur selon les thématiques choisies et les régions administratives correspondant aux lieux de vos activités. Votre évaluation de la conformité réglementaire se trouve ainsi aisée ; vous pouvez imprimer ces check-list et les traiter lors des réunions d’évaluation en interne. 
                   </li>
                    <li>Veille réglementaire et légale : des notifications vous sont adressées au fur et à mesure de l’apparition ou de l’introduction de nouvelles réglementations relatives aux thématiques sélectionnées, à votre secteur d’activité et à votre région administrative.</li>
               
                  
                  </ul>
                  <div class="d-flex justify-content-center">
                  <input type="button" class="btn pricing-plan-purchase-btn" value="S'inscrire">
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card pricing-card pricing-card-highlighted">
                <div class="card-body ">
                  <h3 class="pricing-plan-title d-flex align-items-center">PRO <span
                      class="badge badge-pill offer-badge ml-auto">40% off</span></h3>
                  <p class="h1 pricing-plan-original-cost"><del>10000 MAD</del></p>
                  <p class="h1 pricing-plan-cost">6000 <span class="currency">MAD</span></p>
                  <ul class="pricing-plan-features">
                  <li>La réalisation des évaluations de conformité réglementaire en ligne à tout moment</li>
                    <li>Le lancement des plans d’action correspondants aux exigences réglementaires relevées non conformes</li>
                    <li>Le suivi de vos plans d’action selon leurs échéanciers respectifs : actualisation des actions au fur et à mesure de leur déroulement </li>
                    <li>Le reporting détaillé relatif à votre niveau de conformité. Ceci, à l’aide d’un système de cotation sur mesure (selon vos priorités et le niveau de criticité que vous établissez)</li>
                    <li>L’édition de graphiques de reproting (radars, chart, courbes). </li>
                    <li>La saisie des preuves de vos actions : enregistrements relatifs aux rapports, bilans etc… </li>
                    <li>Archivage de vos actions et de l’évolution de votre niveau de conformité à chaque évaluation.</li> 
                  </ul>
                  <div class="d-flex justify-content-center">
                  <input type="button" class="btn pricing-plan-purchase-btn" value="S'inscrire">
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
