<?php
class DataView extends Registry 
{
    private static $instance;
    
    public function __construct()
    {
        parent::__construct();
        $this->data = array('action_vars' => array(),
                            'layout_vars' => array(),
                            'rendering' => array(),
                            'helpers' => array());
    }
    
    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new self();
        }
        return (self::$instance);
    }
    
}
?>