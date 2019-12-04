<p> Bonjour et bienvenue sur votre plateforme administratif </p>
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
  }
?>


<form method="post" enctype="multipart/form-data" action="index.php?url=/volunteer_uploadFile">
  <label for="id_card">  Carte d'identité ou passeport : </label>
  <input type="hidden" name="nameFile" value="id_card">
  <input name="id_card" type="file" />
  <input type="submit" value="Envoyer le fichier" />
</form>
<form method="post" enctype="multipart/form-data" action="index.php?url=/volunteer_uploadFile">
  <label for="vital_card">  Carte vitale  :</label>
  <input type="hidden" name="nameFile" value="vital_card">
  <input name="vital_card" type="file" />
  <input type="submit" value="Envoyer le fichier" />
</form>
<form method="post" enctype="multipart/form-data" action="index.php?url=/volunteer_uploadFile">
  <label for="medical_certif">  Certificat médical :</label>
  <input type="hidden" name="nameFile" value="medical_certif">
  <input name="medical_certif" type="file" />
  <input type="submit" value="Envoyer le fichier" />
</form>
<form method="post" enctype="multipart/form-data" action="index.php?url=/volunteer_uploadFile">
  <label for="cv"> CV :</label>
  <input type="hidden" name="nameFile" value="cv">
  <input name="cv" type="file" />
  <input type="submit" value="Envoyer le fichier" />
</form>
<form method="post" enctype="multipart/form-data" action="index.php?url=/volunteer_uploadFile">
  <label for="criminal_rec">  Extrait de casier judiciaire - bulletin n'3 :</label>
  <input type="hidden" name="nameFile" value="criminal_rec">
  <input name="criminal_rec" type="file" />
  <input type="submit" value="Envoyer le fichier" />
</form>