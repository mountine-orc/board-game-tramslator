<?php
 // Filename: /module/category/src/category/Model/PostInterface.php
 namespace Category\Model;

 interface PostInterface
 {
     /**
      * Will return the ID of the category post
      *
      * @return int
      */
     public function getId();

     /**
      * Will return the TITLE of the category post
      *
      * @return string
      */
     public function getNameOriginal();

     /**
      * Will return the TEXT of the category post
      *
      * @return string
      */
     public function getNameTranslated();
 }