<table border="0" width="100%">
    <?php
    $i = 0;
    foreach ($imagenes as $img)
    {
	if ($i == 0)
	{
	    echo "<tr>";
	}
    ?>
    <td>
	<?php echo HTML::image($img, array("width"=>"96", "height"=>"96")) ?>
    </td>
    <?php
	if ($i == 4)
	{
	    echo "</tr>";
	    $i = 0;
	}else{
	    $i++;
	}
    }
    ?>
</table>