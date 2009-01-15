<?php
class DbController extends ApplicationController
{
    
    protected function init_controller()
    {
        $this->model = new Database();
        $this->viewVars->set('db_name', $this->model->getDbName());
        $this->viewVars->set('db_tables', $this->model->getTables());
    }
    public function IndexAction()
    {
        
    }
    
    public function ListAction()
    {
        
    }
    
    public function ExportAction()
    {
        $this->model->dumpDatabase();
    }
    
    public function ImportAction()
    {
    
    }
    
    public function VisualizationAction()
    {
        $this->viewVars->set('tables_pos', $this->model->GetTablePosition());
    }
    
    
    
}
?>