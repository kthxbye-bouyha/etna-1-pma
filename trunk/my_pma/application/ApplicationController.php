<?php
abstract class ApplicationController extends Controller
{
    protected $dbSelected;
    protected $tableSelected;
    protected $model;
    
    protected function init_app_controller()
    {
        $config = Config::getInstance();
        $this->helpers = array('html' => new HtmlHelper(),
    		  				   'form' => new FormHelper());
        $this->session = new Session();
        $this->layoutVars->set('page_title', 'Php my Admin');
        $this->layoutVars->set('relative_root', $config->get('app.relative_root'));
        $this->initParams();
        $this->initConnexion();
    }
    
    private function initParams()
    {
    	$this->setDbSelected();
    	$this->setTableSelected();
    	
        $this->layoutVars->set('db_selected', $this->dbSelected);
        $this->viewVars->set('db_selected', $this->dbSelected);
        $this->layoutVars->set('table_selected', $this->tableSelected);
        $this->viewVars->set('table_selected', $this->tableSelected);
    }
    
    private function setDbSelected()
    {
    	if(isset($_GET['db_selected']))
    	{
    		$this->dbSelected = $_GET['db_selected'];
    		$this->session->set('db_selected', $_GET['db_selected']);
    	}
        else if($this->session->get('db_selected') != null)
            $this->dbSelected = $this->session->get('db_selected');
        else
        	$this->dbSelected = "";
    }
    
    private function setTableSelected()
    {
    	if(isset($_GET['table_selected']))
    	{
    		$this->tableSelected = $_GET['table_selected'];
    		$this->session->set('table_selected', $_GET['table_selected']);
    	}
        else if($this->session->get('table_selected') != null)
            $this->tableSelected = $this->session->get('table_selected');
        else
        	$this->tableSelected = "";
    }
    
    private function initConnexion()
    {
        $config = Config::getInstance();

        $options['db_type'] = $config->get('db.driver');
        if ($this->dbSelected != "")
            $options['db_name'] = $this->dbSelected;
        else
            ;//TODO gerer une exception
        if ($this->tableSelected != "")
            $options['table_selected'] = $this->tableSelected;
        else
            ;//TODO gerer une exception
        DB_Connexion::setConnexion($config->get('db.host'),
                                    $config->get('db.user'),
                                    $config->get('db.pwd'),
                                    $options);
        $db = new Database();
        $this->layoutVars->set('databases', $db->getDatabases());
        $this->layoutVars->set('tables', $db->getTables());
    }
    
}
?>