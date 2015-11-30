<?php

 namespace Game\Controller;

 use Zend\Mvc\Controller\AbstractActionController;
 use Zend\View\Model\ViewModel;
 use Game\Model\Game;          // <-- Add this import
 use Game\Form\GameForm;       // <-- Add this import

 class GameController extends AbstractActionController
 {
 	protected $gameTable;

	public function indexAction()
	{
		return new ViewModel(array(
			'games' => $this->getGameTable()->fetchAll(),
		));
	}

	public function addAction()
	{
	    $form = new GameForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $game = new Game();
            $form->setInputFilter($game->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $game->exchangeArray($form->getData());
                $this->getGameTable()->saveGame($game);

                // Redirect to list of games
                return $this->redirect()->toRoute('game');
            }
        }
        return array('form' => $form);
	}

	public function editAction()
	{
		 $id = (int) $this->params()->fromRoute('id', 0);
         if (!$id) {
             return $this->redirect()->toRoute('game', array(
                 'action' => 'add'
             ));
         }

         // Get the Game with the specified id.  An exception is thrown
         // if it cannot be found, in which case go to the index page.
         try {
             $game = $this->getGameTable()->getGame($id);
         }
         catch (\Exception $ex) {
             return $this->redirect()->toRoute('game', array(
                 'action' => 'index'
             ));
         }

         $form  = new GameForm();
         $form->bind($game);
         $form->get('submit')->setAttribute('value', 'Edit');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $form->setInputFilter($game->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $this->getGameTable()->saveGame($game);

                 // Redirect to list of games
                 return $this->redirect()->toRoute('game');
             }
         }

         return array(
             'id' => $id,
             'form' => $form,
         );
	}

	public function deleteAction()
	{
         $id = (int) $this->params()->fromRoute('id', 0);
         if (!$id) {
             return $this->redirect()->toRoute('game');
         }

         $request = $this->getRequest();
         if ($request->isPost()) {
             $del = $request->getPost('del', 'No');

             if ($del == 'Yes') {
                 $id = (int) $request->getPost('id');
                 $this->getGameTable()->deleteGame($id);
             }

             // Redirect to list of games
             return $this->redirect()->toRoute('game');
         }

         return array(
             'id'    => $id,
             'game' => $this->getGameTable()->getGame($id)
         );
	}

	public function getGameTable()
	{
		if (!$this->gameTable) {
			$sm = $this->getServiceLocator();
			$this->gameTable = $sm->get('Game\Model\GameTable');
		}
		return $this->gameTable;
	}
 }

 ?>