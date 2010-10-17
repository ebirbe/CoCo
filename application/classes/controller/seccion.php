<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of seccion
 *
 * @author erick
 */
class Controller_Seccion extends Controller_Plantilla_General {

    public function action_noticias()
    {
	// Indicamos el titulo de la pagina
	$seccion = "Noticias";
	$this->set_titulo($seccion);
	$envios = Model_Envio::listar_envios($seccion);
	$resumenes = View::factory("envio/resumen")
			->set("envios", $envios->as_array());
	$this->contenido = View::factory("welcome")
			->set("vista_resumen", $resumenes);
    }
    public function action_actividades()
    {
	// Indicamos el titulo de la pagina
	$seccion = "Actividades";
	$this->set_titulo($seccion);
	$envios = Model_Envio::listar_envios($seccion);
	$resumenes = View::factory("envio/resumen")
			->set("envios", $envios->as_array());
	$this->contenido = View::factory("welcome")
			->set("vista_resumen", $resumenes);
    }

    public function action_historia()
    {
	// Indicamos el titulo de la pagina
	$seccion = "Historia";
	$this->set_titulo($seccion);
	$envios = Model_Envio::listar_envios($seccion);
	$resumenes = View::factory("envio/resumen")
			->set("envios", $envios->as_array());
	$this->contenido = View::factory("welcome")
			->set("vista_resumen", $resumenes);
    }
    public function action_proyectos()
    {
	// Indicamos el titulo de la pagina
	$seccion = "Proyectos";
	$envios = Model_Envio::listar_envios($seccion);
	$resumenes = View::factory("envio/resumen")
			->set("envios", $envios->as_array());
	$this->contenido = View::factory("welcome")
			->set("vista_resumen", $resumenes);
    }
    public function action_educacion()
    {
	// Indicamos el titulo de la pagina
	$seccion = "Educacion";
	$this->set_titulo($seccion);
	$envios = Model_Envio::listar_envios($seccion);
	$resumenes = View::factory("envio/resumen")
			->set("envios", $envios->as_array());
	$this->contenido = View::factory("welcome")
			->set("vista_resumen", $resumenes);
    }
    public function action_actas()
    {
	// Indicamos el titulo de la pagina
	$seccion = "Actas";
	$this->set_titulo($seccion);
	$envios = Model_Envio::listar_envios($seccion);
	$resumenes = View::factory("envio/resumen")
			->set("envios", $envios->as_array());
	$this->contenido = View::factory("welcome")
			->set("vista_resumen", $resumenes);
    }

}

?>
