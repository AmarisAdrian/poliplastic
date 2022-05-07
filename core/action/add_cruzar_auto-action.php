<?php
    $catalogo = SubproductoModel::GetAll();
    if(is_array($catalogo)){
        if(count($catalogo)>0){
            foreach($catalogo as $catalogo){
                $relacion = RelacionarSubproductoModel::GetByCodigo($catalogo->codigo);
                if(!is_null($relacion)){
                    $catalogo->id = $catalogo->id; 
                    $catalogo->grupo = $relacion->grupo_cuenta_contable;
                    if($catalogo->UpdateGrupo()){
                        $data = ['msj'=>'success','producto'=>$catalogo->codigo,'code'=>'200','status'=>'Productos cruzados']; 
                    }else{
                        $data = ['msj'=>'success','producto'=>$catalogo->codigo,'code'=>'200','status'=>'El producto existente no pudo cruzarse']; 
                    }
                }else{
                    $relacion = RelacionarSubproductoModel::GetByCodigo(substr($catalogo->codigo,1));
                    if(!is_null($relacion)){
                        $catalogo->id = $catalogo->id; 
                        $catalogo->grupo = $relacion->grupo_cuenta_contable;
                        if($catalogo->UpdateGrupo()){
                            $data = ['msj'=>'success','producto'=>$catalogo->codigo,'code'=>'200','status'=>'Productos cruzados']; 
                        }else{
                            $data = ['msj'=>'success','producto'=>$catalogo->codigo,'code'=>'200','status'=>'El producto existente no pudo cruzarse']; 
                        }
                    }else {
                        $catalogo->id = $catalogo->id; 
                        $catalogo->grupo = "No encontrado";
                        if($catalogo->UpdateGrupo()){
                                $data = ['msj'=>'success','producto'=>$catalogo->codigo,'code'=>'200','status'=>'Productos cruzados']; 
                        }else{
                            $data = ['msj'=>'success','producto'=>$catalogo->codigo,'code'=>'200','status'=>'El producto vacio no pudo cruzarse']; 
                        } 
                    }
                }
             } 
        } else{
            $data = ['msj'=>'error','code'=>'500','status'=>'Catalogo de subproductos vacios']; 
        }          
    }else{
        $data = ['msj'=>'error','code'=>'500','status'=>'error de consulta de datos']; 
    }
echo json_encode($data);
