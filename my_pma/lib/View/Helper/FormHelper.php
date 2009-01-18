<?php
class FormHelper extends Helper 
{
    private $model_name;
    
    public function create($url, $model_name = null, $options = array())
    {
        $out = "";
        $this->model_name = $model_name;
        if (isset($options['validator']))
        {
            $out .= '';//'<script type="text/javascript">ValidateForm($("#' . $this->model_name . '"));</script>';
            $this->activeValidator = $options['validator'];
        }
        else
            $out .= $this->activeValidator = false;
        return($out . '<form id="' . $this->model_name . '" ' . 
        		'action="' . $this->create_url($url) . '" ' . 
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
        return ('<p class="submit_btn"><input type="Submit" value="' . ($name != null ? $name : "Submit") . '"/></p></form>');
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
            if (preg_match('#PRI#', $field['Key']))
            {
                $out .= $this->controlPrimKey($field);
            }
            else if (preg_match('#auto_increment#', $field['Extra']))
            {
                $out .= $this->controlPrimKey($field);
            }
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
                else if (preg_match('#(datetime|date)#', $field["Type"]))
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
    
    public function getJSPrimaryKeys($struct_table, $item)
    {
        $primary_keys = "";
        foreach($struct_table as $field => $value)
        {
            if (preg_match("#PRI#", $value['Key']))
            {
                $primary_keys .= $value['Field'] . ':\'' .$item[$value['Field']] . '\',';
            }
        }
        return (rtrim($primary_keys, ","));
    }
    public function getPrimaryKeys($struct_table, $item)
    {
        $primary_keys = array();
        foreach($struct_table as $field => $value)
        {
            if (preg_match("#PRI#", $value['Key']))
            {
                $primary_keys[$value['Field']] = $item[$value['Field']];
            }
        }
        return ($primary_keys);
    }
    
    public function controlPrimKey($field)
    {
        if ($field['Extra'] == "auto_increment")
        {
            $out = '<p>' . $this->label($field['Field']);
            $out .= $this->input($field['Field'], array('disabled' => 'disabled', 'class' => 'auto_increment')) .
                $this->hidden($field['Field']);
        }
        else
        {
            $out = '<p ' . ($this->activeValidator != false ? 'class="validateItem validate-' . $field["Type"] . '">' : '>') .
            $this->label($field['Field']);
            $out .= $this->input($field['Field']);
        }
        $out .= '</p>';
        return ($out);
    }
    
}
?>