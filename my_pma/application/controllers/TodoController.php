<?php
class TodoController  extends ApplicationController
{
    protected function init_controller()
    {
        $this->layoutVars->set('page_title', "Todo - init");
    }
    
    public function IndexAction()
    {
        $this->layoutVars->set('page_title', "Todo - Index");
        
        $todo = new Todo();
        $this->viewVars->set('todo_list', $todo->readAll());
        if ($this->session->get('confirmation') != null)
        {
            $this->viewVars->set('confirmation', $this->session->get('confirmation'));
            $this->session->set('confirmation', null);
        }
    }
    
    public function CreateAction()
    {
        $this->layoutVars->set('page_title', "Todo - Create");
        if (!empty($_POST['todo']))
        {
            $todo = new Todo();
            $res = $todo->save(array('todo' => $_POST['todo']));
            $this->session->set('confirmation', array('state' => true,
                                                      'message' => 'Todo[id=' . $res["lastInsertId"] . '] was created'));
            $this->redirect(array('controller' => 'todo', 'action' => 'index'));
        }
    }
    
    public function ReadAction()
    {
        $this->layoutVars->set('page_title', "Todo - Read");
        if (isset($_GET['id']))
        {
            $todo = new Todo();
            $todo_item = array_shift($todo->read($_GET['id']));
            if (empty($todo_item))
            {
                $this->session->set('confirmation', array('state'=> false, 'message' => 'Todo[id] = ' . $_GET['id'] . ' was not found, can\'t read it'));
                $this->redirect(array('controller' => 'todo', 'action' => 'index'));
            }
            $this->viewVars->set('todo_item', $todo_item);
        }
        else
        {
            $this->session->set('confirmation', array('state'=> false, 'message' => 'Todo[id] was not found, can\'t read it'));
            $this->redirect(array('controller' => 'todo', 'action' => 'index'));
        }
    }
    
    public function UpdateAction()
    {
        $this->layoutVars->set('page_title', "Todo - Update");
        $todo = new Todo();
        $todo_item = $todo->read($_GET['id']);
        if (isset($_GET['id']))
            $this->viewVars->set('todo', array_shift($todo_item));
        else if (isset($_POST['todo']['id']))
        {
            $todo->update($_POST['todo']['id'], array('todo' => $_POST['todo']));
            $this->redirect(array('controller' => 'Todo', 'action' => 'Index'));
            $this->session->set('confirmation', array('state' => true, 'message' => "Todo item was updatated"));
        }
        else
        {
            $this->session->set('confirmation', array('state' => false, 'message' => "Todo id was not found"));
            $this->redirect(array('controller' => 'Todo', 'action' => 'Index'));
        }
    }
    
    public function DeleteAction()
    {
        $todo = new Todo();
        if (isset($_GET['id']))
        {
            $todo->delete($_GET['id']);
            $this->session->set('confirmation', array('state' => true, 'message' => "Todo item was deleted"));
        }
        else
            $this->session->set('confirmation', array('state' => false, 'message' => "Todo item was not found"));
        $this->redirect(array('controller' => 'Todo', 'action' => 'Index'));
    }
    
}
?>