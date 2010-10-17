<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pdf
 *
 * @author erick
 */
class Controller_Pdf extends Controller {

    public function action_constancia_residencia()
    {
	if ($_GET != NULL)
	{
	    $this->request->response = View::factory("pdf/constancia_residencia")
			    ->set("ciudad", Model_Globales::$ciudad)
			    ->set("estado", Model_Globales::$estado)
			    ->set("nombre_consejo", Model_Globales::$nombre_consejo)
			    ->set("dia", date("d"))
			    ->set("mes", Model_Globales::hacer_mes(date("m")))
			    ->set("anio", date("Y"))
			    ->set("destinatario", $_GET['dest'])
			    ->set("solicitante", new Model_Persona($_GET['s']))
			    ->set("testigo_a", new Model_Persona($_GET['a']))
			    ->set("testigo_b", new Model_Persona($_GET['b']))
			    ->set("encargado_constancia", Model_Globales::$enc_const_resid);
	}
    }

}

?>
