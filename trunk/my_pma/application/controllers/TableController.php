<?php
class TableController extends ApplicationController
{
    
    protected function init_controller()
    {
        $this->model = new ModelAdapter($this->tableSelected);
    }
    
    public function UpdateAction()
    {
        
    }
    public function DropAction()
    {
        if (!empty($_GET))
        {
            $this->model->drop();
            $this->redirect(array('controller' => 'db', 'action' => 'list'));
        }
        else
            $this->redirect(array('controller' => 'db', 'action' => 'list'));
    }
    public function CreateAction()
    {
        
    }
    public function StructAction()
    {
    	$this->viewVars->set('struct_table', $this->model->getFields());
    	$this->viewVars->set('table_name', $this->tableSelected);
    	$this->layoutVars->set('page_title', 'pma/table/struct');
    }
    
    public function ListAction()
    {
        if (empty($_POST))
        {
        	$this->viewVars->set('struct_table', $this->model->getFields());
        	$this->viewVars->set('content_table', $this->model->readAll());
        }
        else
        {
            
        }
    }
    
    public function TruncateAction()
    {
        if (!empty($_GET))
        {
            $this->model->truncate();
            $this->redirect(array('controller' => 'db', 'action' => 'list'));
        }
        else
            $this->redirect(array('controller' => 'db', 'action' => 'list'));
            
    }
    
	public function ExportAction()
    {
    	$this->model->dumpTable();
    }
    
    public function ImportAction()
    {
    	
    }
    
}
?>