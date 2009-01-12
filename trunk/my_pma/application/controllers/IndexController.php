<?php
class IndexController extends ApplicationController
{
    
    protected function init_controller()
    {
        $this->layoutVars->set('page_title', 'Index - Init');
    }
    
    public function IndexAction()
    {
        
    }
    
}
?>