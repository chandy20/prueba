<?php

namespace AppBundle\Utility;

use Symfony\Component\DependencyInjection\ContainerInterface;

class FechaValida {
    
    protected $container;
    protected $em;
    protected $object;
    
    public function __construct(ContainerInterface $container, $object) {
        $this->container = $container;
        $this->em = $container->get("doctrine")->getManager();
        $this->object = $object;
    }
    
    public function findCierre() {
        $cierre = $this->em->getRepository("ERPFinanzasContabilidadBundle:Cierre")->findOneBy([
            'activo' => true
        ]);
        
        return $cierre;
    }
    
    public function validFechaCierre($metodo) {
        $cierre = $this->findCierre();
        if(!$cierre){
            return false;
        }
        
        if($this->object->$metodo() < $cierre->getFechaInicio() || $this->object->$metodo() > $cierre->getFechaFin()){
            return false;
        }
        
        return true;
    }
    
    public function validFechaCierreValor($valor) {
        $cierre = $this->findCierre();
        if(!$cierre){
            return false;
        }
        
        if($valor < $cierre->getFechaInicio() || $valor > $cierre->getFechaFin()){
            return false;
        }
        
        return true;
    }
}