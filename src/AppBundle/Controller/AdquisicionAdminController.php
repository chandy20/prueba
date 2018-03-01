<?php

namespace AppBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\ImportarDatosFormType;
use AppBundle\ValidData\ValidarDatos;

class AdquisicionAdminController extends CRUDController {

    protected $validar = null;

    public function importarAction(Request $request) {
//        if (!$this->security->validSecurity(['CREATE'])) {
//            throw new AccessDeniedException();
//        }
        $this->validar = new ValidarDatos($this->container);

        $file = $this->container->getParameter('ruta_descargar_archivo') . '/' . 'adquisicion.template.xlsx';
        $form = $this->createForm(ImportarDatosFormType::class, null);
        $form->handleRequest($request);
        $titulo = 'label.adquisicion.importar';

        if ($form->isSubmitted()) {
            $isFormValid = $form->isValid();

            if ($isFormValid) {
                $datos = $this->validar->getDatos($form->get('file')->getData());
                if (key_exists("error", $datos)) {
                    $request->getSession()->getFlashBag()->add('sonata_flash_error', $datos["error"]);
                    return $this->render('AppBundle:Importar:importar.datos.html.twig', array(
                                'form' => $form->createView(),
                                'titulo' => $titulo
                    ));
                }

                $validar = $this->validar->validar($datos, $this->validaciones->getValidacionEPS());

                if (is_array($validar)) {
                    return $this->render('AppBundle:Importar:importar.datos.html.twig', array(
                                'form' => $form->createView(),
                                'errores' => $validar,
                                'titulo' => $titulo
                    ));
                }

                try {
                    $this->guardarDatos($datos);
                } catch (\Exception $e) {
                    $request->getSession()->getFlashBag()->add('sonata_flash_error', $this->admin->trans('error.import.flush'));
                }
            }
        }

        return $this->render('AppBundle:Importar:importar.datos.html.twig', array(
                    'form' => $form->createView(),
                    'titulo' => $titulo
        ));
    }

    public function getOptions() {
        $profiles = Tercero::$PROFILES;

        $opcions = [
            [
                'label' => 'Terceros', 'icon' => '',
                'links' => [
                    'list' => [
                        'label' => 'btn.title.list', 'icon' => 'fa fa-search',
                        'route' => $this->generateUrl('admin_app_adquisicion_list'),
                        'roles' => ['LIST'],
                        'class' => 'col-xs-4'
                    ],
                    'create' => [
                        'label' => 'btn.title.register', 'icon' => 'fa fa-plus',
                        'route' => $this->generateUrl('admin_app_adquisicion_create'),
                        'roles' => ['CREATE'],
                        'class' => 'col-xs-4'
                    ],
                    'import' => [
                        'label' => 'btn.title.import.title', 'icon' => 'fa fa-spiner',
                        'route' => $this->generateUrl('admin_app_adquisicion_importar'),
                        'roles' => ['CREATE'],
                        'class' => 'col-xs-4',
                    ]
                ]
            ]
        ];

        return $opcions;
    }

}
