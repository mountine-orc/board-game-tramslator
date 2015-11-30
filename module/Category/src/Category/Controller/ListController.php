<?php
 // Filename: /module/Category/src/Category/Controller/ListController.php
 namespace Category\Controller;

 use Category\Service\PostServiceInterface;
 use Zend\Mvc\Controller\AbstractActionController;
 use Zend\View\Model\ViewModel;

 class ListController extends AbstractActionController
 {
     /**
      * @var \Category\Service\PostServiceInterface
      */
     protected $postService;

     public function __construct(PostServiceInterface $postService)
     {
         $this->postService = $postService;
     }

     public function indexAction()
     {
         return new ViewModel(array(
             'posts' => $this->postService->findAllPosts()
         ));
     }
 }