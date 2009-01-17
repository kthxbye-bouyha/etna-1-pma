<?php
class FrontController
{
    /**
     * @desc singleton of front controller
     *
     * @var FrontController
     */
    private static $instance;
    
    /**
     * @desc parsed controller matched in $_SERVER["REQUEST_URI"]
     *
     * @var string
     */
    private $controllerName;
    
    /**
     * @desc parsed action matched in $_SERVER["REQUEST_URI"]
     *
     * @var string
     */
    private $actionName;
    
    private $layoutRequested = 'html';
    
    public function __construct()
    {
    }
    
    /**
     * @desc singleton method
     *
     * @return FrontController
     */
    public static function getInstance()
    {
        if (self::$instance === null)
        {
            self::$instance = new FrontController();
        }
        return (self::$instance);
    }
    
    
    /**
     * @desc search in Config registry app.fc.default_controller.value and return it
     * 
     * @return string (default controllerName)
     * @throw LoggerExpception
     */
    public function getDefaultController()
    {
        $config = Config::getInstance();
        $default_c = $config->get("app.fc.default_controller.value");
        if ($default_c != "")
            return ($default_c);
        else
            throw new LoggerException("Default controller should be defined.\n\tConfig->set('app.fc.default_controller.value', \$value)\n");
    }
    
    /**
     * @desc search in Config registry app.fc.error_controller.value and return it
     * 
     * @return string (error controllerName)
     * @throw LoggerExpception
     */
    public function getErrorController()
    {
        $config = Config::getInstance();
        $error_c = $config->get("app.fc.error_controller.value");
        if ($error_c != "")
            return ($error_c);
        else
            throw new LoggerException("Error controller should be defined.\n\t Config->set('app.fc.error.value', \$value)\n");
    }
    
    /**
     * @desc search in Config registry (app.fc.(this->parsed_controller).value | app.fc.default_action) and return it
     * 
     * @return string (default actionName)
     * @throw LoggerExpception
     */
    public function getDefaultAction()
    {
        $config = Config::getInstance();
        if ($this->controllerName != "")
        {
            $default_a = $config->get('app.fc.' . $this->controllerName . '.default_action');
            if ($default_a != "")
                return ($default_a);
            else
            {
                $default_a = $config->get('app.fc.default_action');
                if ($default_a != "")
                    return ($default_a);
                else
                    throw new LoggerException("Default action should be defined.\n\t Config->set('app.fc.default_action', \$value)\n");                    
            }
        }
    }
    
    /**
     * @desc set controllerName parsed in request, or init with default controller
     *
     * @param string $parsed_controller
     * @return void
     */
    private function setControllerName($parsed_controller = "")
    {
        if ($parsed_controller != "")
            $this->controllerName = ucfirst(strtolower($parsed_controller));
        else
            $this->controllerName = $this->getDefaultController();
        
        $config = Config::getInstance();
        $filename = $config->get('app.absolute_root') . DIRECTORY_SEPARATOR .
                    'application' . DIRECTORY_SEPARATOR . 
                    'controllers' . DIRECTORY_SEPARATOR . 
                    $this->controllerName . 'Controller.php'; 

        if (!file_exists($filename))
            $this->controllerName = $this->getErrorController();
    }

    /**
     * @desc set actionName parsed in request, or init with default action
     *
     * @param string $parsed_action
     * @return void
     */
    private function setActionName($parsed_action = "")
    {
        $match = array();
        if (preg_match("#__([[:alpha:]]+)_(.*)#", $parsed_action, $match))
        {
            $this->layoutRequested = $match[1];
            $parsed_action = $match[2];
        }
        $methods_controller = get_class_methods($this->controllerName . 'Controller');
        $method_name = ucfirst(strtolower($parsed_action));
        
        $default_action = $this->getDefaultAction();
        if (in_array($method_name . 'Action', $methods_controller))
            $this->actionName = $method_name;
        else if (in_array($default_action . 'Action', $methods_controller))
            $this->actionName = $default_action;
        else
            $this->actionName = 'Index';
    }
    
    /**
     * @desc create and process controller requested
     * 
     * @return void
     */
    public function render()
    {
        $config = Config::getInstance();
        $config->set('rendering.controller', $this->controllerName);
        $config->set('rendering.action', $this->actionName);
        
        $controller_class_name = $this->controllerName . 'Controller';
        $controller = new $controller_class_name($this->controllerName, $this->actionName, $this->layoutRequested);
        $controller->process();
    }
    
    /**
     * @desc parse request, and set controllerName and actionName
     *
     * @return void
     */
    public function dispatch()
    {
        $tmp = array();
        $pattern = "#[[:alnum:]_-]+#";
        
        preg_match_all($pattern, $_SERVER["REQUEST_URI"], $tmp);
        
        $this->setControllerName(isset($tmp[0][1]) ? $tmp[0][1] : "");
        $this->setActionName(isset($tmp[0][2]) ? $tmp[0][2] : "");
    }
}
?>