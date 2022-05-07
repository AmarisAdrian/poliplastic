<?php if(isset($_GET["error"]) && !is_null($_GET["error"])):?>
<section>
    <div class="container">
        <div class="row">
            <div class="col">
                <br ><br> <br>
                <h3 class="text-center">¡ Error 404 ! pagina : <b class="text-uppercase"> <?php echo $_GET["error"]; ?> </b>no encontrada ...</h3>
            </div>
        </div>
    </div>
</section>
<?php else: ?> <h3 class="text-center">Ha ocurrido un error </h3> <?php endif; ?>