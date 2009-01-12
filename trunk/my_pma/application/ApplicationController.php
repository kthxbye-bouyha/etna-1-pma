<?php
abstract class ApplicationController extends Controller
{
    
    
    protected function init_app_controller()
    {
        $config = Config::getInstance();
        $this->helpers = array('html' => new HtmlHelper(),
    		  				   'form' => new FormHelper());
        $this->session = new Session();
        $this->layoutVars->set('page_title', 'Php my Admin');
        $this->layoutVars->set('relative_root', $config->get('app.relative_root'));
        $this->initConnexion();
    }
    
    private function initConnexion()
    {
        $config = Config::getInstance();
        
        $options['db_type'] = $config->get('db.driver');
        if(isset($_GET['db_selected']))
        {
            $options['db_name'] = $_GET['db_selected'];
            $this->session->set('db_selected', $options['db_name']);
        }
        else if($this->session->get('db_selected') != null)
            $options['db_name'] = $this->session->get('db_selected');
        if ($this->session->get('table_selected') !== null)
            $options['table_name'] = $this->session->get('table_selected');
        
        DB_Connexion::setConnexion($config->get('db.host'),
                                    $config->get('db.user'),
                                    $config->get('db.pwd'),
                                    $options);
                                    
        $this->layoutVars->set('db_selected', (isset($options['db_name']) ? $options['db_name'] : null));
        
        $db = new Database();
        $this->layoutVars->set('databases', $db->getDatabases());
    }
    
}
?>