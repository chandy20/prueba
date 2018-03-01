<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class AdquisicionAdmin extends AbstractAdmin {

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('id')
                ->add('descripcion')
                ->add('fechaEstimada')
                ->add('duracionEstimada')
                ->add('modalidad')
                ->add('fuenteRecursos')
                ->add('valorEstimado')
                ->add('valorEstimadoVigenciaActual')
                ->add('requiereVigenciasFuturas')
                ->add('estadoSolicitudVigenciasFuturas')
                ->add('datosContactoResponsable')
        ;
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->add('id')
                ->add('descripcion')
                ->add('fechaEstimada')
                ->add('duracionEstimada')
                ->add('modalidad')
                ->add('fuenteRecursos')
                ->add('valorEstimado')
                ->add('valorEstimadoVigenciaActual')
                ->add('requiereVigenciasFuturas')
                ->add('estadoSolicitudVigenciasFuturas')
                ->add('datosContactoResponsable')
                ->add('_action', null, [
                    'actions' => [
                        'show' => [],
                        'edit' => [],
                        'delete' => [],
                    ],
                ])
        ;
    }

    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('id')
                ->add('descripcion')
                ->add('fechaEstimada')
                ->add('duracionEstimada')
                ->add('modalidad')
                ->add('fuenteRecursos')
                ->add('valorEstimado')
                ->add('valorEstimadoVigenciaActual')
                ->add('requiereVigenciasFuturas')
                ->add('estadoSolicitudVigenciasFuturas')
                ->add('datosContactoResponsable')
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper) {
        $showMapper
                ->add('id')
                ->add('descripcion')
                ->add('fechaEstimada')
                ->add('duracionEstimada')
                ->add('modalidad')
                ->add('fuenteRecursos')
                ->add('valorEstimado')
                ->add('valorEstimadoVigenciaActual')
                ->add('requiereVigenciasFuturas')
                ->add('estadoSolicitudVigenciasFuturas')
                ->add('datosContactoResponsable')
        ;
    }

    protected function configureRoutes(\Sonata\AdminBundle\Route\RouteCollection $collection) {
        parent::configureRoutes($collection);

        $collection->remove("delete");
        $collection->add("importar", 'importar');
    }

}
