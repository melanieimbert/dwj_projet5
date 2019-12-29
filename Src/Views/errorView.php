<div class="col-md-10">
  <div class="error mx-auto" data-text="ERREUR!!!"> ERREUR... </div>
</div>
 <div class="text-center">
    
    <p class="lead text-gray-800 mb-5"> <?php echo $error; ?> </p>
    <img id="error_img" src="Asset/images/error.jpg" alt="someone_lost">
    <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
    <?php
    if (!empty($_SERVER['HTTP_REFERER'])) {
        ?>
        <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">&larr; Retour à la page précédente </a>
    <?php
    } ?> 
</div>