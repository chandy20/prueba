<?php

namespace AppBundle\Utility;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\Response;

class Export {

    protected $container;
    protected $trans;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
        $this->trans = $container->get('translator');
    }

    const FORMATEXCEL = 'excel';
    const FORMATPDF = 'pdf';
    const NAMEFILE = 'export';

    public function exportData($data = array(), $name = self::NAMEFILE, $format = self::FORMATEXCEL) {
        $name = $this->cleanString($name);
        
        $valid = $this->validExport($data, $format);

        if ($valid !== true) {
            return $valid;
        }

        if (strtolower($format) === self::FORMATEXCEL) {
            return $this->createExcel($data, $name);
        }

        if (strtolower($format) === self::FORMATPDF) {
            return $this->createPDF($data, $name);
        }
    }

    
    public function cleanString($name) {
        if(!$name){
            return self::NAMEFILE;
        }
        
        $name = str_replace(' ', '_', $name);
        $name = preg_replace('/[^A-Za-z0-9\-]/', '-', $name);
        $name = preg_replace('/-+/', '-', $name);
        
        return $name;
    }
    
    public function createExcel($data, $name) {
        $phpExcelObject = $this->container->get('phpexcel')->createPHPExcelObject();

        $phpExcelObject->getProperties()->setCreator($this->trans->trans('info.export.excel.name'))
                ->setLastModifiedBy($this->trans->trans('info.export.excel.name'))
                ->setTitle($name)
                ->setSubject($this->trans->trans('info.export.excel.subject') . ' ' . $name)
                ->setDescription($this->trans->trans('info.export.excel.description'))
                ->setKeywords($this->trans->trans('info.export.excel.keywords'))
                ->setCategory($this->trans->trans('info.export.excel.category'));

        $sheet = $phpExcelObject->setActiveSheetIndex(0);
        
        $column = 0;
        foreach ($data['headers'] as $header) {
            $row = 1;
            foreach ($data['body'] as $bodyKey => $body) {
                if($bodyKey === 0){
                    $sheet->setCellValueByColumnAndRow($column, $row, $header);
                }
                
                $sheet->setCellValueByColumnAndRow($column, $row + 1, $body[$header]);
                $row ++;
            }
            
            $column ++;
        }
        $phpExcelObject->getActiveSheet()->setTitle($this->trans->trans('info.export.excel.category'));
        $phpExcelObject->setActiveSheetIndex(0);

        $writer = $this->container->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
        $response = $this->container->get('phpexcel')->createStreamedResponse($writer);
        $dispositionHeader = $response->headers->makeDisposition(
                ResponseHeaderBag::DISPOSITION_ATTACHMENT, $name . '.xls'
        );
        $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');
        $response->headers->set('Content-Disposition', $dispositionHeader);

        return $response;
    }

    public function createPDF($data, $name) {
        
        $html = $this->container->get('templating')->render('ERPFinanzasContabilidadBundle:PDF:reporte.hmtl.twig', array(
            'data' => $data, 'name' => $name
        ));
        
        $response = new Response(
            $this->container->get('knp_snappy.pdf')->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="' . $name . '.pdf"'
            )
        );
        
        return $response;
    }

    public function validExport($data, $format) {
        
        if($format != self::FORMATPDF && $format !== self::FORMATEXCEL){
            return array('error' => $this->trans->trans('error.export.format.not.found'));
        }
        
        if (!key_exists('headers', $data)) {
            return array('error' => $this->trans->trans('error.export.headers.not.found'));
        }

        if (!key_exists('body', $data)) {
            return array('error' => $this->trans->trans('error.export.body.not.found'));
        }

        if (count($data['headers']) <= 0) {
            return array('error' => $this->trans->trans('error.export.headers.not.found'));
        }

        if (count($data['body']) <= 0) {
            return array('error' => $this->trans->trans('error.export.body.not.found'));
        }

        return true;
    }

}
