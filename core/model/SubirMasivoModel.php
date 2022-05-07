<?php

require 'asset/vendor/autoload.php';
require 'core/model/LineaModel.php';
require 'core/model/GrupoModel.php';
require 'core/model/CatalogoModel.php';
require 'core/model/LineaInventarioModel.php';
require 'core/model/ComplementModel.php';
require 'core/model/ExplosionModel.php';
require 'core/model/ProduccionDiariaModel.php';
require 'core/model/SubproductoModel.php';
require 'core/model/RelacionarSubproductoModel.php';
require 'core/model/ProduccionSiinModel.php';
require 'core/model/ProduccionSapModel.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
ini_set('memory_limit', -1);

class SubirMasivoModel
{

    public static function FileUploadLinea($data)
    {
        $spreadSheet = IOFactory::load($data);
        $val = false;
        $excelSheet = $spreadSheet->getSheetCount();
        $linea = new LineaModel();
        for ($indiceHoja = 0; $indiceHoja < $excelSheet; $indiceHoja++) {
            # Obtener hoja en el índice que vaya del ciclo
            $hojaActual = $spreadSheet->getSheet($indiceHoja);
            // echo "<h3>Vamos en la hoja con índice $indiceHoja</h3>";
            # Calcular el máximo valor de la fila como entero, es decir, el
            # límite de nuestro ciclo
            $numeroMayorDeFila = $hojaActual->getHighestRow(); // Numérico
            $letraMayorDeColumna = $hojaActual->getHighestColumn(); // Letra
            # Convertir la letra al número de columna correspondiente
            $numeroMayorDeColumna = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($letraMayorDeColumna);
            # Iterar filas con ciclo for e índices
            $result = 0;
            $fila_resp = 0;
          
            for ($indiceFila = 2; $indiceFila <= $numeroMayorDeFila; $indiceFila++) {
                $array = array();
                for ($indiceColumna = 1; $indiceColumna <= $numeroMayorDeColumna; $indiceColumna++) {
                    # Obtener celda por columna y fila
                    $celda = $hojaActual->getCellByColumnAndRow($indiceColumna, $indiceFila);
                    # Y ahora que tenemos una celda trabajamos con ella igual que antes
                    # El valor, así como está en el documento
                    $valorRaw = $celda->getValue();
                    # Formateado por ejemplo como dinero o con decimales
                    $valorFormateado = $celda->getFormattedValue();
                    # Si es una fórmula y necesitamos su valor, llamamos a:
                    $valorCalculado = $celda->getCalculatedValue();
                    # Fila, que comienza en 1, luego 2 y así...
                    $fila = $celda->getRow();
                    # Columna, que es la A, B, C y así...
                    $columna = $celda->getColumn();
                    $valorRaw = $valorRaw;
                    array_push($array, $valorRaw);
                }
                if (!empty($array)) {
                    $linea->codigo = $array[0];
                    $linea->nombre = $array[1];
                    if ($linea->Add()) {
                        $val = true;
                    } else {
                        $val = false;
                    }
                }             
            }

        }
        return $val;
    }
    public static function FileUploadGrupo($data)
    {
        $spreadSheet = IOFactory::load($data);
        $val = false;
        $excelSheet = $spreadSheet->getSheetCount();
        $grupo = new GrupoModel();
        for ($indiceHoja = 0; $indiceHoja < $excelSheet; $indiceHoja++) {
            # Obtener hoja en el índice que vaya del ciclo
            $hojaActual = $spreadSheet->getSheet($indiceHoja);
            // echo "<h3>Vamos en la hoja con índice $indiceHoja</h3>";
            # Calcular el máximo valor de la fila como entero, es decir, el
            # límite de nuestro ciclo
            $numeroMayorDeFila = $hojaActual->getHighestRow(); // Numérico
            $letraMayorDeColumna = $hojaActual->getHighestColumn(); // Letra
            # Convertir la letra al número de columna correspondiente
            $numeroMayorDeColumna = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($letraMayorDeColumna);
            # Iterar filas con ciclo for e índices
            $result = 0;
            $fila_resp = 0;      
            for ($indiceFila = 2; $indiceFila <= $numeroMayorDeFila; $indiceFila++) {
                $array = array();
                for ($indiceColumna = 1; $indiceColumna <= $numeroMayorDeColumna; $indiceColumna++) {
                    # Obtener celda por columna y fila
                    $celda = $hojaActual->getCellByColumnAndRow($indiceColumna, $indiceFila);
                    # Y ahora que tenemos una celda trabajamos con ella igual que antes
                    # El valor, así como está en el documento
                    $valorRaw = $celda->getValue();
                    # Formateado por ejemplo como dinero o con decimales
                    $valorFormateado = $celda->getFormattedValue();
                    # Si es una fórmula y necesitamos su valor, llamamos a:
                    $valorCalculado = $celda->getCalculatedValue();
                    # Fila, que comienza en 1, luego 2 y así...
                    $fila = $celda->getRow();
                    # Columna, que es la A, B, C y así...
                    $columna = $celda->getColumn();
                    $valorRaw = $valorRaw;
                    array_push($array, $valorRaw);
                }
                if (!empty($array)) {
                    $grupo->codigo = $array[0];
                    $grupo->nombre = $array[1];
                    if ($grupo->Add()) {
                        $val = true;
                    } else {
                        $val = false;
                    }
                }             
            }

        }
        return $val;
    }
    public static function FileUploadCatalogo($data)
    {
        $spreadSheet = IOFactory::load($data);
        $val = false;
        $excelSheet = $spreadSheet->getSheetCount();
        $catalogo = new CatalogoModel();
        for ($indiceHoja = 0; $indiceHoja < $excelSheet; $indiceHoja++) {
            # Obtener hoja en el índice que vaya del ciclo
            $hojaActual = $spreadSheet->getSheet($indiceHoja);
            // echo "<h3>Vamos en la hoja con índice $indiceHoja</h3>";
            # Calcular el máximo valor de la fila como entero, es decir, el
            # límite de nuestro ciclo
            $numeroMayorDeFila = $hojaActual->getHighestRow(); // Numérico
            $letraMayorDeColumna = $hojaActual->getHighestColumn(); // Letra
            # Convertir la letra al número de columna correspondiente
            $numeroMayorDeColumna = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($letraMayorDeColumna);
            # Iterar filas con ciclo for e índices
            $result = 0;
            $fila_resp = 0;      
            for ($indiceFila = 2; $indiceFila <= $numeroMayorDeFila; $indiceFila++) {
                $array = array();
                for ($indiceColumna = 1; $indiceColumna <= $numeroMayorDeColumna; $indiceColumna++) {
                    # Obtener celda por columna y fila
                    $celda = $hojaActual->getCellByColumnAndRow($indiceColumna, $indiceFila);
                    # Y ahora que tenemos una celda trabajamos con ella igual que antes
                    # El valor, así como está en el documento
                    $valorRaw = $celda->getValue();
                    # Formateado por ejemplo como dinero o con decimales
                    $valorFormateado = $celda->getFormattedValue();
                    # Si es una fórmula y necesitamos su valor, llamamos a:
                    $valorCalculado = $celda->getCalculatedValue();
                    # Fila, que comienza en 1, luego 2 y así...
                    $fila = $celda->getRow();
                    # Columna, que es la A, B, C y así...
                    $columna = $celda->getColumn();
                    $valorRaw = $valorRaw;
                    array_push($array, $valorRaw);
                }
                if (!empty($array)) {
                    $catalogo->referencia_fabrica = $array[0];
                    $catalogo->descripcion = $array[1];
                    $catalogo->idLinea = $array[2];
                    $catalogo->idGrupo = $array[3];
                    $catalogo->elemento = $array[4];
                    $catalogo->codigo_siigo = $array[5];
                    $catalogo->ajustable_marca = $array[6];
                    $catalogo->unidad = $array[7];
                    $catalogo->peso = $array[8];
                    if ($catalogo->Add()) {
                        $val = true;
                    } else {
                        $val = false;
                    }
                }             
            }

        }
        return $val;
    }

