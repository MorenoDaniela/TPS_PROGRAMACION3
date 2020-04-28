<?php

use \Firebase\JWT\JWT;
require_once __DIR__ .'/vendor/autoload.php';
include_once './data.php';
 class User
 {
     public $name;
     public $lastName;
     public $pass;
     public $email;
     public $phone;
     public $type;

     public function __construct($name,$lastName,$pass,$email,$phone,$type)
     {
        $this->name=$name;
        $this->lastName=$lastName;
        $this->pass=$pass;
        $this->email=$email;
        $this->phone=$phone;
        $this->type=$type;
     }

     public static function Singin($name,$lastName,$pass,$email,$phone,$type)
     {
        $return=false;
        $newUser = new User($name,$lastName,$pass,$email,$phone,$type);
        if (Data::save("users.txt",$newUser))
        {
            $return=true;
        }
        return $return;
        
     }

     public static function Login($email,$pass)
     {
        $return=false;
        $response = Data::load("users.txt");
        if ($response)
        {
            $key = "example_key";
            foreach ($response as $user)
            {
                if ($user!= '' && User::validar($email, $pass, $user->email, $user->pass))
                {
                    $payload = array(
                        "name" => $user->name,
                        "lastName" => $user->lastName,
                        "pass" => $pass,
                        "email" => $email,
                        "phone" => $user->phone,
                        "type" => $user->type
                    );
                    $return=true;
                break;
                }
            }
            if ($return)
            {
                $return = JWT::encode($payload, $key);
            }
        }
        return $return;
     }

     public static function miToken($token)
     {
        try
        {
            $return = JWT::decode($token,"example_key",array('HS256'));
        }catch(Exception $ex)
        {
            $return = $ex->getMessage();
        }
        
        return $return;
     }

     public static function MostrarUsuarios($token)
     {
        $users = JWT::decode($token,"example_key", array("HS256"));
        $response = "";
        $lista = Data::load('users.txt');
        
        if($users)
        {
            if($users->type==true)
            {  
                foreach($lista as $admin)
                {
                    $response = $response . $admin->name . PHP_EOL;
                }
                return $response;
            }else
            {
                foreach($lista as $user)
                {
                    if(!$user->type)
                    {
                        $response = $response . $user->name . PHP_EOL;
                    }
                }
                return $response;
            }
        }
        return $response;      

    }

     public static function validar($email,$pass, $emailNew, $passNew)
     {
        $return = false;
        //$lista = Data::load("users.txt");
        //print_r($lista);
        //if ($lista != false)
        //{
            if ($passNew == $pass && $email==$emailNew)
            {
                $return = true;
            }

            /*
            foreach($lista as $user)
            {
                if ($user->pass == $pass && $user->email==$email)
                {
                    $return = true;
                }
            }*/
        //}
        return $return;
     }

     public function isAdmin()
     {
        $return=false;
        if ($this->type==true)
        {
            $retur=true;
        }
        return $return;
     }
 }