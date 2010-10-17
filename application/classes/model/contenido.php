<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of envios_categoria
 *
 * @author erick
 */
class Model_Contenido extends ORM {

    protected $_has_one = array(
	"envios" => array(),
	"categorias" => array(),
    );

}

?>
