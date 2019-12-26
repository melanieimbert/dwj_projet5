<!-- Files to moderate -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Nouveaux fichier à modérer: </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="fill_moderate" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Nom - Prénom </th>
                        <th> Fichier à modérer </th>
                        <th> Modérer </th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                        foreach ($allContractsInfos as $contractsInformation) {
                            foreach ($files_list as $fill => $fillFr) {
                                if ($contractsInformation[$fill.'_valid'] == 'waiting') {
                                    ?> 
                                    <tr>
                                        <td> 
                                            <?php echo htmlspecialchars($contractsInformation['firstname']); ?> <?php echo htmlspecialchars($contractsInformation['lastname']); ?>
                                        </td>
                                        <td>
                                            <h5> <?php echo $fillFr; ?> </h5></br> 
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
                                                Voir le document
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"> <?php echo $fillFr; ?>  </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body"> 
                                                <img src="<?php echo $contractsInformation[$fill]; ?>" class="img-fluid" alt="<?php echo $fillFr; ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Fermer </button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="http://localhost/Afev/index.php?url=/approveFile&fileName=<?php echo $fill; ?>&id_user=<?php echo $contractsInformation['id_user']; ?>"> <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Approuver </a> </br>
                                            <a href="http://localhost/Afev/index.php?url=/desapproveFile&&fileLocation=<?php echo $contractsInformation[$fill]; ?>&fileName=<?php echo $fill; ?>&id_user=<?php echo $contractsInformation['id_user']; ?>"> <i class="fa fa-trash-o" aria-hidden="true"></i> Désaprouver </a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                        }
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- User's Folders -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Dossiers volontaires : </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="folders_state" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Nom - Prénom </th>
                        <th>Dates du contrat </th>
                        <th> Etat du dossier </th>
                        <th> Pièces manquantes </th>
                        <th> Anonymiser (cette action est irréversible) </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($allContractsInfos as $contractsInformation) {
                        if ($contractsInformation['active'] != 'false') {
                            ?>
                            <tr>
                                <td> <?php echo htmlspecialchars($contractsInformation['firstname']); ?>  <?php echo htmlspecialchars($contractsInformation['lastname']); ?> </td>
                                <td> 
                                    <form method="post" action="index.php?url=/admin_uploadDates">
                                        <label for="date_start"> Date début  : <?php echo $contractsInformation['date_startFr']; ?>  </label> 
                                        <input type="date" id="date_start" name="date_start"
                                                    min="2019-09-01" max="2020-12-31"> </br>
                                        <label for="date_end">  Date de fin : <?php echo $contractsInformation['date_endFr']; ?>  </label>
                                        <input type="date" id="date_end" name="date_end"
                                                    min="2019-09-01" max="2020-12-31"> </br>
                                        <input type="submit" value="Modifier" />
                                    </form>
                                </td>
                                <td> 
                                    <?php
                                    if ($folders->folderComplete($contractsInformation['id_user']) == true) {
                                        ?>    
                                        <p> Complet </p>
                                        <a href="index.php?url=/downloadFolder&folderName=<?php echo htmlspecialchars($contractsInformation['folder_name']); ?>"> 
                                            Télécharger le dossier
                                        </a>
                                    <?php
                                    } else {
                                        echo 'Incomplet';
                                    } ?>
                                </td>
                                <td>
                                <?php
                                    foreach ($files_list as $fill => $fillFr) {
                                        if ($contractsInformation[$fill.'_valid'] == null) {
                                            echo $fillFr; ?> </br> 
                                        
                                <?php
                                        }
                                    } ?>
                                </td>
                                <td> 
                                    <p> Attention, cette action est irréversible et supprimera l'ensemble des données et fichiers du volontaire.</p>
                                    <form method="post" action="index.php?url=/anonymizeUser"> 
                                        <input type="hidden" name="user_id" value=<?php echo $contractsInformation['id_user']; ?>>
                                        <input type="hidden" name="folder_name" value=<?php echo $contractsInformation['folder_name']; ?>>
                                        <input type="submit"  class="btn btn-light" value="Anonymiser le dossier" />
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }
                    } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nom - Prénom </th>
                        <th>Dates du contrat </th>
                        <th> Etat du dossier </th>
                        <th> Pièces manquantes </th>
                        <th> Anonymiser (cette action est irréversible) </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>