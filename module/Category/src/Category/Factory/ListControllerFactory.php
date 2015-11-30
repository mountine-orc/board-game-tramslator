<?php
 // Filename: /module/Category/src/Category/Factory/ListControllerFactory.php
 namespace Category\Factory;

 use Category\Controller\ListController;
 use Zend\ServiceManager\FactoryInterface;
 use Zend\ServiceManager\ServiceLocatorInterface;

 class ListControllerFactory implements FactoryInterface
 {
     /**
      * Create service
      *
      * @param ServiceLocatorInterface $serviceLocator
      *
      * @return mixed
      */
     public function createService(ServiceLocatorInterface $serviceLocator)
     {
         $realServiceLocator = $serviceLocator->getServiceLocator();
         $postService        = $realServiceLocator->get('Category\Service\PostServiceInterface');

         return new ListController($postService);
     }
 }