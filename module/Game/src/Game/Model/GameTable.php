<?php

namespace Game\Model;

 use Zend\Db\TableGateway\TableGateway;

 class GameTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getGame($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
 
         return $row;
     }

     public function saveGame(Game $game)
     {
         $data = array(
             'name_original'    => $game->name_original,
             'name_translated'  => $game->name_translated,
         );

         $id = (int) $game->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getGame($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Game id does not exist');
             }
         }
     }

     public function deleteGame($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
 }

 ?>