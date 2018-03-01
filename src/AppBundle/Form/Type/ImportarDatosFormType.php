<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotBlank;

class ImportarDatosFormType extends AbstractType {

    public $container;
    public $tipo = '';
    public $trans;

    public function __construct(Container $container, $tipo = '') {
        $this->container = $container;
        $this->tipo = $tipo;
        $this->trans = $container->get('translator');
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('file', 'file', array(
                'data_class' => null,
                'label' => 'label.file',
                'constraints' => [
                    new NotBlank(),
                    new Assert\File([
                        'mimeTypes' => array(
                            'application/vnd.ms-excel', 'application/msexcel', 'application/x-msexcel',
                            'application/x-ms-excel', 'application/x-excel', 'application/x-dos_ms_excel',
                            'application/xls', 'application/x-xls', 
                            'application/*',
                            'text/csv'
                        ),
                        'maxSize' => ini_get('upload_max_filesize'),
                        'mimeTypesMessage' => $this->trans->trans('error.form.file.excel')
                    ])
                ],
                'attr' => [
                    'accept' => '.xlsx, .xls'
                ]
            ))
            ->add('template', 'hidden', array(
                'attr' => [
                    'value' => $this->tipo
                ]
            ))
        ;
    }

    public function getName() {
        parent::getName();
        
        return 'importar_datos';
    }
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => null
        ));
    }
}