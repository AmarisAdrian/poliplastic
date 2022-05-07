<?php
  if(isset($_GET["id"])){
          $linea = CatalogoModel::GetById($_GET["id"]);
          $linea->Delete();
          Core::redir_log("./?view=catalogo");
    }
?>