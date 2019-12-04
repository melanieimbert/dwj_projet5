<div id="error">
    <h2 class="exception">
        <?php echo $error; ?>
    </h2>
    <?php
    if (!empty($_SERVER['HTTP_REFERER'])) {
        ?>
        <p> 
            <a id="previousPage" href="<?php echo $_SERVER['HTTP_REFERER']; ?>"> Retour à la page précédente</a>
        </p>
    <?php
    } ?>
</div>