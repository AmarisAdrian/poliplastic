<?php
  if(isset($_GET["id"])){
          $sub = SubproductoModel::GetById($_GET["id"]);
          $sub->Delete();
          Core::redir_log("./?view=subproductos");
    }
?>