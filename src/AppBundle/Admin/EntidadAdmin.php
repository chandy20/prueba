<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class EntidadAdmin extends AbstractAdmin
{
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('nombre')
            ->add('direccion')
            ->add('telefono')
            ->add('paginaWeb')
            ->add('totalPresupuesto')
            ->add('limiteMenorCuantia')
            ->add('limiteMinimaCuantia')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('nombre')
            ->add('direccion')
            ->add('telefono')
            ->add('paginaWeb')
            ->add('totalPresupuesto')
            ->add('limiteMenorCuantia')
            ->add('limiteMinimaCuantia')
            ->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ])
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('id')
            ->add('nombre')
            ->add('direccion')
            ->add('telefono')
            ->add('paginaWeb')
            ->add('totalPresupuesto')
            ->add('limiteMenorCuantia')
            ->add('limiteMinimaCuantia')
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('nombre')
            ->add('direccion')
            ->add('telefono')
            ->add('paginaWeb')
            ->add('totalPresupuesto')
            ->add('limiteMenorCuantia')
            ->add('limiteMinimaCuantia')
        ;
    }
}
