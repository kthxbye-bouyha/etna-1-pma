<?php
abstract class Helper
{
    protected $root;
    protected $controller;
    protected $action;
    
    public function __construct()
    {
        $config = Config::getInstance();
        $this->root = $config->get('app.relative_root');
        $this->controller = $config->get('rendering.controller');
        $this->action = $config->get('rendering.action');
    }
    
    protected function create_url($url)
    {
        $output = '';
        $output .= '/' . (!isset($url['root']) ? $this->root : $url['root']);
        $output .= '/' . (!isset($url['controller']) ? $this->controller : $url['controller']);
        $output .= '/' . (!isset($url['action']) ? $this->action : $url['action']);
        return ($output);
    }
    
    protected function bind_html_attribute($options = null)
    {
        $output = '';
        if ($options !== null)
        {
            foreach ($options as $key_option => $value_option)
                $output .= ' ' . $key_option . '="' . $value_option . '"';
        }
        return ($output);
    }
}
?>