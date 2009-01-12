<?php
class View
{
    /**
     * Enter description here...
     *
     * @var DataView
     */
    private $data;
    
    private $controllerName;
    
    private $actionName;
    
    private $layout;
    
    public function __construct($controller_name, $action_name, $layout)
    {
        $this->data = DataView::getInstance();
        
        $this->controllerName = $controller_name;
        $this->actionName = $action_name;
        $this->layout = $layout;
    }
    
    private function render_layout()
    {
        extract($this->data->get('layout_vars'), EXTR_SKIP);
        extract($this->data->get('helpers'), EXTR_SKIP);
        $config = Config::getInstance();
        
        include_once $config->get('app.absolute_root') . DIRECTORY_SEPARATOR .
                     "application" . DIRECTORY_SEPARATOR .
                     "views" . DIRECTORY_SEPARATOR .
                     "layout" . DIRECTORY_SEPARATOR .
                     $this->layout . ".phtml";
    }
    
    private function render_action()
    {
        extract($this->data->get('view_vars'), EXTR_SKIP);
        extract($this->data->get('helpers'), EXTR_SKIP);
        $config = Config::getInstance();
        
        ob_start();
        include_once $config->get('app.absolute_root') . DIRECTORY_SEPARATOR .
                     "application" . DIRECTORY_SEPARATOR .
                     "views" . DIRECTORY_SEPARATOR .
                     strtolower($this->controllerName) . DIRECTORY_SEPARATOR .
                     strtolower($this->actionName) . ".phtml";
       $this->data->set('layout_vars.action_content', ob_get_contents());
       ob_end_clean();
    }
    
    public function display()
    {
        $this->render_action();
        $this->render_layout();
    }
}

?>