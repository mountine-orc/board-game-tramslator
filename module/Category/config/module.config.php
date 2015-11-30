<?php
 // Filename: /module/Category/config/module.config.php
 return array(
     'service_manager' => array(
         'factories' => array(
             'Category\Mapper\PostMapperInterface'   => 'Category\Factory\ZendDbSqlMapperFactory',
             'Category\Service\PostServiceInterface' => 'Category\Factory\PostServiceFactory',
             'Zend\Db\Adapter\Adapter'               => 'Zend\Db\Adapter\AdapterServiceFactory'
         )
     ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',     
        ),
     ),
	'controllers' => array(
            'factories' => array(
                'Category\Controller\List' => 'Category\Factory\ListControllerFactory'
            )
     ),
     // This lines opens the configuration for the RouteManager
     'router' => array(
         // Open configuration for all possible routes
         'routes' => array(
             // Define a new route called "post"
             'post' => array(
                 // Define the routes type to be "Zend\Mvc\Router\Http\Literal", which is basically just a string
                 'type' => 'literal',
                 // Configure the route itself
                 'options' => array(
                     // Listen to "/category" as uri
                     'route'    => '/category',
                     // Define default controller and action to be called when this route is matched
                     'defaults' => array(
                         'controller' => 'Category\Controller\List',
                         'action'     => 'index',
                     )
                 )
             )
         )
     )
 );