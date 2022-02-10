<?php
/**
 * Provide a public-facing app
 *
 *
 * @link       https://llaveros.shop
 * @since      1.0.0
 *
 * @package    Prostyle_Designer
 * @subpackage Prostyle_Designer/public/partials
 */
?>
<?php
$src = PROSTYLE_APP;
?>
<style>
    section#prostyle_designer_app {
        position: fixed;
        top: 0;
        left: 0;
        min-width: 100%;
        height: 100vh;
        background: #333;
        z-index: 900000;
        margin-top: 0;
    }
    section#prostyle_designer_app iframe {
        border: none;
        width:100%;
        height:100vh
    }
</style>
<section id="prostyle_designer_app">
    <iframe src="<?php echo $src; ?>" scrolling="auto"></iframe>
</section>