    public static function FileUploadLineaInventario($data)
    {
        $spreadSheet = IOFactory::load($data);
        $val = false;
        $excelSheet = $spreadSheet->getSheetCount();
        $inventario = new LineaInventarioModel();
        for ($indiceHoja = 0; $indiceHoja < $excelSheet; $indiceHoja++) {
            # Obtener hoja en el índice que vaya del ciclo
            $hojaActual = $spreadSheet->getSheet($indiceHoja);
            // echo "<h3>Vamos en la hoja con índice $indiceHoja</h3>";
            # Calcular el máximo valor de la fila como entero, es decir, el
            # límite de nuestro ciclo
            $numeroMayorDeFila = $hojaActual->getHighestRow(); // Numérico
            $letraMayorDeColumna = $hojaActual->getHighestColumn(); // Letra
            # Convertir la letra al número de columna correspondiente
            $numeroMayorDeColumna = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($letraMayorDeColumna);
            # Iterar filas con ciclo for e índices
            $result = 0;
            $fila_resp = 0;      
            for ($indiceFila = 2; $indiceFila <= $numeroMayorDeFila; $indiceFila++) {
                $array = array();
                for ($indiceColumna = 1; $indiceColumna <= $numeroMayorDeColumna; $indiceColumna++) {
                    # Obtener celda por columna y fila
                    $celda = $hojaActual->getCellByColumnAndRow($indiceColumna, $indiceFila);
                    # Y ahora que tenemos una celda trabajamos con ella igual que antes
                    # El valor, así como está en el documento
                    $valorRaw = $celda->getValue();
                    # Formateado por ejemplo como dinero o con decimales
                    $valorFormateado = $celda->getFormattedValue();
                    # Si es una fórmula y necesitamos su valor, llamamos a:
                    $valorCalculado = $celda->getCalculatedValue();
                    # Fila, que comienza en 1, luego 2 y así...
                    $fila = $celda->getRow();
                    # Columna, que es la A, B, C y así...
                    $columna = $celda->getColumn();
                    $valorRaw = $valorRaw;
                    array_push($array, $valorRaw);
                }
                if (!empty($array)) {
                    $inventario->idLinea = $array[0];
                    $inventario->idGrupo = $array[1];
                    $inventario->cta_inventario =$array[2];
                    $inventario->cta_costo = $array[3];
                    $inventario->cta_venta = $array[4];
                    $inventario->cta_devolucion = $array[5];
                    $inventario->cta_compra = $array[6];
                    $inventario->cta_deb_ja = $array[7];;
                    $inventario->cta_cred_aj =$array[8];;
                    $inventario->cta_ivadif_vta = $array[9];
                    $inventario->cta_ivadif_comp = $array[10];
                    if ($inventario->Add()) {
                        $val = true;
                    } else {
                        $val = false;
                    }
                }             
            }

        }
        return $val;
    }
    public static function FileUploadExplosion($data)
    {
        $spreadSheet = IOFactory::load($data);
        $val = false;
        $excelSheet = $spreadSheet->getSheetCount();
        for ($indiceHoja = 0; $indiceHoja < $excelSheet; $indiceHoja++) {
            # Obtener hoja en el índice que vaya del ciclo
            $hojaActual = $spreadSheet->getSheet($indiceHoja);
            // echo "<h3>Vamos en la hoja con índice $indiceHoja</h3>";
            # Calcular el máximo valor de la fila como entero, es decir, el
            # límite de nuestro ciclo
            $numeroMayorDeFila = $hojaActual->getHighestRow(); // Numérico
            $letraMayorDeColumna = $hojaActual->getHighestColumn(); // Letra
            # Convertir la letra al número de columna correspondiente
            $numeroMayorDeColumna = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($letraMayorDeColumna);
            # Iterar filas con ciclo for e índices
            $result = 0;
            $fila_resp = 0;    
         if($indiceHoja==0) {
            for ($indiceFila = 2; $indiceFila <= $numeroMayorDeFila; $indiceFila++) {
                $array = array(); 
                for ($indiceColumna = 1; $indiceColumna <= $numeroMayorDeColumna; $indiceColumna++) {
                    # Obtener celda por columna y fila
                    $celda = $hojaActual->getCellByColumnAndRow($indiceColumna, $indiceFila);
                    # Y ahora que tenemos una celda trabajamos con ella igual que antes
                    # El valor, así como está en el documento
                    $valorRaw = $celda->getValue();
                    # Formateado por ejemplo como dinero o con decimales
                    $valorFormateado = $celda->getFormattedValue();
                    # Si es una fórmula y necesitamos su valor, llamamos a:
                    $valorCalculado = $celda->getCalculatedValue();
                    # Fila, que comienza en 1, luego 2 y así...
                    $fila = $celda->getRow();
                    # Columna, que es la A, B, C y así...
                    $columna = $celda->getColumn();
                    $valorRaw = $valorRaw;
                  //  array_push($array, $valorRaw);   
                   $array[$indiceFila][$indiceColumna] = $valorRaw;     
                }   
            }
            if(!is_null($array)){
                $val = true;
            }   
         }
       }
        $result = [$val,$array];
        return  $result;
    }
    public static function FileUploadProduccionDiaria($data)
    {
        $spreadSheet = IOFactory::load($data);
        $val = false;
        $excelSheet = $spreadSheet->getSheetCount();
        for ($indiceHoja = 0; $indiceHoja < $excelSheet; $indiceHoja++) {
            # Obtener hoja en el índice que vaya del ciclo
            $hojaActual = $spreadSheet->getSheet($indiceHoja);
            // echo "<h3>Vamos en la hoja con índice $indiceHoja</h3>";
            # Calcular el máximo valor de la fila como entero, es decir, el
            # límite de nuestro ciclo
            $numeroMayorDeFila = $hojaActual->getHighestRow(); // Numérico
            $letraMayorDeColumna = $hojaActual->getHighestColumn(); // Letra
            # Convertir la letra al número de columna correspondiente
            $numeroMayorDeColumna = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($letraMayorDeColumna);
            # Iterar filas con ciclo for e índices
            $result = 0;
            $fila_resp = 0;    
        if($indiceHoja==1){
            for ($indiceFila = 2; $indiceFila <= $numeroMayorDeFila; $indiceFila++) {
                $array = array(); 
                for ($indiceColumna = 1; $indiceColumna <= $numeroMayorDeColumna; $indiceColumna++) {
                    # Obtener celda por columna y fila
                    $celda = $hojaActual->getCellByColumnAndRow($indiceColumna, $indiceFila);
                    # Y ahora que tenemos una celda trabajamos con ella igual que antes
                    # El valor, así como está en el documento
                    $valorRaw = $celda->getValue();
                    # Formateado por ejemplo como dinero o con decimales
                    $valorFormateado = $celda->getFormattedValue();
                    # Si es una fórmula y necesitamos su valor, llamamos a:
                    $valorCalculado = $celda->getCalculatedValue();
                    # Fila, que comienza en 1, luego 2 y así...
                    $fila = $celda->getRow();
                    # Columna, que es la A, B, C y así...
                    $columna = $celda->getColumn();
                    $valorRaw = $valorRaw;
                  //  array_push($array, $valorRaw);   
                   $array[$indiceFila][$indiceColumna] = $valorRaw;     
                }   
            }
            if(!is_null($array)){
                $val = true;
            }   
         }
       }
        $result = [$val,$array];
        return  $result;
    }
    public static function FileAddProduccionSap($data)
    {
        $spreadSheet = IOFactory::load($data);
        $val = false;
        $excelSheet = $spreadSheet->getSheetCount();
        $sap = new ProduccionSapModel();
        for ($indiceHoja = 0; $indiceHoja < $excelSheet; $indiceHoja++) {
            # Obtener hoja en el índice que vaya del ciclo
            $hojaActual = $spreadSheet->getSheet($indiceHoja);
            // echo "<h3>Vamos en la hoja con índice $indiceHoja</h3>";
            # Calcular el máximo valor de la fila como entero, es decir, el
        # límite de nuestro ciclo
            $numeroMayorDeFila = $hojaActual->getHighestRow(); // Numérico
            $letraMayorDeColumna = $hojaActual->getHighestColumn(); // Letra
            # Convertir la letra al número de columna correspondiente
            $numeroMayorDeColumna = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($letraMayorDeColumna);
            # Iterar filas con ciclo for e índices
            $result = 0;
            $fila_resp = 0;  
            
        if($indiceHoja==2){
            for ($indiceFila = 2; $indiceFila <= $numeroMayorDeFila; $indiceFila++) {
                $array = array(); 
                for ($indiceColumna = 1; $indiceColumna <= $numeroMayorDeColumna; $indiceColumna++) {
                    # Obtener celda por columna y fila
                    $celda = $hojaActual->getCellByColumnAndRow($indiceColumna, $indiceFila);
                    # Y ahora que tenemos una celda trabajamos con ella igual que antes
                    # El valor, así como está en el documento
                    $valorRaw = $celda->getValue();
                    # Formateado por ejemplo como dinero o con decimales
                    $valorFormateado = $celda->getFormattedValue();
                    # Si es una fórmula y necesitamos su valor, llamamos a:
                    $valorCalculado = $celda->getCalculatedValue();
                    # Fila, que comienza en 1, luego 2 y así...
                    $fila = $celda->getRow();
                    # Columna, que es la A, B, C y así...
                    $columna = $celda->getColumn();
                    $valorRaw = $valorRaw;
                  array_push($array, $valorRaw);   
                  //  $array[$indiceFila][$indiceColumna] = $valorRaw;     
                } 
                if (!empty($array)) {
                    $sap->numero_orden = $array[0];              
                    $get_data1 = $array[1];
                    $unix = ($get_data1 - 25569) * 86400; 
                    $st = date("Y-m-d", $unix);
                    $sap->fecha_orden = date("Y/m/d",strtotime($st."+ 1 days"));
                    $sap->estado =$array[2];
                    $sap->grupo = $array[3];
                    $sap->codigo_producto = $array[4];
                    $sap->cantidad_planificada = $array[5];
                    $sap->codigo_producto2 = $array[6];
                    $sap->cantidad_consumida = $array[7];
                    $sap->comentario =$array[8];
                    if ($sap->Add()) {
                        $val = true;
                    } else {
                        $val = false;
                    }
                }             
            }  
          }
        }
        return  $val;
     }
     public static function FileAddProduccionSiin($data)
    {
        $spreadSheet = IOFactory::load($data);
        $val = false;
        $excelSheet = $spreadSheet->getSheetCount();
        $siin = new ProduccionsiinModel();
        for ($indiceHoja = 0; $indiceHoja < $excelSheet; $indiceHoja++) {
            # Obtener hoja en el índice que vaya del ciclo
            $hojaActual = $spreadSheet->getSheet($indiceHoja);
            // echo "<h3>Vamos en la hoja con índice $indiceHoja</h3>";
            # Calcular el máximo valor de la fila como entero, es decir, el
        # límite de nuestro ciclo
            $numeroMayorDeFila = $hojaActual->getHighestRow(); // Numérico
            $letraMayorDeColumna = $hojaActual->getHighestColumn(); // Letra
            # Convertir la letra al número de columna correspondiente
            $numeroMayorDeColumna = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($letraMayorDeColumna);
            # Iterar filas con ciclo for e índices
            $result = 0;
            $fila_resp = 0;  
            
        if($indiceHoja==3){
            for ($indiceFila = 2; $indiceFila <= $numeroMayorDeFila; $indiceFila++) {
                $array = array(); 
                for ($indiceColumna = 1; $indiceColumna <= $numeroMayorDeColumna; $indiceColumna++) {
                    # Obtener celda por columna y fila
                    $celda = $hojaActual->getCellByColumnAndRow($indiceColumna, $indiceFila);
                    # Y ahora que tenemos una celda trabajamos con ella igual que antes
                    # El valor, así como está en el documento
                    $valorRaw = $celda->getValue();
                    # Formateado por ejemplo como dinero o con decimales
                    $valorFormateado = $celda->getFormattedValue();
                    # Si es una fórmula y necesitamos su valor, llamamos a:
                    $valorCalculado = $celda->getCalculatedValue();
                    # Fila, que comienza en 1, luego 2 y así...
                    $fila = $celda->getRow();
                    # Columna, que es la A, B, C y así...
                    $columna = $celda->getColumn();
                    $valorRaw = $valorRaw;
                  array_push($array, $valorRaw);   
                    //$array[$indiceFila][$indiceColumna] = $valorRaw;     
                } 
                if (!empty($array)) {
                    $get_data1 = $array[0];
                    $unix = ($get_data1 - 25569) * 86400; 
                    $st = date("Y-m-d", $unix);
                    $siin->fecha = date("Y/m/d",strtotime($st."+ 1 days"));;
                    $siin->codigo_tela = $array[1];
                    $siin->descripcion_tela =$array[2];
                    $siin->descripcion = $array[3];
                    $siin->rollo = $array[4];
                    $siin->peso = $array[5];
                    $siin->longitud = $array[6];
                    $siin->scrap = $array[7];
                    $siin->conos =$array[8];
                    if ($siin->Add()) {
                        $val = true;
                    } else {
                        $val = false;
                    }
                }             
            }  
          }
        }
        return  $val;
     }
    public static function FileUploadProduccionSap($data)
    {   

            $spreadSheet = IOFactory::load($data);
            $val = false;
            $excelSheet = $spreadSheet->getSheetCount();
            for ($indiceHoja = 0; $indiceHoja < $excelSheet; $indiceHoja++) {
                # Obtener hoja en el índice que vaya del ciclo
                $hojaActual = $spreadSheet->getSheet($indiceHoja);
                // echo "<h3>Vamos en la hoja con índice $indiceHoja</h3>";
                # Calcular el máximo valor de la fila como entero, es decir, el
            # límite de nuestro ciclo
                $numeroMayorDeFila = $hojaActual->getHighestRow(); // Numérico
                $letraMayorDeColumna = $hojaActual->getHighestColumn(); // Letra
                # Convertir la letra al número de columna correspondiente
                $numeroMayorDeColumna = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($letraMayorDeColumna);
                # Iterar filas con ciclo for e índices
                $result = 0;
                $fila_resp = 0;  
                
            if($indiceHoja==2){
                for ($indiceFila = 2; $indiceFila <= $numeroMayorDeFila; $indiceFila++) {
                    $array = array(); 
                    for ($indiceColumna = 1; $indiceColumna <= $numeroMayorDeColumna; $indiceColumna++) {
                        # Obtener celda por columna y fila
                        $celda = $hojaActual->getCellByColumnAndRow($indiceColumna, $indiceFila);
                        # Y ahora que tenemos una celda trabajamos con ella igual que antes
                        # El valor, así como está en el documento
                        $valorRaw = $celda->getValue();
                        # Formateado por ejemplo como dinero o con decimales
                        $valorFormateado = $celda->getFormattedValue();
                        # Si es una fórmula y necesitamos su valor, llamamos a:
                        $valorCalculado = $celda->getCalculatedValue();
                        # Fila, que comienza en 1, luego 2 y así...
                        $fila = $celda->getRow();
                        # Columna, que es la A, B, C y así...
                        $columna = $celda->getColumn();
                        $valorRaw = $valorRaw;
                    //  array_push($array, $valorRaw);   
                    $array[$indiceFila][$indiceColumna] = $valorRaw;     
                    }   
                }
                if(!is_null($array)){
                    $val = true;
                }   
            }
         }
        $result = [$val,$array];
        return  $result;
        }
        public static function FileUploadProduccionSiin($data)
        {
            $spreadSheet = IOFactory::load($data);
            $val = false;
            $excelSheet = $spreadSheet->getSheetCount();
            for ($indiceHoja = 0; $indiceHoja < $excelSheet; $indiceHoja++) {
                # Obtener hoja en el índice que vaya del ciclo
                $hojaActual = $spreadSheet->getSheet($indiceHoja);
                // echo "<h3>Vamos en la hoja con índice $indiceHoja</h3>";
                # Calcular el máximo valor de la fila como entero, es decir, el
                # límite de nuestro ciclo
                $numeroMayorDeFila = $hojaActual->getHighestRow(); // Numérico
                $letraMayorDeColumna = $hojaActual->getHighestColumn(); // Letra
                # Convertir la letra al número de columna correspondiente
                $numeroMayorDeColumna = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($letraMayorDeColumna);
                # Iterar filas con ciclo for e índices
                $result = 0;
                $fila_resp = 0;    
            if($indiceHoja==3){
                for ($indiceFila = 2; $indiceFila <= $numeroMayorDeFila; $indiceFila++) {
                    $array = array(); 
                    for ($indiceColumna = 1; $indiceColumna <= $numeroMayorDeColumna; $indiceColumna++) {
                        # Obtener celda por columna y fila
                        $celda = $hojaActual->getCellByColumnAndRow($indiceColumna, $indiceFila);
                        # Y ahora que tenemos una celda trabajamos con ella igual que antes
                        # El valor, así como está en el documento
                        $valorRaw = $celda->getValue();
                        # Formateado por ejemplo como dinero o con decimales
                        $valorFormateado = $celda->getFormattedValue();
                        # Si es una fórmula y necesitamos su valor, llamamos a:
                        $valorCalculado = $celda->getCalculatedValue();
                        # Fila, que comienza en 1, luego 2 y así...
                        $fila = $celda->getRow();
                        # Columna, que es la A, B, C y así...
                        $columna = $celda->getColumn();
                        $valorRaw = $valorRaw;
                    //  array_push($array, $valorRaw);   
                    $array[$indiceFila][$indiceColumna] = $valorRaw;     
                    }   
                }
                if(!is_null($array)){
                    $val = true;
                }   
            }
        }
        $result = [$val,$array];
        return  $result;
    }

