<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of envio
 *
 * @author erick
 */
class Model_Categoria extends ORM {

    protected $_has_many = array(
	"envios" => array(
	    "through" => "envios_categorias"
	),
    );

}

?>
