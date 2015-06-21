
	function ValidaSoloNumeros() {
	 if ((event.keyCode < 48) || (event.keyCode > 57)) 
	  event.returnValue = false;
	}
	function validarSiNumero(numero){
	    if (!/^([0-9])*$/.test(numero))
	      return false;

	  	return true;
	}