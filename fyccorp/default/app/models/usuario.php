<?php 
class Usuario extends ActiveRecord{
protected function initialize(){
   $this->validates_uniqueness_of('usuario', 'message: El nombre de usuario ya existe, Intente con Otro');
   }

  
}

?>