<?php
class VisualizationController extends ApplicationController
{
    
    protected function init_controller()
    {
    }
    
    public function IndexAction()
    {
        $db = new Database();
        $this->viewVars->set('db_name', $db->getDbName());
        $this->viewVars->set('db_tables', $db->getTables());
        $this->viewVars->set('tables_pos', $db->GetTablePosition());
    }
    
    public function SaveAction()
    {
        var_dump($_POST);
    }
    
}
?>