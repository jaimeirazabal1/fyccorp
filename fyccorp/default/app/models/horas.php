<?php 
class Horas extends ActiveRecord{
	public function getHorasByActividadId($actividad_id){
		$query = "SELECT horas.*,
					actividades.nombre,
					actividades.id as actividad_id,
					actividades.comienzo as actividad_comienzo,
					actividades.fin as actividad_fin,
					recursohumano.cargo as recursohumano_cargo,
					recursohumano.area as recursohumano_area,
					recursohumano.empleado_id as recursohumano_empleado_id,
					empleado.nombre as empleado_nombre,
					empleado.apellido as empleado_apellido,
					empleado.correo as empleado_correo,
					empleado.cedula as empleado_cedula
					from horas 
					inner join actividades on horas.actividades_id = actividades.id 
					inner join recursohumano on recursohumano.id = horas.recursohumano_id
					inner join empleado on recursohumano.empleado_id = empleado.id
					where actividades.id = '$actividad_id'";

		// die($query);
		
		return $this->find_all_by_sql($query);
	}
	public function getDatosDeHorasByActividadYSemana($actividad_id,$semana){
		$horas = $this->find_first("conditions: actividades_id='$actividad_id' and semana='$semana'");
		return $horas;
	}
}

 ?>