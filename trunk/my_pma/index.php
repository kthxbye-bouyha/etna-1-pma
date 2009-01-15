<?php
require_once 'utils.php';
//config
$config = Config::getInstance();
$vars = array('db' => array('driver' => 'mysql',
							'host' => 'localhost',
							'user' => 'root',
							'pwd' => '',
							'db_name' => 'mytodo'),
            //nom du dossier ds htdocs/ ou www/
             'app' => array('absolute_root' => $_SERVER['DOCUMENT_ROOT']."my_pma",
             				'relative_root' => "my_pma",
                            'fc' => array('default_controller' => array('value' => 'Index'),
                                          'error_controller' => array('value' => 'Error'),
                                          'default_action' => 'Index')),
        );

$config->set('db', $vars['db']);
$config->set('app', $vars['app']);


//call front controller    
try {
    $front_controller = FrontController::getInstance();
    $front_controller->dispatch();
    $front_controller->render();
} catch (LoggerException $e) {
    echo $e->getMessage();
}
//$current_controller = $front_controller->create_controller();
?>