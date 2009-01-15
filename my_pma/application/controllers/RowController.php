<?php
class RowController extends ApplicationController
{
    protected $model;
    
    public function init_controller()
    {
        $this->model = new ModelAdapter($this->tableSelected);
    }
    
    public function UpdateAction()
    {
        if (!empty($_GET))
        {
            $id = array();
            $prim = $this->model->getPrimaryKeys();
            foreach($prim as $value)
                $id[$value] = null;
            foreach($prim as $key => $value)
            {
                if (isset($_GET[$value]))
                    $id[$value] = $_GET[$value];
            }
            $item = array_shift($this->model->read($id));
            $this->viewVars->set($this->tableSelected, $item);
            $this->viewVars->set('model_name', $this->tableSelected);
            $this->viewVars->set('struct', $this->model->getFields());
            $this->viewVars->set('item', $item);
        }
        elseif (isset($_POST[$this->tableSelected]))
        {
            $id = array();
            $prim = $this->model->getPrimaryKeys();
            foreach($prim as $value)
                $id[$value] = null;
            foreach($id as $key => $value)
            {
                if (isset($_POST[$this->tableSelected][$key]))
                    $id[$key] = $_POST[$this->tableSelected][$key];
            }
            $res = $this->model->update($id, array($this->tableSelected => $_POST[$this->tableSelected]));
            $this->redirect(array('controller' => 'table', 'action' => 'list'));
        }
        else
            $this->redirect(array('controller' => 'table', 'action' => 'struct'));
    }
    
    public function DeleteAction()
    {
    	$this->model = new ModelAdapter($this->tableSelected);
    	if (!empty($_GET))
        {
            $id = array();
            $prim = $this->model->getPrimaryKeys();
            foreach($prim as $value)
                $id[$value] = null;
            foreach($prim as $key => $value)
            {
                if (isset($_GET[$value]))
                    $id[$value] = $_GET[$value];
            }
            $res = $this->model->delete($id);
            $this->redirect(array('controller' => 'table', 'action' => 'list'));
        }
        else
            $this->redirect(array('controller' => 'table', 'action' => 'list'));
    }
    
    public function CreateAction()
    {
    	$this->model = new ModelAdapter($this->tableSelected);
        if (empty($_POST))
        {
            $this->viewVars->set('model_name', $this->tableSelected);
            $this->viewVars->set('struct', $this->model->getFields());
        }
        else if (!empty($_POST))
        {
            $this->model->save(array($this->tableSelected => $_POST[$this->tableSelected]));
            $this->redirect(array('controller' => 'table', 'action' => 'list'));
        }
        else
            $this->redirect(array('controller' => 'table', 'action' => 'struct'));
    }
    
    public function StructAction()
    {
    	
    }
    
}
?>