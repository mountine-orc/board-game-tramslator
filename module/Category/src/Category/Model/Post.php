<?php
 // Filename: /module/Category/src/Category/Model/Post.php
 namespace Category\Model;

 class Post implements PostInterface
 {
     /**
      * @var int
      */
     protected $id;

     /**
      * @var string
      */
     protected $nameOriginal;

     /**
      * @var string
      */
     protected $nameTranslated;

     /**
      * {@inheritDoc}
      */
     public function getId()
     {
         return $this->id;
     }

     /**
      * @param int $id
      */
     public function setId($id)
     {
         $this->id = $id;
     }

     /**
      * {@inheritDoc}
      */
     public function getNameOriginal()
     {
         return $this->nameOriginal;
     }

     /**
      * @param string $nameOriginal
      */
     public function setNameOriginal($nameOriginal)
     {
         $this->nameOriginal = $nameOriginal;
     }

     /**
      * {@inheritDoc}
      */
     public function getNameTranslated()
     {
         return $this->nameTranslated;
     }

     /**
      * @param string $text
      */
     public function setNameTranslated($nameTranslated)
     {
         $this->nameTranslated = $nameTranslated;
     }
 }