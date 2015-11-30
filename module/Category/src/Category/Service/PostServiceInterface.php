<?php
 // Filename: /module/Category/src/Category/Service/PostServiceInterface.php
 namespace Category\Service;

 use Category\Model\PostInterface;

 interface PostServiceInterface
 {
     /**
      * Should return a set of all blog posts that we can iterate over. Single entries of the array are supposed to be
      * implementing \Category\Model\PostInterface
      *
      * @return array|PostInterface[]
      */
     public function findAllPosts();

     /**
      * Should return a single blog post
      *
      * @param  int $id Identifier of the Post that should be returned
      * @return PostInterface
      */
     public function findPost($id);
 }