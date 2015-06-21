<?php
View::template("cliente");
Load::models("usuario","proyecto","cliente");

class ClientesController extends AppController
{	
    public function index(){
    	
    	$this->clientes = Load::model("cliente")->find();
    }

  	public function nuevo(){
  		if (Auth::is_valid()) {
		    if (Auth::get("admin")=='1') {  
		          
		        if (Input::haspost("cliente")) {      
		            $cliente=new Cliente(Input::post("cliente"));
		            if ($cliente->save()) {
		            Flash::valid("Cliente creado exitosamente");
		            Router::redirect("clientes/index");
		          	}else{
		            Flash::error("Ocurrio un error al crear, por favor intente nuevamente.");
		            Router::redirect("clientes/index");
		         	}
		        }
		    } 
		    else {
		        Flash::error("Acceso denegado");
		        Router::redirect("config/index");
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

				$this->cliente = Load::model("cliente")->find($id);

				$cliente= new Cliente();
          		if(Input::hasPost('cliente'))
            		{  
            			if($cliente->update(Input::post('cliente'))){
	               			$cliente=new Cliente(Input::post("cliente"));
	                   
	              			if ($cliente->save()) {
	                		Flash::valid("Cliente editado satisfactoriamente");
	                		Router::redirect("clientes/index");
	               			}
	              			else {  
	                		Flash::error("No se logro modificar");
	              			} 
            			}
          			}
          			else {
                		$this->cliente = $cliente->find_by_id((int)$id);
            		}

			}else{
				Flash::error("Acceso denegado");
				Router::redirect("clientes/index");
			}
		}else{
			Flash::error("Necesitas de un usuario autenticado");
			Router::redirect("index");
		}
	}

	function eliminar($id){
	if (Auth::is_valid()){
	if (Auth::get("admin")=='1'){
        $cliente = new Cliente();
        $cliente = Load::model("cliente")->find_by_id($id);
       
        	if ($cliente->delete((int)$id)) {
            	Flash::valid("El cliente ha sido eliminado correctamente.");
            	Router::redirect("clientes/index");
        	}else{
            	Flash::error("Error al eliminar cliente."); 
            	Router::redirect("clientes/index");
        	}   
    }
    else{
		Flash::error("Acceso denegado");
		Router::redirect("clientes/index");
	}
	}else{
		Flash::error("Necesitas de un usuario autenticado");
		Router::redirect("index");
	}
	}
    
}
