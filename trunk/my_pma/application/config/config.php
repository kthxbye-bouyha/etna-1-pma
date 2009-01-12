<?php
set_include_path('../controllers;' . 
                 '../models;');
function __autoload($underscored_class_name)
{
    if (strpos($underscored_class_name, '_') !== false)
    {
        $path = str_replace('_', DIRECTORY_SEPARATOR, $underscored_class_name) . 'php';
        if (file_exists($path))
            include_once($path);
        else
            throw new LoaderException();
    }
    else
    {
        include_once($underscored_class_name . "php");
    }
}


//gestion des erreures
error_reporting(E_ALL);


//instanciation du fichier de configuration
$config = Config::getInstance();
$vars = array('db' => array('host' => 'localhost',
							'user' => 'root',
							'pwd' => '',
							'db_name' => 'mytodo'),
             'app' => array('absolute_root' => $_SERVER['DOCUMENT_ROOT']."framework",
             				'relative_root' => "framework",
                            'fc' => array('default_controller' => array('value' => 'Index'),
                                          'error_controller' => array('value' => 'Error'),
                                          'default_action' => 'Index')),
        );
$config->set('db', $vars['db']);
$config->set('app', $vars['app']);


//def connexion
$db = new Database($config->get('db.user'),
                   $config->get('db.pwd'),
                   $config->get('db.host'),
                   $config->get('db.db_name'));

?>