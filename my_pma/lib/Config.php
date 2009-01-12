<?php
class Config extends Registry 
{
    private static $instance;
    
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Enter description here...
     *
     * @return Config
     */
    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new self();
        }
        
        return (self::$instance);
    }
    
    public function load_file() {}
    
    private function load_txt($filename) {}
    
    private function load_xml($filename) {}
    
    private function load_php($filename) {}
}
?>