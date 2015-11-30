<?php
 // Filename: /module/Category/Module.php
 namespace Category;

 use Zend\ModuleManager\Feature\ConfigProviderInterface;
 use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
 

 class Module implements AutoloaderProviderInterface, ConfigProviderInterface
 {
      /**
      * Return an array for passing to Zend\Loader\AutoloaderFactory.
      *
      * @return array
      */
     public function getAutoloaderConfig()
     {
         return array(
             'Zend\Loader\StandardAutoloader' => array(
                 'namespaces' => array(
                     // Autoload all classes from namespace 'Category' from '/module/Category/src/Category'
                     __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                 )
             )
         );
     }

     /**
      * Returns configuration to merge with application configuration
      *
      * @return array|\Traversable
      */
     public function getConfig()
     {
         return include __DIR__ . '/config/module.config.php';
     }
 }