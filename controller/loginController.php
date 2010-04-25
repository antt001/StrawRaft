<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME'])
    die ('<h2>Direct File Access Prohibited</h2>');

Class loginController Extends baseController {

    private $_username;

    private $_password;

    function __construct($registry) {
        parent::__construct($registry);
        $this->model = new loginModel($this->registry);
        $this->validator = validator::getInstance();

        if(isset ($_POST['user']))
            $this->_username = $_POST['user'];
        else
            $this->_username = $this->sessionGet('user');

        if(isset ($_POST['password'])){
            $this->validator->validateNotEmpty($_POST['password'],3,'Password must be at least 4 characters!');
            $this->_password = md5($_POST['password']);
        }
        else
           $this->_password = $this->sessionGet('password');
    }

    public function index() {
        $this->login();

    }

    public function login() {
        $this->registry->template->title = 'Member Register';
        $this->registry->template->pvar = 'user';
        $this->registry->template->subtitle = 'Username:';
        $this->registry->template->show('login_index');
    }

    public function password() {
        $this->registry->template->title = 'Member Login';
        $this->registry->template->pvar = 'password';
        $this->registry->template->subtitle = 'Password:';
        $this->registry->template->show('login_index');
    }
    
    public function success() {
        $this->registry->template->title = 'Login success';
        $this->registry->template->pvar = '';
        $this->registry->template->subtitle = 'Welcome '.$this->_username;
        $this->registry->template->show('login_index');
    }

    public function verifiy() {
        if($this->_username != false && !$this->model->verifyLogin($this->_username)) {
            $this->registry->template->msg = $this->validator->listErrors('<br />');
            $this->validator->clearErrors();
            $this->login();
            return false;
        }
        
        $this->sessionSet('user', $this->_username);
        
        if(!$this->model->verifyPassword($this->_username, $this->_password)) {
            if($this->_password != false)
                $this->registry->template->msg = $this->validator->listErrors('<br />');
            $this->validator->clearErrors();
            $this->password();
            return false;
        }
        $this->sessionSet('password', $this->_password);
        $this->success();
        return true;
    }
}
?>
