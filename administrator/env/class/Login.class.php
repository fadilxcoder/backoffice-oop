<?php

class Login extends AbstractTask{

    private $_db;
    private $_tableName = 'administrator';
    
    public $_username;
    public $_password;

    public function __construct($db)
    {
        $this->_db = $db;
    }

    public function processLogin()
    {
        $this->_username = htmlspecialchars(strip_tags($this->_username));
        $this->_password = htmlspecialchars(strip_tags($this->_password));
        
        $sql = "SELECT * FROM ".$this->_tableName." WHERE _username = :username AND _password = :password";
        $query = $this->_db->prepare($sql);
        $query->bindValue(':username', $this->_username, PDO::PARAM_STR);
        $query->bindValue(':password', $this->_password, PDO::PARAM_STR);
        $query->execute() or die(print_r($query->errorInfo(), true));

        $result = $this->convertToObject($query);
        if(empty($result)):
            header('Location: login.php?v=0');
            exit;
        else:
            foreach($result as $_result):
                if(strcmp($_result->_password, $this->_password) == 0):
                    $_SESSION["admin"]  = true;
                    $_SESSION["uid"]    = $_result->_id;
                    $_SESSION["name"]   = $_result->_name;
                    header('Location: dashboard.php');
                    exit;
                endif;
            endforeach;
            header('Location: login.php?v=0');
            exit;
        endif;
    }

    public static function doLogout()
    {
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit();
    }
}