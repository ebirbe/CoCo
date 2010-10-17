<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of global
 *
 * @author erick
 */
class Model_Globales extends Model {

    /**
     * Datos del Consejo comunal
     *
     * @var <type>
     */
    public static $nombre_consejo = "Consejo Comunal Ca&ntilde;a de Azucar";
    public static $ciudad = "Maracay";
    public static $estado = "Aragua";
    /**
     * Nombre y apellido del Encargado de firmar las constancias de residencia
     *
     * @var string
     */
    public static $enc_const_resid = "Pedro Jose Diaz Hernandez";

    public static function hacer_mes($mes)
    {
	switch ($mes)
	{
	    case 1: return "Enero";
		break;
	    case 2: return "Febrero";
		break;
	    case 3: return "Marzo";
		break;
	    case 4: return "Abril";
		break;
	    case 5: return "Mayo";
		break;
	    case 6: return "Junio";
		break;
	    case 7: return "Julio";
		break;
	    case 8: return "Agosto";
		break;
	    case 9: return "Septiembre";
		break;
	    case 10: return "Octubre";
		break;
	    case 11: return "Noviembre";
		break;
	    case 12: return "Diciembre";
		break;
	}
    }

}

?>
