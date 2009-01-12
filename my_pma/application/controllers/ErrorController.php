<?php
class ErrorController extends ApplicationController
{
    
    protected function init_controller()
    {
        
    }
    
    public function IndexAction()
    {
        $this->logError();
    }
    
    public function View_logAction()
    {
        $this->layoutVars->set('page_title', 'Visualisation des logs d\'erreur');
        $filename = Config::getInstance()->get('app.absolute_root') . DIRECTORY_SEPARATOR .
                    'application' . DIRECTORY_SEPARATOR .
                    'log' . DIRECTORY_SEPARATOR .
                    'log_error.txt';
        $this->viewVars->set('log_list', file($filename));
    }
    
    public function Clean_logAction()
    {
        $this->layoutVars->set('page_title', 'Remise à zero des logs');
        $filename = Config::getInstance()->get('app.absolute_root') . DIRECTORY_SEPARATOR .
                    'application' . DIRECTORY_SEPARATOR .
                    'log' . DIRECTORY_SEPARATOR .
                    'log_error.txt';
        $hd = fopen($filename, 'w+');
        fclose($hd);
    }
    
    private function logError()
    {
        $filename = Config::getInstance()->get('app.absolute_root') . DIRECTORY_SEPARATOR .
                    'application' . DIRECTORY_SEPARATOR .
                    'log' . DIRECTORY_SEPARATOR .
                    'log_error.txt';
        $hd = fopen($filename, 'a');
        $message = "[date: " . date("D-m-Y G:i", $_SERVER['REQUEST_TIME']) . "]" . 
        			"[request: [" . $_SERVER['REQUEST_METHOD'] . '] ' . $_SERVER['REQUEST_URI'] . "]\n" .
                    "[get: " . print_r($_GET, true) . "]\n" .
                    "[post: " . print_r($_POST, true) . "]\n\n";
        fwrite($hd, $message);
        fclose($hd);
    }
    
}
?>