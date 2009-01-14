<?php
class TableController extends ApplicationController
{
    
    protected function init_controller()
    {
        
    }
    
    public function UpdateAction()
    {
            	
    }
    public function DeleteAction()
    {
    	
    }
    public function CreateAction()
    {
    }
    public function StructAction()
    {
        $model = new ModelAdapter($this->tableSelected);
    	$this->viewVars->set('struct_table', $model->getFields());
    	$this->viewVars->set('table_name', $this->tableSelected);
    	$this->layoutVars->set('page_title', 'pma/table/struct');
    }
    
    public function ListAction()
    {
        $model = new ModelAdapter($this->tableSelected);
        if (empty($_POST))
        {
        	$this->viewVars->set('struct_table', $model->getFields());
        	$this->viewVars->set('content_table', $model->readAll());
        }
        else
        {
            
        }
    }
    
    public function TruncAction()
    {
    	
    }
    
	public function ExportAction()
    {
    	
    }
    
    public function ImportAction()
    {
    	
    }
    
}
?>