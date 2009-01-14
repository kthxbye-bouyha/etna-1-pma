<?php
class FormHelper extends Helper 
{
    private $model_name;
    
    public function create($url, $model_name = null, $options = array())
    {
        $this->model_name = $model_name;
        if (isset($options['validator']))
            $this->activeValidator = $options['validator'];
        else
            $this->activeValidator = false;
        return('<form ' .
        		'action="' . $this->create_url($url) . '"' . 
                $this->bind_html_attribute($options) . 
               '>');
    }
    
    public function input($name, $options = array())
    {
        $options['id'] = $this->model_name . '-' . $name;
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
        $options['id'] = $this->model_name . '-' . $name;
        $prefix = $this->model_name != "" ? '' . $this->model_name . '[' : "";
        $sufix = $this->model_name != "" ? ']' : "";
        $output = '<input ' .
                    'type="hidden"' .
                    'name="' . $prefix . $name . $sufix . '" ' .
                    $this->bind_html_attribute($options);
        $output .= 'value="' . DataView::getInstance()->get('view_vars.' . $this->model_name . '.' . $name) . '"';
        return ($output . '/>');
    }
    
    public function select($name, $options = array())
    {
        $options['id'] = $this->model_name . '-' . $name;
        
    }
    
    public function textarea($name, $options = array())
    {
        $options['id'] = $this->model_name . '-' . $name;
        $prefix = $this->model_name != "" ? '' . $this->model_name . '[' : "";
        $sufix = $this->model_name != "" ? ']' : "";
        $output = '<textarea ' .
                    'name="' . $prefix . $name . $sufix . '" ' .
                    $this->bind_html_attribute($options) . 
                  '>' .
                    DataView::getInstance()->get('view_vars.' . $this->model_name . '.' . $name) .
                  '</textarea>';
       return ($output);
    }
    
    public function end($name = null, $options = array())
    {
        return ('<p><input type="Submit" value="' . ($name != null ? $name : "Submit") . '"/></p></form>');
    }
    
    public function enum()
    {
        
    }
    public function label($name, $options = array())
    {
        return ('<label for="' . $this->model_name . '-' . $name . '">' . $name . ': </label>');
    }
    
    public function createBasicForm($struct, $model_name, $url, $item = null)
    {
        $this->model_name = $model_name;
        $out = "";
        $out .= $this->create($url, $model_name, array('validator' => true, 'method' => 'POST')) .
                '<fieldset>' .
                	'<legend>' . 
                        'Formulaire ' . ucfirst(strtolower(str_replace('_', ' ', $model_name))) . 
                     '</legend>';
        foreach ($struct as $field)
        {
            if (preg_match('#PRI#', $field["Key"]))
                $out .= $this->hidden($field["Field"]);
            else
            {
                $out .= ($this->activeValidator != false ? '<p class="validateItem validate-' . $field["Type"] . '">' : '<p>') .
                        $this->label($field["Field"]);
                if (preg_match('#int#', $field["Type"]))
                    $out .= $this->input($field["Field"]);
                else if (preg_match('#string#', $field["Type"]))
                    $out .= $this->input($field["Field"]);
                else if (preg_match('#varchar#', $field["Type"]))
                    $out .= $this->input($field["Field"]);
                else if (preg_match('#datetime#', $field["Type"]))
                    $out .= $this->input($field["Field"]);
                else if (preg_match('#text#', $field["Type"]))
                    $out .= $this->textarea($field["Field"]);
                else if (preg_match('#enum#', $field["Type"]))
                    $out .= $this->enum($field["Field"]);
                $out .= "</p>";
            }
        }
        return ($out .= '</fieldset>' . $this->end());
    }
    
}
?>