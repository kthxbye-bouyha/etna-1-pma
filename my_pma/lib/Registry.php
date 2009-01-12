<?php
class Registry
{
    /**
     * @desc the registry
     *
     * @var array
     */
    protected $data;
    
    /**
     * @init map
     *
     */
    public function __construct()
    {
        $this->data = array();
    }
    
    /**
     * @desc set key value
     *
     * @param string $name
     * @param unknown_type $value
     */
    public function set($name, $value)
    {
        if (strpos($name, '.') !== false)
        {
            $index_list = explode('.', $name);
            $nb_index = count($index_list);
            $i = 0;
            $next;
            while ($i < $nb_index - 1)
            {
                if (!isset($this->data[$index_list[$i]]))
                {
                    $this->data[$index_list[$i]] = array();
                }
                $next = &$this->data[$index_list[$i]];
                $i++;
            }
            $next[$index_list[$i]] = $value;
        }
        else
            $this->data[$name] = $value;
    }
    
    /**
     * @desc get associated value for name
     *
     * @param string $name
     * @return unknown
     */
    public function get($name)
    {
        if (strpos($name, '.') !== false)
        {
            $index_list = explode('.', $name);
            $nb_index = count($index_list);
            $i = 1;
            if (isset($this->data[$index_list[0]]))
                $return = &$this->data[$index_list[0]];
            else
                return (null);
            while ($i < $nb_index)
            {
                if (isset($return[$index_list[$i]]))
                    $return = &$return[$index_list[$i]];
                else
                    return (null);
                $i++;
            }
            return ($return);
        }
        return (isset($this->data[$name]) ? $this->data[$name] : null);
    }
    
    public function getAll()
    {
        return ($this->data);
    }

}
?>