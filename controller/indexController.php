<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME'])
    die ('<h2>Direct File Access Prohibited</h2>');

Class indexController Extends baseController {

    public function index() {
        /*** set a template variable ***/
        $this->registry->template->module = 'welcome';
        
        /*** load the index template ***/
        $this->registry->template->show('index');
    }

}

?>
