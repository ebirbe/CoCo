<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Controlador de Inicio
 *
 * @author Erick Birbe
 */
class Controller_Welcome extends Controller_Plantilla_General {

    /**
     * Pagina de Inicio global de la web (index)
     */
    public function action_index()
    {
	// Indicamos el titulo de la pagina
	$this->set_titulo("Inicio");
	$envios = Model_Envio::listar_envios(NULL, 5);
	$resumenes = View::factory("envio/resumen")
			->set("envios", $envios->as_array());
	$this->contenido = View::factory("welcome")
			->set("vista_resumen", $resumenes);
    }

}

// End Welcome
