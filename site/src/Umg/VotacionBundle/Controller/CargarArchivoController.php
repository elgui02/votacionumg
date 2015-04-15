<?php
namespace Umg\VotacionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Ddeboer\DataImport\Reader\ExcelReader;
use PHPExcel;
use PHPExcel_IOFactory;

class CargarArchivoController extends Controller
{
    public function indexAction()
    {
        return $this->render('UmgVotacionBundle:CargarArchivo:cargar.html.twig');
    }
    
    public function importarAction(Request $request)
    {
        if($request->getMethod() == 'POST')
        {
            $archivo =$request->files->get('archivo');
         /*   $file = new \SplFileObject($archivo);
            $reader2 = new ExcelReader($file, 11);
            
            print_r($reader2);
            exit;
            */
            echo '<hr/> <hr/> <hr/>';
            $inputFileName = $archivo;

//  Read your Excel workbook
        try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } 
        catch (Exception $e) 
            {
                die('Error al Cargar el Archivo "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
            }
//  Get worksheet dimensions
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
//  Loop through each row of the worksheet in turn
            
            for ($row = 1; $row <= $highestRow; $row++)
            {
//  Read a row of data into an array
                echo "<table border=5>";
                echo '<tr>';
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL, TRUE, FALSE);
                foreach($rowData[0] as $k=>$v)
                #echo "<td> fila".$row."- Col: ".($k+1)." = ".$v."<td/>";
                echo "<td>".$v."<td/>";
                $codigo= explode("-",$v);
                echo $codigo[0];
                echo '<tr/>';
                echo "<table/>";
                
            }
        }
        return $this->render('UmgVotacionBundle:CargarArchivo:cargar.html.twig',array);
    }
}
