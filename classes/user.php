<?php

class User
{
    private $num;
    private $login;
    private $phone;
    private $email;
    private $password;
    private $type;

    function __construct()
    {
        global $mysqli;
        if(isset($_POST['login']) and isset($_POST['password']) or isset($_COOKIE['login']) and isset($_COOKIE['password']))
        {
            if(isset($_POST['login']))
            {
                $login1 = $mysqli->real_escape_string($_POST['login']);
                $password1 = ($_POST['password']);
            }
            else
            {
                $login1 = $mysqli->real_escape_string($_COOKIE['login']);
                $password1 = $mysqli->real_escape_string($_COOKIE['password']);
            }

            $result = $mysqli->query('SELECT UNUM, UPHONE, UEMAIL, UTYPE FROM USERS 
                WHERE ULOGIN = \'' . $login1 . '\' AND UPASS = \'' . $password1 .'\'');
            if(!$result)
                echo 'Ошибка аутентификации!';
            else
            {
                $row = mysqli_fetch_row($result);
                if($row)
                {
                    if(isset($_POST['login']))
                    {
                        setcookie('login', $login1, time() + 3600 * 24 * 30 * 6);
                        setcookie('password', $password1, time() + 3600 * 24 * 30 * 6);
                    }

                    $this->num = $row[0];
                    $this->login = $login1;
                    $this->phone = $row[1];
                    $this->email = $row[2];
                    $this->password = $password1;
                    $this->type = $row[3];
                }
                else
               	    $this->num = NULL;
            }
        }
    }
    
    public function getnum()
    {
        return $this->num;
    }

    public function getlogin()
    {
        return $this->login;
    }

    public function getphone()
    {
        return $this->phone;
    }

    public function getemail()
    {
        return $this->email;
    }

    public function getpassword()
    {
        return $this->password;
    }

    public function gettype()
    {
        return $this->type;
    }
    
}
?>
