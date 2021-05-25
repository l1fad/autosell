<?php

class Register
{
    private $login;
    private $phone;
    private $email;
    private $password;
    private $type;
    private $errors = [];


    function __construct($log, $pho, $ema, $pass)
    {
        global $mysqli;
        $this->login = $mysqli->real_escape_string($log);
        $result = $mysqli->query('SELECT COUNT(*) FROM Users WHERE ULOGIN = \'' . $this->login . '\'');

        $row = mysqli_fetch_row($result);
        if($row)
        {
            if($row[0] == '1')
                $this->appendError('К сожалению, логин занят');
            else
            {
                if(!strlen($this->login)) $this->appendError('Пожалуйста, укажите логин');
            }
        }


        $this->phone = $mysqli->real_escape_string($pho);
        $result = $mysqli->query('SELECT COUNT(*) FROM Users WHERE UPHONE = \'' . $this->phone . '\'');
        $row = mysqli_fetch_row($result);
        if($row)
        {
            if($row[0] == '1')
                $this->appendError('К сожалению, введенный номер телефон уже зарегистрирован');
            else
            {
                if(!strlen($this->phone)) $this->appendError('Пожалуйста, укажите номер телефона');
            }
        }


        $this->email = $mysqli->real_escape_string($ema);
        $result = $mysqli->query('SELECT COUNT(*) FROM Users WHERE UEMAIL = \'' . $this->email . '\'');
        $row = mysqli_fetch_row($result);
        if($row)
        {
            if($row[0] == '1')
                $this->appendError('К сожалению, введенный E-MAIL уже зарегистрирован');
            else
            {
                if(!strlen($this->email)) $this->appendError('Пожалуйста, укажите E-MAIL');
            }
        }

        if(!strlen($pass)) $this->appendError('Пожалуйста, укажите пароль');
        $this->password = md5(md5($mysqli->real_escape_string($pass)));


        if(count($this->errors) > 0) return;
        $mysqli->query('INSERT INTO Users (ULOGIN, UPHONE, UEMAIL, UPASS, UTYPE) VALUES (\'' . $this->login . '\', \'' .$this->phone . '\', \'' . $this->email . '\', \'' .$this->password . '\', \'User\')');
       
        setcookie('login', $this->login, time() + 3600 * 24 * 30 * 6);
        setcookie('password', $this->password, time() + 3600 * 24 * 30 * 6);
         
        header('Refresh: 0');

    }

    private function appendError($message)
    {
        $this->errors[] = $message;
    }

    
    public function getErrors()
    {
        return $this->errors;
    }
}