    public static function FileAddExplosion($data)
    {
        $spreadSheet = IOFactory::load($data);
        $val = false;
        $explosion = new ExplosionModel();
        $excelSheet = $spreadSheet->getSheetCount();
        for ($indiceHoja = 1; $indiceHoja < $excelSheet; $indiceHoja++) {
            # Obtener hoja en el índice que vaya del ciclo
            $hojaActual = $spreadSheet->getSheet($indiceHoja);
            // echo "<h3>Vamos en la hoja con índice $indiceHoja</h3>";
            # Calcular el máximo valor de la fila como entero, es decir, el
            # límite de nuestro ciclo
            $numeroMayorDeFila = $hojaActual->getHighestRow(); // Numérico
            $letraMayorDeColumna = $hojaActual->getHighestColumn(); // Letra
            # Convertir la letra al número de columna correspondiente
            $numeroMayorDeColumna = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($letraMayorDeColumna);
            # Iterar filas con ciclo for e índices
            $result = 0;
            $fila_resp = 0;    
           if($indiceHoja==1) {
                for ($indiceFila = 2; $indiceFila <= $numeroMayorDeFila; $indiceFila++) {
                    $array = array(); 
                    for ($indiceColumna = 1; $indiceColumna <= $numeroMayorDeColumna; $indiceColumna++) {
                        # Obtener celda por columna y fila
                        $celda = $hojaActual->getCellByColumnAndRow($indiceColumna, $indiceFila);
                        # Y ahora que tenemos una celda trabajamos con ella igual que antes
                        # El valor, así como está en el documento
                        $valorRaw = $celda->getValue();
                        # Formateado por ejemplo como dinero o con decimales
                        $valorFormateado = $celda->getFormattedValue();
                        # Si es una fórmula y necesitamos su valor, llamamos a:
                        $valorCalculado = $celda->getCalculatedValue();
                        # Fila, que comienza en 1, luego 2 y así...
                        $fila = $celda->getRow();
                        # Columna, que es la A, B, C y así...
                        $columna = $celda->getColumn();
                        $valorRaw = $valorRaw;
                        array_push($array, $valorRaw);   
                    }  
                    if(!is_null($array)){
                       $explosion->pedido = $array[0];
                        $explosion->numero_orden =$array[1];
                        $get_data1 = $array[2];
                        $unix = ($get_data1 - 25569) * 86400; 
                        $st = date("Y-m-d", $unix);
                        $explosion->fecha = date("Y/m/d",strtotime($st."+ 1 days")); 
                        $explosion->cliente = $array[3];
                        $explosion->linea = $array[4];
                        $explosion->codigo_producto = $array[5];
                        $explosion->extrae_codigo = $array[6];
                        $explosion->descripcion1 = $array[7];
                        $explosion->cantidad_planificada = $array[8];
                        $explosion->kilos_scrap =$array[9];
                        $explosion->kilos_prod_terminado = $array[10];
                        $explosion->unidades = $array[11];
                        $explosion->peso_prom_unidad = $array[12];
                        $explosion->grupo = trim($array[13]);
                        $explosion->codigo_producto2 = $array[14];
                        $explosion->descripcion2 = $array[15];
                        $explosion->cantidad_consumida =$array[16];
                        $explosion->costo_x_kilo = $array[17];
                        $explosion->costo_total = $array[18];
                        $explosion->comentario = $array[19];
                        if ($explosion->Add()) {
                            $val = true;
                    }    
                }
            }           
        }
     }
        $result = [$val,$array];
        return  $result;
    }

