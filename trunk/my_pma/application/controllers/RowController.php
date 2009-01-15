<?php
class RowController extends ApplicationController
{
    
    protected function init_controller()
    {
        
    }
    
    public function UpdateAction()
    {
    	$model = new ModelAdapter($this->tableSelected);
        if (isset($_GET['id']))
        {
            $item = array_shift($model->read($_GET['id']));
            $this->viewVars->set($this->tableSelected, $item);
            $this->viewVars->set('model_name', $this->tableSelected);
            $this->viewVars->set('struct', $model->getFields());
            $this->viewVars->set('item', $item);
        }
        elseif (isset($_POST[$this->tableSelected]['id']))
        {
            $res = $model->update($_POST[$this->tableSelected]['id'], array($this->tableSelected => $_POST[$this->tableSelected]));
            $this->redirect(array('controller' => 'table', 'action' => 'list'));
        }
        else
            $this->redirect(array('controller' => 'table', 'action' => 'struct'));
    }
    
    public function DeleteAction()
    {
    	
    }
    
    public function CreateAction()
    {
    	$model = new ModelAdapter($this->tableSelected);
        if (empty($_POST))
        {
            $this->viewVars->set('model_name', $this->tableSelected);
            $this->viewVars->set('struct', $model->getFields());
        }
        else if (!empty($_POST))
        {
            /*
            $res = $model->create(array($this->tableSelected => $_POST[$this->tableSelected]));
            $this->redirect(array('controller' => 'table', 'action' => 'list'));
            */
            die("create");
        }
        else
            $this->redirect(array('controller' => 'table', 'action' => 'struct'));
    }
    
    public function StructAction()
    {
    	
    }
    
}
?>