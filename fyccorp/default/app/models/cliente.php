<?php 
class Cliente extends ActiveRecord{
public function buscar(){
    return $this->find('order: nombre');
  }
}
?>