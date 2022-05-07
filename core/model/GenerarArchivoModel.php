<?php
ini_set('memory_limit', '-1');
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
require 'asset/vendor/autoload.php';

class GenerarArchivoModel{

   public static function Generar(){
        $sw = false;
        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'TIPO DE COMPROBANTE (OBLIGATORIO)')
        ->setCellValue('B1', 'CÓDIGO COMPROBANTE  (OBLIGATORIO)')
        ->setCellValue('C1', 'NÚMERO DE DOCUMENTO (OBLIGATORIO)')
        ->setCellValue('D1', 'CUENTA CONTABLE   (OBLIGATORIO)')
        ->setCellValue('E1', 'DÉBITO O CRÉDITO (OBLIGATORIO)')
        ->setCellValue('F1', 'VALOR DE LA SECUENCIA   (OBLIGATORIO)')
        ->setCellValue('G1', 'AÑO DEL DOCUMENTO')
        ->setCellValue('H1', 'MES DEL DOCUMENTO')
        ->setCellValue('I1', 'DÍA DEL DOCUMENTO')
        ->setCellValue('J1', 'CÓDIGO DEL VENDEDOR')
        ->setCellValue('K1', 'CÓDIGO DE LA CIUDAD')
        ->setCellValue('L1', 'CÓDIGO DE LA ZONA')
        ->setCellValue('M1', 'SECUENCIA')
        ->setCellValue('N1', 'CENTRO DE COSTO')
        ->setCellValue('O1', 'SUBCENTRO DE COSTO')
        ->setCellValue('P1', 'NIT')
        ->setCellValue('Q1', 'SUCURSAL')
        ->setCellValue('R1', 'DESCRIPCIÓN DE LA SECUENCIA')
        ->setCellValue('S1', 'NÚMERO DE CHEQUE')
        ->setCellValue('T1', 'COMPROBANTE ANULADO')
        ->setCellValue('U1', 'CÓDIGO DEL MOTIVO DE DEVOLUCIÓN')
        ->setCellValue('V1', 'FORMA DE PAGO')
        ->setCellValue('W1', 'LÍNEA PRODUCTO')
        ->setCellValue('X1', 'GRUPO PRODUCTO')
        ->setCellValue('Y1', 'CÓDIGO PRODUCTO')
        ->setCellValue('Z1', 'CANTIDAD')
        ->setCellValue('AA1', 'CANTIDAD 2')
        ->setCellValue('AB1', 'CÓDIGO DE LA BODEGA')
        ->setCellValue('AC1', 'CÓDIGO DE LA UBICACION')
        ->setCellValue('AD1', 'CANTIDAD FACTOR DE CONVERSION')
        ->setCellValue('AE1', 'OPERADOR DE FACTOR DE CONVERSION')
        ->setCellValue('AF1', 'VALOR DEL FACTOR DE CONVERSION');

        $spreadsheet->getActiveSheet()->getStyle("A1:AF1")->getFont()->setBold(true);
                 
        $maquila = MaquilaModel::GetAll();
        $index = 2;
        foreach($maquila as $key){
                #CUERPO EXCEL
                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$index, $key->tipo_comprobante)
                ->setCellValue('B'.$index, $key->codigo_comprobante)
                ->setCellValue('C'.$index, $key->numero_documento)
                ->setCellValue('D'.$index, $key->cuenta_contable)
                ->setCellValue('E'.$index, $key->dc)
                ->setCellValue('F'.$index, $key->valor_secuencia)
                ->setCellValue('G'.$index, $key->ano_documento) 
                ->setCellValue('H'.$index, $key->mes_documento)
                ->setCellValue('I'.$index, $key->dia_documento)
                ->setCellValue('J'.$index, $key->codigo_vendedor)
                ->setCellValue('K'.$index, $key->codigo_ciudad)
                ->setCellValue('L'.$index, $key->codigo_zona)
                ->setCellValue('M'.$index, $key->secuencia)
                ->setCellValue('N'.$index, $key->centro_costo) 
                ->setCellValue('O'.$index, $key->subcentro_costo)
                ->setCellValue('P'.$index, $key->nit)
                ->setCellValue('Q'.$index, $key->sucursal)
                ->setCellValue('R'.$index, $key->descripcion_secuencia)
                ->setCellValue('S'.$index, $key->comprobante_anulado)
                ->setCellValue('T'.$index, $key->codigo_motivo)
                ->setCellValue('U'.$index, $key->forma_pago) 
                ->setCellValue('W'.$index, $key->linea_produccion)
                ->setCellValue('X'.$index, $key->grupo_produccion)
                ->setCellValue('Y'.$index, $key->codigo_producto)
                ->setCellValue('Z'.$index, $key->cantidad)
                ->setCellValue('AA'.$index, $key->cantidad2)
                ->setCellValue('AB'.$index, $key->codigo_bodega)
                ->setCellValue('AC'.$index, $key->codigo_ubicacion) 
                ->setCellValue('AD'.$index, $key->cantidad_factor_conversion)
                ->setCellValue('AE'.$index, $key->operador_factor_conversion)
                ->setCellValue('AF'.$index, $key->valor_factor_conversion);  
                 $sw = true; 
        ;
        $index++;   }
        
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);   
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true); 
        $spreadsheet->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('T')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('U')->setAutoSize(true); 
        $spreadsheet->getActiveSheet()->getColumnDimension('W')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('X')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('Y')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('Z')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AA')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AB')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AC')->setAutoSize(true); 
        $spreadsheet->getActiveSheet()->getColumnDimension('AD')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AE')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('AF')->setAutoSize(true);   
      //  unset($styleArray);
        $spreadsheet->getActiveSheet()->setTitle('Interfaz siigo');
        //Hoja activa
        $spreadsheet->setActiveSheetIndex(0);
        $objWriter = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $d=mt_rand(1,16500);      
        $nom = 'MODELO PARA LA IMPORTACION DE MOVIMIENTO CONTABLE '.date("Y-m-d").$d.'.xlsx'; 
        $ruta = "./asset/upload/".$nom; 
        $objWriter->save($ruta);
        $array = [$sw,$ruta];
        return $array;   
 
    }
 }