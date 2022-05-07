<?php
  if(isset($_GET["id"])){
          $linea = GrupoModel::GetById($_GET["id"]);
          $linea->Delete();
          Core::redir_log("./?view=grupo");
    }
?>