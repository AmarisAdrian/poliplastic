<?php
//include_once "./ProduccionDiariaModel.php";
class InterfazSiigoModel extends MaquilaModel
{
    public function GenerarExcel()
    {
        $sw = false;
        $explosion = ExplosionModel::GetAll();
        $produccion = ProduccionDiariaModel::GetAll();
        $cuenta = ComplementModel::GetAllCuentaContable();
        $interfaz = new MaquilaModel();
        $relacionar = RelacionDocumentoMaquilaModel::GetAll();
        $data = array();
        if (is_array($explosion) && is_array($produccion)) {
            if (count($explosion) > 0 && count($produccion) > 0) {
                $cont = 1;
                foreach ($relacionar as $relacionar) {
                    foreach ($cuenta as $cuent => $key_cuenta) {
                        if ($cuent < 13) {
                            $interfaz->tipo_comprobante = "o";
                            $interfaz->codigo_comprobante = "3";
                            $interfaz->numero_documento =  $relacionar->numero_documento;
                            $interfaz->cuenta_contable = $key_cuenta->cuenta_contable;
                            $prod_cuenta = ComplementModel::GetAllCuentaContableByid($key_cuenta->cuenta_contable);
                            $interfaz->dc  = $prod_cuenta->dc;
                            $interfaz->valor_secuencia = "";
                            $interfaz->ano_documento = date("Y");
                            $interfaz->mes_documento = date("m");
                            $interfaz->dia_documento = date("d");
                            $interfaz->secuencia = $cuent + 1;
                            $interfaz->centro_costo = "";
                            $interfaz->descripcion_secuencia = $key_cuenta->nombre;
                            $interfaz->linea_produccion = $key_cuenta->linea;
                            $interfaz->grupo_produccion = $key_cuenta->grupo;
                            $interfaz->codigo_producto = $key_cuenta->codigo;
                            $cant = ExplosionModel::GetCantidadConsumidaMaquila(trim($relacionar->cod_terminado),trim($key_cuenta->nombre));
                            $interfaz->cantidad = $cant->cantidad;
                            $interfaz->cantidad2 = "";
                            $interfaz->codigo_bodega = "";
                            $interfaz->codigo_ubicacion = "";
                            $interfaz->cantidad_factor_conversion = "";
                            $interfaz->operador_factor_conversion = "";
                            $interfaz->valor_factor_conversion = "";
                             if ($interfaz->Add()) {
                                $sw = true;                        
                             } else {
                                $sw = false;                             
                            }
                        }
                        if ($cuent == 13) {
                            $interfaz->tipo_comprobante = "o";
                            $interfaz->codigo_comprobante = "3";
                            $interfaz->numero_documento =  $relacionar->numero_documento;
                            $prod_cuenta = ProduccionDiariaModel::GetCuentaByref($relacionar->cod_terminado);
                            $interfaz->cuenta_contable = $prod_cuenta->cuenta;                      
                            $interfaz->dc  = $prod_cuenta->dc;
                            $interfaz->valor_secuencia = "";
                            $interfaz->ano_documento = date("Y");
                            $interfaz->mes_documento = date("m");
                            $interfaz->dia_documento = date("d");
                            $interfaz->secuencia = $cuent + 1;
                            $interfaz->centro_costo = "";
                            $nombre = CatalogoModel::GetByReferencia($relacionar->cod_terminado);
                            $interfaz->descripcion_secuencia = $nombre->descripcion;
                            $interfaz->linea_produccion = $key_cuenta->linea;
                            $interfaz->grupo_produccion = $key_cuenta->grupo;
                            $interfaz->codigo_producto = $key_cuenta->codigo;
                            $cant = ExplosionModel::GetCantidadByRef(trim($relacionar->cod_terminado));
                            $interfaz->cantidad = $cant->cantidad1;
                            $interfaz->cantidad2 = $cant->cantidad2;
                            $interfaz->codigo_bodega = "";
                            $interfaz->codigo_ubicacion = "";
                            $interfaz->cantidad_factor_conversion = "";
                            $interfaz->operador_factor_conversion = "";
                            $interfaz->valor_factor_conversion = "";
                             if ($interfaz->Add()) {
                                $sw = true;                        
                             } else {
                                $sw = false;                             
                            }
                            $cuent = 0;
                            $cont = $cont + 1;
                        }
                    }
                }

                $cont++;
            }
        }
       return $sw;
    }
}
