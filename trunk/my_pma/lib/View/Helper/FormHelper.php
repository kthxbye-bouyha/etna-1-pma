<?php
class FormHelper extends Helper 
{
    private $model_name;
    
    public function create($url, $options = array(), $model_name = null)
    {
        $this->model_name = $model_name;
        return('<form ' .
        		'action="' . $this->create_url($url) . '"' . 
                $this->bind_html_attribute($options) . 
               '>');
    }
    
    public function input($name, $options = array())
    {
        $prefix = $this->model_name != "" ? '' . $this->model_name . '[' : "";
        $sufix = $this->model_name != "" ? ']' : "";
        $output = '<input ' . 
        			'type="text" ' .
                    'name="' . $prefix . $name . $sufix . '" ' .
                    $this->bind_html_attribute($options);
        $output .= 'value="' . DataView::getInstance()->get('view_vars.' . $this->model_name . '.' . $name) . '"';
        return ($output . '/>');
    }
    
    public function hidden($name, $options = array())
    {
        $prefix = $this->model_name != "" ? '' . $this->model_name . '[' : "";
        $sufix = $this->model_name != "" ? ']' : "";
        $output = '<input ' .
                    'type="hidden"' .
                    'name="' . $prefix . $name . $sufix . '" ';
        $output .= 'value="' . DataView::getInstance()->get('view_vars.' . $this->model_name . '.' . $name) . '"';
        return ($output . '/>');
    }
    
    public function select()
    {
        
    }
    
    public function textarea()
    {
        
    }
    
    public function end($name = null)
    {
        return ('<p><input type="Submit" value="' . ($name != null ? $name : "Submit") . '"/></p></form>');
    }
    
    
}
?>