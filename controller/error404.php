<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME'])
    die ('<h2>Direct File Access Prohibited</h2>');

Class error404Controller Extends baseController {

public function index() 
{
        $this->registry->template->title = 'This is the 404';
        $this->registry->template->show('error404');
}


}
?>
