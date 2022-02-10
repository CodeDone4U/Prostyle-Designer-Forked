<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Prostyle_Designer
 * @subpackage Prostyle_Designer/admin/partials
 */
?>
<?php
$src = PROSTYLE_APP;
?>
<style>
    div#page-init .col-6 {
        width: 47%;
        float: left;
        padding: 15px;
    }

    div#page-init iframe {
        min-width: 100%;
        height: 80vh;
    }
</style>
<div id="page-init" class="container">
    <div class="row">
        <div class="col-6">
            <h1>Prostyle Designer </h1>
            <p>
                v1.5.5 
            </p>
            <p>
                Thank you for using this plugin as part of your business.
                I am available to help if needed on whatsapp. +34 654 21 56 94
            </p>
            <p>
                <b>CHANGELOG</b><br>
                - Added app in admin panel for easy product creation and testing.
            </p>
            <p>
                <b>UPCOMING UPDATES</b><br>
                - Add Name & Number to product title <br>
                - Add Templates<br>
                - Add Fonts <br>
            </p>

        </div>
        <div class="col-6">
            <iframe src="<?php echo $src; ?>" scrolling="auto"></iframe>
        </div>
    </div>
</div>

