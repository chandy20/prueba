<?php

namespace AppBundle\Utility;

use Symfony\Component\DependencyInjection\ContainerInterface;

class Security {

    protected $container;
    protected $trans;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
        $this->trans = $container->get('translator');
    }
    
    public function validSecurity($permissions = []){
        $securityContext = $this->container->get('security.token_storage');
        
        if(!$securityContext->getToken()){
            return false;
        }
        
        if($securityContext->getToken()->getUser()){
            $user = $securityContext->getToken()->getUser();
            if(!$user){
                return false;
            }
            
            foreach ($permissions as $key => $permission) {
                if($user->hasRole($permission)){
                    return true;
                }
            }
        }
        
        return false;
    }
}
