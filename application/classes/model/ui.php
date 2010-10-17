<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ui
 *
 * @author erick
 */
class Model_Ui {

    private static function llenar_menu()
    {
	$menu[] = array(
	    "Noticias" => "seccion/noticias"
	);
	$menu[] = array(
	    "Actividades" => "seccion/actividades",
	);
	$menu[] = array(
	    "Historia" => "seccion/historia",
	);
	$menu[] = array(
	    "Proyectos" => "seccion/proyectos",
	);
	$menu[] = array(
	    "Educaci&oacute;n" => "seccion/educacion",
	);
	$menu[] = array(
	    "Actas" => "seccion/actas",
	);
	$menu[] = array(
	    "Solicitud" => "solicitud",
	);
	return $menu;
    }

    public static function hacer_menu_superior()
    {
	$html = "";

	foreach (Model_Ui::llenar_menu() as $item)
	{
	    foreach ($item as $nombre => $link)
	    {
		$html .= HTML::anchor($link, $nombre);
	    }
	}
	return $html;
    }

    public static function hacer_menu_lateral()
    {
	$html = "\n";

	foreach (Model_Ui::llenar_menu() as $item)
	{
	    foreach ($item as $nombre => $link)
	    {
		$html .= "<div class='no-color' onmouseover='colorear(this)' onmouseout='nocolorear(this)'>" . HTML::anchor($link, $nombre) . "</div>\n";
	    }
	}

	$html .= "\n";

	return $html;
    }

    public static function hacer_lo_mas_reciente()
    {
	$html = "\n";

	$env = Model_Envio::listar_envios(NULL, 5);
	foreach ($env as $item)
	{
	    if (strlen($item->titulo) > 25)
	    {
		$titulo = substr($item->titulo, 0, 25);
		$titulo .= "...";
	    }
	    else
	    {
		$titulo = $item->titulo;
	    }
	    $html .= "<div class='no-color' onmouseover='colorear(this)' onmouseout='nocolorear(this)'>" . HTML::anchor("noticia/ver/" . $item->id, $titulo) . "</div>\n";
	}

	$html .= "\n";

	return $html;
    }

}

?>
