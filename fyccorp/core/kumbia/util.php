<?php
/**
 * KumbiaPHP web & app Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://wiki.kumbiaphp.com/Licencia
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@kumbiaphp.com so we can send you a copy immediately.
 *
 * @category   Kumbia
 * @package    Core
 * @copyright  Copyright (c) 2005-2015 Kumbia Team (http://www.kumbiaphp.com)
 * @license    http://wiki.kumbiaphp.com/Licencia     New BSD License
 */

/**
 * Utilidades para uso general del framework
 *
 * Manejo de cadenas de caracteres.
 * Conversión de parametros con nombre a arreglos.
 *
 * @category   Kumbia
 * @package    Core
 */
class Util
{

    /**
     * Convierte la cadena con espacios o guión bajo en notacion camelcase
     *
     * @param string $s cadena a convertir
     * @param boolean $lower indica si es lower camelcase
     * @return string
     * */
    public static function camelcase($s, $lower=FALSE)
    {
        // Notacion lowerCamelCase
        if ($lower) {
            return self::lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $s))));
        }

        return str_replace(' ', '', ucwords(str_replace('_', ' ', $s)));
    }

    /**
     * Descameliza una cadena camelizada y la convierte a smallcase
     * @deprecated mejor usar el metodo smallcase directamente
     *
     * @param string $s
     * @return string
     */
    public static function uncamelize($str)
    {
        return self::smallcase($str);
    }

    /**
     * Convierte la cadena CamelCase en notacion smallcase
     * @param string $s cadena a convertir
     * @return string
     * */
    public static function smallcase($s)
    {
        return strtolower(preg_replace('/([A-Z])/', "_\\1", self::lcfirst($s)));
    }

    /**
     * Remplaza en la cadena los espacios por guiónes bajos (underscores)
     * @param string $s
     * @return string
     * */
    public static function underscore($s)
    {
        return strtr($s, ' ', '_');
    }

    /**
     * Remplaza en la cadena los espacios por dash (guiones)
     * @param string $s
     * @return string
     */
    public static function dash($s)
    {
        return strtr($s, ' ', '-');
    }

    /**
     * Remplaza en una cadena los underscore o dashed por espacios
     * @param string $s
     * @return string
     */
    public static function humanize($s)
    {
        return strtr($s, '_-', '  ');
    }

    /**
     * Merge Two Arrays Overwriting Values $a1
     * from $a2
     * @deprecated
     *
     * @param array $a1
     * @param array $a2
     * @return array
     */
    public static function array_merge_overwrite($a1, $a2)
    {
        return $a2 + $a1;
    }

    /**
     * Insertar para arrays númericos
     * @deprecated No es necesario
     *
     * @param array &$array array donde se insertará (por referencia)
     * @param int $position Indice donde se realizara la insercion
     * @param mixed $insert Valor a insertar
     * */
    public static function array_insert(&$array, $position, $insert)
    {
        array_splice($array, $position, 0, $insert);
    }

    /**
     * Convierte los parametros de una funcion o metodo de parametros por nombre a un array
     *
     * @param array $params
     * @return array
     */
    public static function getParams($params)
    {
        $data = array();
        foreach ($params as $p) {
            if (is_string($p)) {
                $match = explode(': ', $p, 2);
                if (isset($match[1])) {
                    $data[$match[0]] = $match[1];
                } else {
                    $data[] = $p;
                }
            } else {
                $data[] = $p;
            }
        }
        return $data;
    }

    /**
     * Recibe una cadena como: item1,item2,item3 y retorna una como: "item1","item2","item3".
     *
     * @param string $lista Cadena con Items separados por comas (,).
     * @return string Cadena con Items encerrados en doblecomillas y separados por comas (,).
     */
    public static function encomillar($lista)
    {
        $items = explode(',', $lista);
        return '"' . implode('","', $items) . '"';
    }

    /**
     * Crea un path.
     * @deprecated
     * @todo Mover este método a una lib para manejo de ficheros.
     * En salir la beta2 se eliminará del Util
     *
     * @param string $path ruta a crear
     * @return boolean
     */
    public static function mkpath($path)
    {
        if (file_exists($path) or @mkdir($path))
            return TRUE;
        return (self::mkpath(dirname($path)) and mkdir($path));
    }

    /**
     * Elimina un directorio.
     * @deprecated
     * @todo Mover este método a una lib para manejo de ficheros.
     * En salir la beta2 se eliminará del Util
     *
     * @param string $dir ruta de directorio a eliminar
     * @return boolean
     */
    public static function removedir($dir)
    {
        // Obtengo los archivos en el directorio a eliminar
        if ($files = array_merge(glob("$dir/*"), glob("$dir/.*"))) {
            // Elimino cada subdirectorio o archivo
            foreach ($files as $file) {
                // Si no son los directorios "." o ".."
                if (!preg_match("/^.*\/?[\.]{1,2}$/", $file)) {
                    if (is_dir($file)) {
                        return self::removedir($file);
                    } elseif (!@unlink($file)) {
                        return FALSE;
                    }
                }
            }
        }
        return @rmdir($dir);
    }

    /**
     * Coloca la primera letra en minuscula
     *
     * @param string $s cadena a convertir
     * @return string
     */
    public static function lcfirst($s)
    {
        $s[0] = strtolower($s[0]);
        return $s;
    }

    /**
    * calcula dias de diferencia entre dos fechas
    */
    public static function calcularDiasDiferencia($fecha1,$fecha2){

        $fecha1_ = explode("-",$fecha1);
        $fecha2_ = explode("-",$fecha2);

        $ano1 = $fecha1_[0]; 
        $mes1 = $fecha1_[1]; 
        $dia1 = $fecha1_[2]; 

        $ano2 = $fecha2_[0]; 
        $mes2 = $fecha2_[1]; 
        $dia2 = $fecha2_[2]; 

       

        //calculo timestam de las dos fechas 
        $timestamp1 = mktime(0,0,0,$mes1,$dia1,$ano1); 
        $timestamp2 = mktime(4,12,0,$mes2,$dia2,$ano2); 

        //resto a una fecha la otra 
        $segundos_diferencia = $timestamp1 - $timestamp2; 
        //echo $segundos_diferencia; 

        //convierto segundos en días 
        $dias_diferencia = $segundos_diferencia / (60 * 60 * 24); 

        //obtengo el valor absoulto de los días (quito el posible signo negativo) 
        $dias_diferencia = abs($dias_diferencia); 

        //quito los decimales a los días de diferencia 
        $dias_diferencia = floor($dias_diferencia); 

        return $dias_diferencia; 
    }
    public static function sumarDiasAFecha($fecha, $cantidad_dias_suma = 1){
        $fecha = date_create($fecha);
        date_add($fecha, date_interval_create_from_date_string($cantidad_dias_suma.' days'));
        return date_format($fecha, 'Y-m-d');
    }
    public static function fecha1MayorQueFecha2($fecha1,$fecha2){
        $fecha1=strtotime($fecha1);
        $fecha2=strtotime($fecha2);
        return $fecha1 > $fecha2;
    }
    public static function pre($p){
        echo "<pre>";
        print_r(json_decode(json_encode($p)));
        echo "</pre>";
    }
}
