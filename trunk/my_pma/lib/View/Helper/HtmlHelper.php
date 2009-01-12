<?php
class HtmlHelper extends Helper 
{
    
    public function link($url, $name, $options = null)
    {
        $output = '<a href="' . $this->create_url($url);
        if (isset($url['params']))
        {
            $output .= '?';
            foreach ($url['params'] as $key_param => $value_param)
                $output .= urlencode($key_param) . '=' . urlencode($value_param) . '&';
            $output = substr($output, 0, -1);
        }
        $output .= '"';
        $output .= $this->bind_html_attribute($options);
        $output .= '>' . $name . '</a>';
        
        return ($output);
    }
    
    public function render_element($file_name, $vars = array())
    {
        $config = Config::getInstance();
        extract($vars, EXTR_SKIP);
        extract(DataView::getInstance()->get('helpers'));
        
        ob_start();
        $output = "[render element: " . $file_name . "]<br />";
        include $config->get('app.absolute_root') . DIRECTORY_SEPARATOR .
                 "application" . DIRECTORY_SEPARATOR .
                 "views" . DIRECTORY_SEPARATOR .
                 "elements" . DIRECTORY_SEPARATOR .
                 $file_name . ".phtml";
        
        $output = ob_get_contents();
        ob_end_clean();
        
        return ($output);
    }
    
    public function css($filename)
    {
        return ('<link rel="stylesheet" href="/' . $this->root . '/public/css/' .$filename . '.css">');
    }
    
    public function js($filename)
    {
        return ('<script type="text/javascript" src="/' . $this->root . '/public/js/' .$filename . '.js"></script>');
    }
    
}
?>