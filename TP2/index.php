<?php

include_once './response.php';
include_once './users.php';
session_start();

//print_r($_SESSION);

$requestMethod = $_SERVER['REQUEST_METHOD'];
$pathInfo = $_SERVER['PATH_INFO'];

$respuesta = new Response;
$respuesta->data='';

switch($requestMethod)
{
    case 'GET':
        switch($pathInfo)
        {
            case '/detalle':
                if (isset($_GET['mi_token']))
                {
                    echo "chau";
                    $respuesta->data=User::miToken($_GET['mi_token']);
                }
                else
                {
                    $respuesta->data = 'Faltan datos';
                    $respuesta->status = 'fail';
                }
                echo json_encode($respuesta);
            break;
            case '/lista':
                if (isset($_GET['mi_token']))
                {
                    echo "hola";
                    $respuesta->data=User::MostrarUsuarios($_GET['mi_token']);        
                }
                else
                {
                    $respuesta->data = 'Faltan datos';
                    $respuesta->status = 'fail';
                }
                echo json_encode($respuesta);
            break;
        }
    break;
    case 'POST':
        switch($pathInfo)
        {
            case '/login':
                if (isset($_POST['email']) && isset($_POST['pass']))
                {
                    $respuesta->data= User::Login($_POST['email'],$_POST['pass']);
                }else
                {
                    $respuesta->data = 'Faltan datos';
                    $respuesta->status = 'fail';
                }
                echo json_encode($respuesta);
            break;
            case '/signin':
                if (isset($_POST['name']) && isset($_POST['lastName']) && isset($_POST['pass']) && isset($_POST['email']) && isset($_POST['type']) && isset($_POST['phone']))
                {
                    //$user = new User();
                    if (User::Singin($_POST['name'],$_POST['lastName'],$_POST['pass'],$_POST['email'],$_POST['phone'],$_POST['type']))
                    {
                        $respuesta->data = 'Sign valido';
                    }
                    
                }else
                {
                    $respuesta->data = 'Faltan datos';
                    $respuesta->status = 'fail';
                }
                echo json_encode($respuesta);
            break;
            default:
            $respuesta->data='Error en pathInfo';
            $respuesta->status='fail';
            break;
        }
    break;
    default:
    $respuesta->data='Metodo no permitido';
    $respuesta->status='fail';
    echo json_encode($respuesta);
    break;
}