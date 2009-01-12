<?php
class Session extends Registry 
{
    public function __construct()
    {
        session_start();
        $this->data = $_SESSION;
    }
    
    public function __destruct()
    {
        $_SESSION = $this->data;
    }
    
    public function destroy()
    {
        session_destroy();
    }
    
}
?>