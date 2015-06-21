<?php
View::template("personal");
Load::models("usuario","proyecto","cliente","empleado","usuario");

class PersonalController extends AppController
{	
    public function index(){
    	
    	$this->empleados = Load::model("empleado")->find();
    }

 	 public function usuarios(){
    	
    	$this->usuarios = Load::model("usuario")->find();
    }

  	public function nuevo(){
  		if (Auth::is_valid()) {
		    if (Auth::get("admin")=='1') {  
		          
		        if (Input::haspost("empleado")) {      
		            $empleado=new Empleado(Input::post("empleado"));

		            if (!empty($_FILES['perfil']['name'])) {
			            $perfil = Upload::factory('perfil', 'image');
			            $perfil->setExtensions(array('jpg','jpeg','png','gif'));
		            	if ($perfil->isUploaded()) {
		              	if ($img = $perfil->save(date("Y_m_d_h.i.s").$_FILES['perfil']['name']))
		                  $empleado->perfil = "upload/".$img;
		                }else{
		                  Flash::warning('No se ha podido subir la imagen ...!!!');
		              	}
		          	}
		          	$empleado->fecha_egreso=$empleado->fecha_ingreso;
		            if ($empleado->save()) {
		            Flash::valid("Personal creado exitosamente");
		            Router::redirect("personal/index");
		          	}else{
		            Flash::error("Ocurrio un error al crear, por favor intente nuevamente.");
		            	//Eliminar la img subida
		            	if (isset($img) and $img) {
                               unlink(getcwd()."/img/upload/$img");
                         } 
		            Router::redirect("personal/index");
		         	}
		        }
		    } 
		    else {
		        Flash::error("Acceso denegado");
		        Router::redirect("personal/index");
		    }
	    }
	    else{
	    	Flash::error("Necesitas un usuario autenticado");
	    	Router::redirect("index");
	    }
	}

	  	public function nuevo_usuario(){
  		if (Auth::is_valid()) {
		    if (Auth::get("admin")=='1') {  
		          
		        if (Input::haspost("usuario")) {      
		            $usuario=new Usuario(Input::post("usuario"));

		            if ($usuario->save()) {
		            Flash::valid("Usuario creado exitosamente");
		            Router::redirect("personal/usuarios");
		          	}else{
		            Flash::error("Ocurrio un error al crear, por favor intente nuevamente.");
		            Router::redirect("personal/usuarios");
		         	}
		        }
		    } 
		    else {
		        Flash::error("Acceso denegado");
		        Router::redirect("personal/usuarios");
		    }
	    }
	    else{
	    	Flash::error("Necesitas un usuario autenticado");
	    	Router::redirect("index");
	    }
	}

	public function editar($id){
		if (Auth::is_valid()){
			if (Auth::get("admin")=='1'){

				$this->empleado = Load::model("empleado")->find($id);

				$empleado= new Empleado();
          		if(Input::hasPost('empleado'))
            		{  
            			if($empleado->update(Input::post('empleado'))){
	               			$empleado=new Empleado(Input::post("empleado"));

			               	if (!empty($_FILES['perfil']['name'])) {
					            $perfil = Upload::factory('perfil', 'image');
					            $perfil->setExtensions(array('jpg','jpeg','png','gif'));
				            	if ($perfil->isUploaded()) {
				              	if ($img = $perfil->save(date("Y_m_d_h.i.s").$_FILES['perfil']['name']))
				                  $empleado->perfil = "upload/".$img;
				                }else{
				                  Flash::warning('No se ha podido subir la imagen ...!!!');
				              	}
				          	}
	                   
	              			if ($empleado->save()) {
	                		Flash::valid("Personal editado satisfactoriamente");
	                		Router::redirect("personal/index");
	               			}
	              			else {  
	                		Flash::error("No se logro modificar");
	              			} 
            			}
          			}
          			else {
                		$this->empleado = $empleado->find_by_id((int)$id);
            		}

			}else{
				Flash::error("Acceso denegado");
				Router::redirect("personal/index");
			}
		}else{
			Flash::error("Necesitas de un usuario autenticado");
			Router::redirect("index");
		}
	}

	public function editar_usuario($id){
		if (Auth::is_valid()){
			if (Auth::get("admin")=='1'){

				$this->usuario = Load::model("usuario")->find($id);

				$usuario= new Usuario();
          		if(Input::hasPost('usuario'))
            		{  
            			if($usuario->update(Input::post('usuario'))){
	               			$usuario=new Usuario(Input::post("usuario"));
	              			if ($usuario->save()) {
	                		Flash::valid("Personal editado satisfactoriamente");
	                		Router::redirect("personal/usuarios");
	               			}
	              			else {  
	                		Flash::error("No se logro modificar");
	              			} 
            			}
            		}
          			
          			else {
                		$this->usuario = $usuario->find_by_id((int)$id);
            		}

			}else{
				Flash::error("Acceso denegado");
				Router::redirect("personal/usuarios");
			}
		}else{
			Flash::error("Necesitas de un usuario autenticado");
			Router::redirect("index");
		}
	}


	function eliminar($id){
	if (Auth::is_valid()){
	if (Auth::get("admin")=='1'){
        $empleado = new Empleado();
        $empleado = Load::model("empleado")->find_by_id($id);
       
        	if ($empleado->delete((int)$id)) {
            	Flash::valid("El personal ha sido eliminado correctamente.");
            	Router::redirect("personal/index");
        	}else{
            	Flash::error("Error al eliminar personal."); 
            	Router::redirect("clientes/index");
        	}   
    }
    else{
		Flash::error("Acceso denegado");
		Router::redirect("personal/index");
	}
	}else{
		Flash::error("Necesitas de un usuario autenticado");
		Router::redirect("index");
	}
	}
    
}
