<?php
abstract class Controller
{
    /**
     * @desc string, name(Controller) without controller
     *
     * @var string
     */
    protected $controllerName;

    /**
     * @desc string, requested action
     *
     * @var string
     */
    protected $actionName;
    
	/**
     * @desc string, requested layout
     *
     * @var string
     */
    protected $layout;
    
    
    /**
     * @desc map of instance helpers
     *
     * @var array
     */
    protected $helpers = array();
    
    /**
     * @desc map of instance plugins
     *
     * @var array
     */
    protected $plugins = array();
    
    
    /**
     * @desc DataView registry shared between controller / view 
     *
     * @var DataView
     */
    protected $data;
    
    /**
     * @desc Registry for view vars (extracted when view is rendered)
     *
     * @var Registry
     */
    protected $viewVars;
    
    /**
     * @desc Registry for layout vars (extracted when view is rendered)
     *
     * @var Registry
     */
    protected $layoutVars;
    
    
    /**
     * @desc View
     *
     * @var View
     */
    protected $view;
    
    /**
     * @desc user session
     *
     * @var Session
     */
    protected $session;
    
    
    /**
     * @desc init
     *
     * @param string $parsed_controller
     * @param string $parsed_action
     * @return Controller
     */
    public function __construct($controller_name, $action_name)
    {
        $this->data = DataView::getInstance();
        $this->viewVars = new Registry();
        $this->layoutVars = new Registry();
        
        $this->controllerName = $controller_name;
        $this->actionName = $action_name;
        $this->layout = 'html';
    }
    
    public function process()
    {
        //preprocess action
        $this->init_app_controller();
        $this->init_controller();
        
        //process action
        $method_name = $this->actionName . 'Action';
        $this->{$method_name}();
        
        //send data to view
        $this->data->set('helpers', $this->helpers);
        $this->data->set('layout_vars', $this->layoutVars->getAll());
        $this->data->set('view_vars', $this->viewVars->getAll());
        
        //instanciate view and display
        $this->view = new View($this->controllerName, $this->actionName, $this->layout);
        $this->view->display();
    }
    
    protected function redirect($url = array())
    {
        header('Location: /' . Config::getInstance()->get('app.relative_root') . '/' . $url['controller'] . '/' . $url['action']);
    }
    
    abstract protected function init_app_controller();
    abstract protected function init_controller();
	
}
?>