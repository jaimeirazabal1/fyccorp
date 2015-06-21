<?php
View::template("config");
Load::models("usuario","proyecto","categorias","recursos","actividades");

class ProyectosController extends AppController
{	
    public function index(){
    	
    	$this->proyecto = Load::model("proyecto")->find();
    }
    public function nuevo(){

    	$this->proyecto = Load::model("proyecto")->find();

    	   if (Input::haspost("proyecto")) {      
		            $proyecto=new Proyecto(Input::post("proyecto"));
		            if ($proyecto->save()) {
			            Flash::valid("Proyecto creado exitosamente");
			            Router::redirect("proyectos/index");
		          	}else{
			            Flash::error("Ocurrio un error al crear, por favor intente nuevamente.");
			            Router::redirect("proyectos/index");
		         	}
		        }

    }

    public function editar($id){
		if (Auth::is_valid()){
			if (Auth::get("admin")=='1'){

				$this->proyecto = Load::model("proyecto")->find($id);

				$proyecto= new Proyecto();
          		if(Input::hasPost('proyecto'))
            		{  
            			if($proyecto->update(Input::post('proyecto'))){
	               			$proyecto=new Proyecto(Input::post("proyecto"));
	                   
	              			if ($proyecto->save()) {
	                		Flash::valid("Proyecto editado satisfactoriamente");
	                		Router::redirect("proyectos/index");
	               			}
	              			else {  
	                		Flash::error("No se logro modificar");
	              			} 
            			}
          			}
          			else {
                		$this->proyecto = $proyecto->find_by_id((int)$id);
            		}

			}else{
				Flash::error("Acceso denegado");
				Router::redirect("proyectos/index");
			}
		}else{
			Flash::error("Necesitas de un usuario autenticado");
			Router::redirect("index");
		}
	}

	function eliminar($id){
	if (Auth::is_valid()){
	if (Auth::get("admin")=='1'){
        $proyecto = new Proyecto();
        $proyecto = Load::model("proyecto")->find_by_id($id);
       
        	if ($proyecto->delete((int)$id)) {
            	Flash::valid("El proyecto ha sido eliminado correctamente.");
            	Router::redirect("proyectos/index");
        	}else{
            	Flash::error("Error al eliminar proyecto."); 
            	Router::redirect("proyectos/index");
        	}   
    }
    else{
		Flash::error("Acceso denegado");
		Router::redirect("proyectos/index");
	}
	}else{
		Flash::error("Necesitas de un usuario autenticado");
		Router::redirect("index");
	}
	}
    
    public function configuraciones($id){
    	$this->proyecto = Load::model("proyecto")->find($id);
    	$this->actividades = Load::model("actividades")->find("actividades.proyecto_id=$id");
    }

    public function nueva_actividad($id){
  		if (Auth::is_valid()) {

  			$this->proyecto = Load::model("proyecto")->find($id);

		    if (Auth::get("admin")=='1') {  
		          
		        if (Input::haspost("actividades")) {      
		            $actividades=new Actividades(Input::post("actividades"));
		            $actividades->proyecto_id=$id;
		            if ($actividades->save()) {
			            Flash::valid("Actividad creada exitosamente");
			            Router::redirect("proyectos/configuraciones/$id");
		          	}else{
			            Flash::error("Ocurrio un error al crear, por favor intente nuevamente.");
			            Router::redirect("proyectos/configuraciones/$id");
		         	}
		        }
		    } 
		    else {
		        Flash::error("Acceso denegado");
		        Router::redirect("proyectos/configuraciones/$id");
		    }
	    }
	    else{
	    	Flash::error("Necesitas un usuario autenticado");
	    	Router::redirect("index");
	    }
	
	}


    public function categorias(){

    	$this->categorias = Load::model("categorias")->find();
    }

    public function nueva_categoria(){
  		if (Auth::is_valid()) {
		    if (Auth::get("admin")=='1') {  
		          
		        if (Input::haspost("categorias")) {      
		            $categorias=new Categorias(Input::post("categorias"));
		            if ($categorias->save()) {
			            Flash::valid("Categoría creada exitosamente");
			            Router::redirect("proyectos/categorias");
		          	}else{
			            Flash::error("Ocurrio un error al crear, por favor intente nuevamente.");
			            Router::redirect("proyectos/categorias");
		         	}
		        }
		    } 
		    else {
		        Flash::error("Acceso denegado");
		        Router::redirect("proyectos/categorias");
		    }
	    }
	    else{
	    	Flash::error("Necesitas un usuario autenticado");
	    	Router::redirect("index");
	    }
	
	}

