<?php
  if(isset($_GET["id"])){
          $linea = LineaInventarioModel::GetById($_GET["id"]);
          $linea->Delete();
          Core::redir_log("./?view=linea_inventario");
    }
?>