<?php 
class Empleado extends ActiveRecord{
protected function initialize(){
    $this->validates_numericality_of("cedula");
    $this->validates_email_in("correo");
    $this->validates_uniqueness_of('correo', 'message: El correo ya existe, Intente con Otro');
    $this->validates_uniqueness_of('cedula', 'message: La cédula que usted ingreso ya existe'); 
   }


   public function edad($date){
   	/*separo cada dato año/mes/dia*/
   	$dias = explode("-", $date, 3);
   	//print_r($dias);exit();
	$dias = mktime(0,0,0,$dias[1],$dias[2],$dias[0]);
	$edad = (int)((time()-$dias)/31556926 );
	return $edad;
   }

    public function buscar(){
      return $this->find_all_by_sql("
      SELECT empleado.id,empleado.nombre, empleado.apellido FROM empleado WHERE empleado.id NOT IN (SELECT empleado_id from usuario) 
      ");

  }

  public function buscarempleado(){
    return $this->find('order: nombre');
  }
  
}

?>