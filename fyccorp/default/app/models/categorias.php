<?php 
class Categorias extends ActiveRecord{
public function buscar(){
    return $this->find('order: nombre');
  }
}
?>