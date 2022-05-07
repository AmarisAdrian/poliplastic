<?php
  if(isset($_GET["id"])){
          $Rel = RelacionarSubproductoModel::GetById($_GET["id"]);
          $rel->Delete();
          Core::redir_log("./?view=subproductos");
    }
?>