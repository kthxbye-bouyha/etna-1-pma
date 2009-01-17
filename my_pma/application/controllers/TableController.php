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
    
    public function AlterfieldAction()
    {
    	if (isset($_GET['field_selected']))
    	{
    		$this->viewVars->set('field_selected', $_GET['field_selected']);
	    	$fields = $this->model->getFields();
	    	$edit = array();
	    	foreach ($fields as $key => $value)
	    	{
	    		if ($value['Field'] == $_GET['field_selected'])
	    		{
	    			$edit = $value;
	    			break;
	    		}
	    	}
	    	$this->model->alter();
    	}
    	else
            $this->redirect(array('controller' => 'db', 'action' => 'list'));
    		
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
    	$res = $this->model->dumpTable($this->tableSelected);
    }
    
    public function ImportAction()
    {
    	
    }
    
}
?>