	public function editar_categoria($id){
		if (Auth::is_valid()){
			if (Auth::get("admin")=='1'){

				$this->categorias = Load::model("categorias")->find($id);

				$categorias= new Categorias();
          		if(Input::hasPost('categorias'))
            		{  
            			if($categorias->update(Input::post('categorias'))){
	               			$categorias=new Categorias(Input::post("categorias"));
	                   
	              			if ($categorias->save()) {
	                		Flash::valid("Categoría editada satisfactoriamente");
	                		Router::redirect("proyectos/categorias");
	               			}
	              			else {  
	                		Flash::error("No se logro modificar");
	              			} 
            			}
          			}
          			else {
                		$this->categorias = $categorias->find_by_id((int)$id);
            		}

			}else{
				Flash::error("Acceso denegado");
				Router::redirect("proyectos/categorias");
			}
		}else{
			Flash::error("Necesitas de un usuario autenticado");
			Router::redirect("index");
		}
	}

	function eliminar_categoria($id){
	if (Auth::is_valid()){
	if (Auth::get("admin")=='1'){
        $categorias = new Categorias();
        $categorias = Load::model("categorias")->find_by_id($id);
       
        	if ($categorias->delete((int)$id)) {
            	Flash::valid("La categoria ha sido eliminada correctamente.");
            	Router::redirect("proyectos/categorias");
        	}else{
            	Flash::error("Error al eliminar categorias."); 
            	Router::redirect("proyectos/categorias");
        	}   
    }
    else{
		Flash::error("Acceso denegado");
		Router::redirect("proyectos/categorias");
	}
	}else{
		Flash::error("Necesitas de un usuario autenticado");
		Router::redirect("index");
	}
	}
    
     public function recursos(){

    	$this->recursos = Load::model("recursos")->find();
    }

    public function nuevo_recurso(){
  		if (Auth::is_valid()) {
		    if (Auth::get("admin")=='1') {  
		          
		        if (Input::haspost("recursos")) {      
		            $recursos=new Recursos(Input::post("recursos"));
		            if ($recursos->save()) {
			            Flash::valid("Recurso creado exitosamente");
			            Router::redirect("proyectos/recursos");
		          	}else{
			            Flash::error("Ocurrio un error al crear, por favor intente nuevamente.");
			            Router::redirect("proyectos/recursos");
		         	}
		        }
		    } 
		    else {
		        Flash::error("Acceso denegado");
		        Router::redirect("proyectos/recursos");
		    }
	    }
	    else{
	    	Flash::error("Necesitas un usuario autenticado");
	    	Router::redirect("index");
	    }
	
	}

	public function editar_recurso($id){
		if (Auth::is_valid()){
			if (Auth::get("admin")=='1'){

				$this->recursos = Load::model("recursos")->find($id);

				$recursos= new Recursos();
          		if(Input::hasPost('recursos'))
            		{  
            			if($recursos->update(Input::post('recursos'))){
	               			$recursos=new Recursos(Input::post("recursos"));
	                   
	              			if ($recursos->save()) {
	                		Flash::valid("Recurso editado satisfactoriamente");
	                		Router::redirect("proyectos/recursos");
	               			}
	              			else {  
	                		Flash::error("No se logro modificar");
	              			} 
            			}
          			}
          			else {
                		$this->recursos = $recursos->find_by_id((int)$id);
            		}

			}else{
				Flash::error("Acceso denegado");
				Router::redirect("proyectos/recursos");
			}
		}else{
			Flash::error("Necesitas de un usuario autenticado");
			Router::redirect("index");
		}
	}

	function eliminar_recurso($id){
	if (Auth::is_valid()){
	if (Auth::get("admin")=='1'){
        $recursos = new Recursos();
        $recursos = Load::model("recursos")->find_by_id($id);
       
        	if ($recursos->delete((int)$id)) {
            	Flash::valid("El recurso ha sido eliminado correctamente.");
            	Router::redirect("proyectos/recursos");
        	}else{
            	Flash::error("Error al eliminar recursos."); 
            	Router::redirect("proyectos/recursos");
        	}   
    }
    else{
		Flash::error("Acceso denegado");
		Router::redirect("proyectos/recursos");
	}
	}else{
		Flash::error("Necesitas de un usuario autenticado");
		Router::redirect("index");
	}
	}
}
