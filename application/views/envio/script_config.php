<?php defined('SYSPATH') or die('No direct script access.') ?>
<?php echo HTML::script("media/js/openwysiwyg/scripts/wysiwyg.js") ?>
<?php echo HTML::script("media/js/openwysiwyg/scripts/wysiwyg.js") ?>

<script type="text/javascript" language="javascript">

    /*
     * Full featured setup used the openImageLibrary addon
     */

    //
    // OJO cuando se cambie el servidor hay que modificar la direccion
    // donde se consiguen las imagenes en
    //
    // addons/imagelibrary/config.inc.php
    //
<?php $media_dir = URL::site("media/js/openwysiwyg") ?>
    var personalizado = new WYSIWYG.Settings();
    personalizado.ImagesDir = "<?php echo $media_dir ?>/images/";
    personalizado.PopupsDir = "<?php echo $media_dir ?>/popups/";
    personalizado.CSSFile = "<?php echo $media_dir ?>/styles/wysiwyg.css";

    personalizado.Width = "100%";
    personalizado.Height = "250px";
    // customize toolbar buttons
    //personalizado.removeToolbarElement("save");
    // openImageLibrary addon implementation
    personalizado.ImagePopupFile = "<?php echo $media_dir ?>/addons/imagelibrary/insert_image.php";
    personalizado.ImagePopupWidth = 600;
    personalizado.ImagePopupHeight = 245;
</script>
