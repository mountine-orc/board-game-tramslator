<?php
 // Filename: /module/Category/src/Blog/Mapper/PostMapperInterface.php
 namespace Category\Mapper;

 use Category\Model\PostInterface;

 interface PostMapperInterface
 {
     /**
      * @param int|string $id
      * @return PostInterface
      * @throws \InvalidArgumentException
      */
     public function find($id);

     /**
      * @return array|PostInterface[]
      */
     public function findAll();
 }