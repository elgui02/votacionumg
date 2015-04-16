<?php
namespace Umg\VotacionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Ddeboer\DataImport\Reader\ExcelReader;
use Symfony\Component\HttpFoundation\Response;
use PHPExcel;
use PHPExcel_IOFactory;


/**
 * CargarArchivo controller.
 *
 * @Route("/cargararchivo")
 */
class CargarArchivoController extends Controller
{
    public function indexAction()
    {
        return $this->render('UmgVotacionBundle:CargarArchivo:index.html.twig');
    }

    public function showAction(Request $request)
    {
      if($request->getMethod() == 'POST')
      {
          $archivo =$request->files->get('archivo');
          #$this->showAction($archivo);
      }
      $inputFileName=$archivo;
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
                  $file= array();
                  for ($row = 1; $row <= $highestRow; $row++)
                  {
      //  Read a row of data into an array
                 /*     echo "<table border=5><tr>";"*/
                      $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL, TRUE, FALSE);

                      foreach($rowData[0] as $k=>$v)
                    //echo "<td> fila".$row."- Col: ".($k+1)." = ".$v."<td/>";
                     // echo "<td>".$v."<td/>";
                      $matriz[$row][$k]=$v;
                      //echo ""<tr/> <table/>";
                      $data =$rowData[0];
                        $file[]= $data;
                  }


                      // $data = serialize($objPHPExcel);
                      //print_r($objPHPExcel);
                      //$tabla = unserialize($data);
                      return $this->render('UmgVotacionBundle:CargarArchivo:show.html.twig',array('tabla' => $file, ));
    }
}
