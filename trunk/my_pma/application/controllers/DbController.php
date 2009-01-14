<?php
class DbController extends ApplicationController
{
    
    protected function init_controller()
    {
        $db = new Database();
        $this->viewVars->set('db_name', $db->getDbName());
        $this->viewVars->set('db_tables', $db->getTables());
    }
    public function IndexAction()
    {
        
    }
    
    public function ListAction()
    {
        
    }
    
    public function ExportAction()
    {
    
    }
    
    public function ImportAction()
    {
    
    }
    
    public function VisualizationAction()
    {
        $db = new Database();
        $this->viewVars->set('tables_pos', $db->GetTablePosition());
    }
    
    
    
}
?>