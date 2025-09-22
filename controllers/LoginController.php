<?php

namespace Controllers;

use EmptyIterator;
use MVC\Router;
use Model\Usuario;

class LoginController {

    public static function login(Router $router){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

        }

        // Render de la vista
        $router -> render('auth/login', [
            'titulo' => 'Iniciar Sesión'
        ]);
    }

    public static function logout(){
        echo 'desde logout ';
    }

    public static function crear(Router $router){
        $alertas =[];
        $usuario = new Usuario;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $usuario->sincronizar($_POST);
            $alertas = $usuario -> validarNuevaCuenta();

            if(empty($alertas)){
                $existeUsuario = Usuario::where('email', $usuario -> email);
            
                if($existeUsuario){
                    Usuario::setAlerta('error', 'El Usuario ya esta registrado');
                    $alertas = Usuario::getAlertas();
                } else {
                    // Hashear el password
                    $usuario -> hashPassword();
                    // Eliminar password2
                    unset($usuario->password2);
                    // Generar el token
                    $usuario -> crearToken();
                    // Crear un nuevo usuario
                    $resultado = $usuario->guardar();

                    if($resultado){
                        header('Location: /mensaje');
                    }
                }
            }
        }

        // Render de la vista
        $router -> render('auth/crear', [
            'titulo' => 'Crea tu cuenta en UpTask',
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function olvide(Router $router){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

        }
        // Render de la vista
        $router -> render('auth/olvide', [
            'titulo' => 'Olvide mi password'
        ]);
    }

    public static function reestablecer(Router $router){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

        }
        // Render de la vista
        $router -> render('auth/reestablecer', [
            'titulo' => 'Reestablecer password'
        ]);
    }

    public static function mensaje(Router $router){
        
        // Render de la vista
        $router -> render('auth/mensaje', [
            'titulo' => 'Cuenta creada exitosamente'
        ]);

    }

    public static function confirmar(Router $router){
        
        // Render de la vista
        $router -> render('auth/confirmar', [
            'titulo' => 'Confirma tu cuenta UpTask'
        ]);

    }

    
}