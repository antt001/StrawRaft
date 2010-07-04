<?php

/**
 * Description of router class
 *
 * @version 0.0.2
 * @license MIT http://www.opensource.org/licenses/mit-license.php
 * @filesource
 * @package StrawRaft
 * @author antt
 */
class router {
    /*
     * @the registry
     */
    private $registry;


    function __construct($registry) {
        $this->registry = $registry;
    }

    public function route(){
        echo $_SERVER['HTTP_HOST'];
    }


}
?>
