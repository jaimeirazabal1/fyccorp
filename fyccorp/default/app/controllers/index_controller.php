<?php
Load::model("usuario");
class IndexController extends AppController
{
    public function index(){

    }

     public function autenticado()
        {
          if (Input::hasPost("usuario","clave","status")){
            $clave = Input::post("clave");
            $usuario=Input::post("usuario");
            $status = 1;

            $auth = new Auth("model", "class: usuario", "usuario: $usuario", "clave: $clave", "status: $status");
            if ($auth->authenticate()){ 
               Router::redirect("config/index");
              }
              
             else {
              Flash::error("El usuario o clave que usted ha ingresado no son válidos");
              Router::redirect("index");
            }
            }
        }


      public function logout(){
        if (Auth::is_valid()) {
            Auth::destroy_identity();
            Router::redirect("index");
            }
        }
    
}