    public static function FileAddProduccion($data)
    {
        $spreadSheet = IOFactory::load($data);
        $val = false;
        $produccion = new ProduccionDiariaModel();
        $excelSheet = $spreadSheet->getSheetCount();
        for ($indiceHoja = 0; $indiceHoja < $excelSheet; $indiceHoja++) {
            # Obtener hoja en el índice que vaya del ciclo
            $hojaActual = $spreadSheet->getSheet($indiceHoja);
           // echo "<h3>Vamos en la hoja con índice $indiceHoja</h3>";
            # Calcular el máximo valor de la fila como entero, es decir, el
            # límite de nuestro ciclo
            $numeroMayorDeFila = $hojaActual->getHighestRow(); // Numérico
            $letraMayorDeColumna = $hojaActual->getHighestColumn(); // Letra
            # Convertir la letra al número de columna correspondiente
            $numeroMayorDeColumna = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($letraMayorDeColumna);
            # Iterar filas con ciclo for e índices
            $result = 0;
            $fila_resp = 0;    
            if($indiceHoja==0){
            for ($indiceFila = 2; $indiceFila <= $numeroMayorDeFila; $indiceFila++) {
                $array_produccion = array(); 
                for ($indiceColumna = 1; $indiceColumna <= $numeroMayorDeColumna; $indiceColumna++) {
                    # Obtener celda por columna y fila
                    $celda = $hojaActual->getCellByColumnAndRow($indiceColumna, $indiceFila);
                    # Y ahora que tenemos una celda trabajamos con ella igual que antes
                    # El valor, así como está en el documento
                    $valorRaw = $celda->getValue();
                    # Formateado por ejemplo como dinero o con decimales
                    $valorFormateado = $celda->getFormattedValue();
                    # Si es una fórmula y necesitamos su valor, llamamos a:
                    $valorCalculado = $celda->getCalculatedValue();
                    # Fila, que comienza en 1, luego 2 y así...
                    $fila = $celda->getRow();
                    # Columna, que es la A, B, C y así...
                    $columna = $celda->getColumn();
                    $valorRaw = $valorRaw;
                    array_push($array_produccion, $valorRaw);   

                }  
                if(!is_null($array_produccion)){
                    
                    $get_data1 = $array_produccion[0];
                    $unix = ($get_data1 - 25569) * 86400; 
                    $st = date("Y-m-d", $unix);
                    $produccion->fecha = date("Y/m/d",strtotime($st."+ 1 days")); 
                    $produccion->cliente =$array_produccion[1];
                    $produccion->nombre_cliente =$array_produccion[2];
                    $produccion->pedido = $array_produccion[3];
                    $produccion->lote = $array_produccion[4];
                    $produccion->cod_terminado = $array_produccion[5];
                    $catalogo = CatalogoModel::GetByReferencia($produccion->cod_terminado);
                    $grupo = GrupoModel::GetByCodigo($catalogo->idGrupo);
                    /*$linea = LineaModel::GetByCodigo($catalogo->idLinea);*/
                    $produccion->descripcion_producto_terminado = $array_produccion[6];
                    $produccion->dpt = $array_produccion[7];
                    $produccion->cantidad = $array_produccion[8];
                    $produccion->peso = $array_produccion[9];
                    $produccion->tipo =$array_produccion[10];
                    $produccion->op = $array_produccion[11];
                    $produccion->ent_prov = $array_produccion[12];    
                    $produccion->orden = $array_produccion[13];
                  /*  $produccion->linea =$linea->codigo;*/
                    $produccion->grupo = $grupo->codigo;
                    $produccion->linea =$array_produccion[14];
                    $produccion->grupo = $array_produccion[15];
                    $produccion->codigo = $catalogo->elemento;
                    $cuenta = ComplementModel::GetByreferences($produccion->linea,$produccion->grupo);
                   /* $cuenta = ComplementModel::GetByreferences($catalogo->idLinea,$catalogo->idGrupo);*/
                    $produccion->valor1 =$array_produccion[17];
                    $produccion->cuenta =  $cuenta->cuenta_contable;
                    $produccion->dc = $array_produccion[19];
                    $produccion->descripcion = $catalogo->descripcion;
                    $produccion->valor2 = $array_produccion[21];
                    if ($produccion->Add()) {
                        $val = true;
                    } 
                }    
            }
         }
        }
        $result = [$val,$array_produccion];
        return  $result;
    }
    public static function FileUploadSubproducto($data)
    {
        $spreadSheet = IOFactory::load($data);
        $val = false;
        $excelSheet = $spreadSheet->getSheetCount();
        $sub = new SubproductoModel();
        for ($indiceHoja = 0; $indiceHoja < $excelSheet; $indiceHoja++) {
            # Obtener hoja en el índice que vaya del ciclo
            $hojaActual = $spreadSheet->getSheet($indiceHoja);
            // echo "<h3>Vamos en la hoja con índice $indiceHoja</h3>";
            # Calcular el máximo valor de la fila como entero, es decir, el
            # límite de nuestro ciclo
            $numeroMayorDeFila = $hojaActual->getHighestRow(); // Numérico
            $letraMayorDeColumna = $hojaActual->getHighestColumn(); // Letra
            # Convertir la letra al número de columna correspondiente
            $numeroMayorDeColumna = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($letraMayorDeColumna);
            # Iterar filas con ciclo for e índices
            $result = 0;
            $fila_resp = 0;
          
            for ($indiceFila = 2; $indiceFila <= $numeroMayorDeFila; $indiceFila++) {
                $array = array();
                for ($indiceColumna = 1; $indiceColumna <= $numeroMayorDeColumna; $indiceColumna++) {
                    # Obtener celda por columna y fila
                    $celda = $hojaActual->getCellByColumnAndRow($indiceColumna, $indiceFila);
                    # Y ahora que tenemos una celda trabajamos con ella igual que antes
                    # El valor, así como está en el documento
                    $valorRaw = $celda->getValue();
                    # Formateado por ejemplo como dinero o con decimales
                    $valorFormateado = $celda->getFormattedValue();
                    # Si es una fórmula y necesitamos su valor, llamamos a:
                    $valorCalculado = $celda->getCalculatedValue();
                    # Fila, que comienza en 1, luego 2 y así...
                    $fila = $celda->getRow();
                    # Columna, que es la A, B, C y así...
                    $columna = $celda->getColumn();
                    array_push($array, $valorRaw);
                }
               
                if (!empty($array)) {
                    $sub->codigo = $array[0];
                    $sub->nombre = $array[1];
                    if ($sub->Add()) {
                        $val = true;
                    } else {
                        $val = false;
                    }
                }             
            }

        }

        return $val;
    }
    public static function FileUploadRelacionarSubproducto($data)
    {
        $spreadSheet = IOFactory::load($data);
        $val = false;
        $excelSheet = $spreadSheet->getSheetCount();
        $sub = new RelacionarSubproductoModel();
        for ($indiceHoja = 0; $indiceHoja < $excelSheet; $indiceHoja++) {
            # Obtener hoja en el índice que vaya del ciclo
            $hojaActual = $spreadSheet->getSheet($indiceHoja);
            // echo "<h3>Vamos en la hoja con índice $indiceHoja</h3>";
            # Calcular el máximo valor de la fila como entero, es decir, el
            # límite de nuestro ciclo
            $numeroMayorDeFila = $hojaActual->getHighestRow(); // Numérico
            $letraMayorDeColumna = $hojaActual->getHighestColumn(); // Letra
            # Convertir la letra al número de columna correspondiente
            $numeroMayorDeColumna = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($letraMayorDeColumna);
            # Iterar filas con ciclo for e índices
            $result = 0;
            $fila_resp = 0;
          
            for ($indiceFila = 2; $indiceFila <= $numeroMayorDeFila; $indiceFila++) {
                $array = array();
                for ($indiceColumna = 1; $indiceColumna <= $numeroMayorDeColumna; $indiceColumna++) {
                    # Obtener celda por columna y fila
                    $celda = $hojaActual->getCellByColumnAndRow($indiceColumna, $indiceFila);
                    # Y ahora que tenemos una celda trabajamos con ella igual que antes
                    # El valor, así como está en el documento
                    $valorRaw = $celda->getValue();
                    # Formateado por ejemplo como dinero o con decimales
                    $valorFormateado = $celda->getFormattedValue();
                    # Si es una fórmula y necesitamos su valor, llamamos a:
                    $valorCalculado = $celda->getCalculatedValue();
                    # Fila, que comienza en 1, luego 2 y así...
                    $fila = $celda->getRow();
                    # Columna, que es la A, B, C y así...
                    $columna = $celda->getColumn();
                    array_push($array, $valorRaw);
                }
               
                if (!empty($array)) {
                    $sub->grupo_cuenta_contable = $array[0];
                    $sub->codigo_subproducto = $array[1];
                    if ($sub->Add()) {
                        $val = true;
                    } else {
                        $val = false;
                    }
                }             
            }

        }

        return $val;
    }
}
