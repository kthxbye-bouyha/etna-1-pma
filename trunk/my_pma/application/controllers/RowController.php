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
            $model->update($_POST[$this->tableSelected]['id'], $_POST[$this->tableSelected]);
            $this->redirect(array('controller' => 'table', 'action' => 'struct'));
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
        if (isset($_GET['id']))
        {
            $this->viewVars->set('model', $this->tableSelected);
            $this->viewVars->set('struct', $model->getFields());
        }
        elseif (isset($_POST[$this->tableSelected]['id']))
        {
            $model->save($_POST[$this->tableSelected]);
            $this->redirect(array('controller' => 'table', 'action' => 'struct'));
        }
        else
            $this->redirect(array('controller' => 'table', 'action' => 'struct'));
    }
    
    public function StructAction()
    {
    	
    }
    
}
?>