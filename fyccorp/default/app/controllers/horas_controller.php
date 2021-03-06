<?php 
Load::models("horas","actividades");
class HorasController extends AppController{
	public function before_filter(){
		$this->horas = Load::model("horas");
		$this->actividades = Load::model("actividades");
	}
	public function index($actividad_id){
		View::template("config");
		$this->actividad = $this->actividades->find($actividad_id);
		$this->data = $this->horas->getHorasByActividadId($actividad_id);
		$this->dias_diferencia = Util::calcularDiasDiferencia($this->actividad->comienzo,$this->actividad->fin);
		if (Input::post("guardar_horas")) {
			$horas = new Horas(Input::post("horas"));
			if ($horas->save()) {
				Flash::valid("Horas Guardadas con exito!");
			}else{
				Flash::error("Hubo un error guardando las horas!");
			}
		}
	}
}

 ?>