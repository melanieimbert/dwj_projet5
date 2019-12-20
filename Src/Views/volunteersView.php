<div class="row">
  <div class="col-xl-4 col-md-4 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Bienvenue </div>
              <div class="h10 mb-0  text-gray-800"> 
                <p> Bonjour  <?php  echo htmlspecialchars($user['firstname']); ?>  <?php echo htmlspecialchars($user['lastname']); ?> , </p>
                <p> <?php  echo htmlspecialchars($user['email']); ?> </p>
            </div>
            </div>
          <div class="col-auto">
            <i class="fa fa-comments fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-md-4 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Mon dossier </div>
            <div class="h10 mb-0 text-gray-800"> 
              <?php if ($folderComplete) {
    echo 'Votre dossier est complet depuis le '.$contractsInfos['last_modif_dateFr'].'. </br>
                        Si vous n\'avez pas de nouvelles de la part de l\'association, n\'hésitez pas à appeler le standart';
} else {
    echo 'Dossier incomplet';
} ?> 
            </div>
          </div>
          <div class="col-auto">
            <i class="fa fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-md-4 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Contract </div>
            <div class="h10 mb-0 text-gray-800"> 
              <?php
              if ($contractsInfos['date_start'] == !null && $contractsInfos['date_end'] == !null) {
                  ?>
                  <p> Date de début de contrat : <?php echo $contractsInfos['date_startFr']; ?> </p>
                  <p> Date de fin de contrat : <?php echo $contractsInfos['date_endFr']; ?> </p>
              <?php
              } else {
                  ?>
                <form method="post" action="index.php?url=/volunteer_uploadDates">
                  <label for="date_start">  Date de début de contrat  :</label>
                  <input type="date" id="date_start" name="date_start"
                        min="2019-09-01" max="2020-12-31">
                  <label for="date_end">  Date de fin de contrat  :</label>
                  <input type="date" id="date_end" name="date_end"
                        min="2019-09-01" max="2020-12-31">
                  <input type="submit" value="Envoyer le fichier" />
                </form>
              <?php
              } ?>
            </div>
          </div>
            <div class="col-auto">
                <i class="fa fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
        </div>
     </div> 
  </div>
  </div>
</div>
<!-- Fills states and upload -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Gérez votre dossier </h6>
    <p class="mb-0">Pour rappel, ce dossier administratif doit être remis au plus vite afin que vous puissiez être assuré par l'association et avoir vos indemnités </p>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Nom du ficher à envoyer  </th>
            <th> Etat du fichier </th>
          </tr>
          </thead>
            <tbody>
                <?php
                  foreach ($fills_list as $fill => $fillFr) {
                      ?> 
                    <tr>
                      <td> 
                        <h6> <?php echo $fillFr; ?>  </h6>
                      </td>
                      <td> 
                        <?php
                        if ($contractsInfos[$fill.'_valid'] == 'waiting') {
                            ?> 
                          <p> 
                            Vous avez déjà envoyé un fichier qui est en attente de traitement. </br>
                            Vous saurez prochainement si ce fichier est valide. 
                          </p>
                        <?php
                        } elseif ($contractsInfos[$fill.'_valid'] == 'valid') {
                            ?>
                          <p> Vous avez déjà envoyé un fichier qui a été validé. </p>
                        <?php
                        } else {
                            ?>
                        <form method="post" enctype="multipart/form-data" action="index.php?url=/volunteer_uploadFile">
                          <label for=<?php echo $fill; ?>>  Veuillez télécharger ici votre <?php echo $fillFr; ?> ici :</label> </br>
                          <input type="hidden" name="nameFile" value=<?php echo $fill; ?>> </br>
                          <input type="file" class="btn btn-outline-primary" name=<?php echo $fill; ?>>
                          <input type="submit"  class="btn btn-primary" value="Envoyer le fichier" />
                        </form>
                        <?php
                        } ?>        
                      </td>              
                    </tr>
                  <?php
                  } ?>
            
            </tbody>
          </table>
        </div>
    </div>
</div>