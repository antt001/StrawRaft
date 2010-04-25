<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME'])
    die ('<h2>Direct File Access Prohibited</h2>');

Class loginModel {

    /*
 * @registry object
    */
    protected $registry;

    function __construct($registry) {
        $this->registry = $registry;
        $this->validator = validator::getInstance();
        $this->db = new dbAbstraction;
    }

    function verifyLogin($username) {
        if(!$this->validator->validateNotEmpty($username,3,'Username must be at least 4 characters!') ||
                !$this->validator->validateTextOnly($username, 'Username can contain only letters, digits or _ !')) {
            return false;
        }
        //$this->db->select("ID");
        $this->db->select("user_id");
        $this->db->from("web_users");
        //$this->db->where("NAME","'$username'");
        $this->db->where("user_name","'$username'");
        if (config::getInstance()->config_values['application']['process_user_status'] != false)
            $this->db->andClause("STATUS", "'OPEN'");
        $res = $this->db->query();
        //$getUser = $loginConnector->query("SELECT * FROM web_users WHERE name = '".$_COOKIE['user']."' AND STATUS = 'OPEN'");
        if(count($this->db->fetchAll($res)) < 1){
            $this->validator->addError('Username incorrect!');
            return false;
        }
        return true;

    }

    function verifyPassword($username, $password) {
        
        //$this->db->select("ID");
        $this->db->select("user_id");
        $this->db->from("web_users");
        //$this->db->where("NAME","'$username'");
        $this->db->where("user_name","'$username'");

        //$this->db->where("PASS","'$password'");
        $this->db->andClause("user_password","'$password'");
        if (config::getInstance()->config_values['application']['process_user_status'] != false)
            $this->db->andClause("STATUS", "'OPEN'");
        $res = $this->db->query();
        //$getUser = $loginConnector->query("SELECT * FROM web_users WHERE name = '".$_COOKIE['user']."' AND STATUS = 'OPEN'");
        if(count($this->db->fetchAll($res)) < 1){
            $this->validator->addError('Password incorrect!');
            return false;
        }
        return true;
    }


}