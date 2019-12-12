<!-- Files to moderate -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Nouveaux fichier à modérer: </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nom - Prénom </th>
                        <th> Fichier à modérer </th>
                        <th> Modérer </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
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
                                            <?php echo $fillFr; ?> </br> 
                                            <a href="<?php echo $contractsInformation[$fill]; ?>"  target="_blank"> Voir le document </a>
                                        </td>
                                        <td>
                                            <a href="http://localhost/Afev/approveFile?fileName=<?php echo $fill; ?>&id_user=<?php echo $contractsInformation['id_user']; ?>"> <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Approuver </a> </br>
                                            <a href="http://localhost/Afev/desapproveFile?fileName=<?php echo $fill; ?>&id_user=<?php echo $contractsInformation['id_user']; ?>"> <i class="fa fa-trash-o" aria-hidden="true"></i> Désaprouver </a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                        }
                        ?>
                    </tr>
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
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nom - Prénom </th>
                        <th>Dates du contrat </th>
                        <th> Etat du dossier </th>
                        <th> Pièces manquantes </th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nom - Prénom </th>
                        <th>Dates du contrat </th>
                        <th> Etat du dossier </th>
                        <th> Pièces manquantes </th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    foreach ($allContractsInfos as $contractsInformation) {
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
                                    <a href="http://localhost/Afev/downloadFolder?firstname=<?php echo htmlspecialchars($contractsInformation['firstname']); ?>&lastname=<?php echo htmlspecialchars($contractsInformation['lastname']); ?>"> 
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
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>