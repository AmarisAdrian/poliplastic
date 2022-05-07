<?php
  if(isset($_GET["id"])){
          $linea = LineaModel::GetById($_GET["id"]);
          $linea->Delete();
          Core::redir_log("./?view=linea");
    }
?>