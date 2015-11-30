<?php
 // Filename: /module/Category/src/Category/Service/PostService.php
 namespace Category\Service;

 use Category\Mapper\PostMapperInterface;

 class PostService implements PostServiceInterface
 {
     /**
      * @var \Category\Mapper\PostMapperInterface
      */
     protected $postMapper;

     /**
      * @param PostMapperInterface $postMapper
      */
     public function __construct(PostMapperInterface $postMapper)
     {
         $this->postMapper = $postMapper;
     }

     /**
      * {@inheritDoc}
      */
     public function findAllPosts()
     {
         return $this->postMapper->findAll();
     }

     /**
      * {@inheritDoc}
      */
     public function findPost($id)
     {
         return $this->postMapper->find($id);
     }
 }