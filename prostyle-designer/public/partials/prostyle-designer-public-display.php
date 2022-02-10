<?php
/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://llaveros.shop
 * @since      1.0.0
 *
 * @package    Prostyle_Designer
 * @subpackage Prostyle_Designer/public/partials
 */
?>
<?php
$endpoint = 'db.php';
if (file_exists($endpoint)):
    include($endpoint);
else:
    die('404 Error');
endif;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <title>Prostyle Designer v1.5.1</title>
        <title>ProRings</title>
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
              rel="stylesheet"/>
        <!-- Core theme CSS (includes Bootstrap)-->

        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" rel="stylesheet">
        <!-- Nucleo Icons -->
        <link rel="stylesheet" href="../css/jquery.freetrans.css">
        <link  rel="stylesheet" href="../css/prostyle-designer-public.css" />
    </head>
    <body class="bg-dark">
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v12.0&appId=1041594269680234&autoLogAppEvents=1" nonce="mbEepuh3"></script>
        <!--  APP HEADER -->
        <header id="app_header" class="container pad-tb-sm hide">
            <div class="row">
                <div class="col-8 text-left">
                    Prostyle Designer v1.5.1
                </div>
                <div class="col-4 text-right">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </header>
        <!--  start -->
        <section id="start" class="container pad-tb-lrg hide">
            <div class="row">
                <div onclick="login()" class="col text-center pad-tb-sm">
                    <i class="fas fa-user-shield pad-tb-sm"></i>
                    <br>Login
                </div>
            </div>
            <div class="row">
                <div onclick="register()" class="col text-center pad-tb-sm">
                    <i class="fas fa-user-plus pad-tb-sm"></i>
                    <br>
                    Register
                </div>
            </div>
            <div class="row">
                <div onclick="guest()" class="col text-center pad-tb-sm">
                    <i class="fas fa-user-secret pad-tb-sm lrg"></i>
                    <br>
                    Continue as Guest
                </div>
            </div>
        </section>
        <!--  login -->
        <section id="login" class="container pad-tb-lrg hide">
            <div class="row">
                <div class="col text-center pad-tb-sm">
                    <i class="fas fa-user-shield pad-tb-sm lrg"></i><br>
                    <input class="margin-b15 text-center" type="text" placeholder="Email" /><br>
                    <input class="margin-b15 text-center" type="password" placeholder="Password" />
                    <br>or<br><br>
                    <span class="fb-login-button" data-width="" data-size="medium" data-button-type="login_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false"></span>
                </div>
            </div>
        </section>
        <!--  register -->
        <section id="register" class="container pad-tb-lrg hide">
            <div class="row">
                <div class="col text-center pad-tb-sm">
                    <i class="fas fa-user-shield pad-tb-sm lrg"></i><br>
                    <input class="margin-b15 text-center" type="text" placeholder="Email" /><br>
                    <input class="margin-b15 text-center" type="password" placeholder="Password" /><br>
                    <input class="margin-b15 text-center" type="password" placeholder="Confirm Password" /><br>
                    <a href="#" class="margin-b15 btn btn-primary text-center">Register</a>
                    <br>or<br><br>
                    <span class="fb-login-button" data-width="" data-size="medium" data-button-type="login_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false"></span>
                </div>
            </div>
        </section>
        <!--  APP -->
        <section id="app" class="container hide">
            <div class="row">
                <div class="col">
                    <div id="top" class="text-center">

                    </div>
                </div>
            </div>
            <!--  Realtime preview -->
            <div class="row">
                <div class="col">
                    <div id="capture" style="padding: 30px;">
                        <div id="selected_template">
                            <h4 id="numbers" class="trans"></h4>
                            <h5 id="name" class="trans"></h5>
                        </div>
                    </div>
                </div>
            </div>
            <!--  Controls -->
            <div class="row hide">
                <div class="col hide">
                    <div id="editor" class="text-center">
                        <a id="template_input" onclick="show('default_templates')" class="btn btn-primary controls hide" href="#">Choose Template</a>
                        <a id="name_input" onclick="show('user_name')" class="btn btn-primary controls hide" href="#">Enter Name</a>
                        <a id="number_input" onclick="show('user_number')" class="btn btn-primary controls hide" href="#">Enter Number</a>
                        <a id="preview" onclick="export_image('capture')" class="btn btn-primary controls hide" href="#">Continue</a>
                    </div>
                </div>
            </div>

            <!--  Actual Image -->
            <div class="row">
                <div class="col">
                    <div id="preview">

                    </div>
                </div>
            </div>
        </section>
        <!--  Controls -->
        <section id="footer" class=" hide">
            <div class="row">
                <div class="col">
                    <div id="preview">
                        <i onclick="show('default_templates')" class="far fa-images"></i>
                        <i onclick="show('user_number')" class="fas fa-sort-numeric-down"></i>
                        <i onclick="show('user_name')" class="fas fa-font"></i>
                        <i onclick="save();" class="far fa-save"></i>
                    </div>
                </div>
            </div>
        </section>

        <!--  Gallery -->
        <section id="default_templates" class="container hide">
            <div class="row text-right">
                <i class="fas fa-times"></i>
            </div>
            <div class="row">
                <div class="col">
                    <div id="templates" class="text-center">
                        <div class="row">
                            <div class="col text-left">
                                <?php echo count($templates); ?> Templates to choose from.
                            </div>
                        </div>
                        <!-- Loop thru templates-->
                        <?php foreach ($templates as $template): ?>
                            <div class="row template-row">
                                <div class="col">
                                    <img onclick="update_template(this.src, '<?php echo $template['color']; ?>')" class="template" src="../img/templates/<?php echo $template['image']; ?>" />
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>


        <!--  Number Input -->
        <section id="user_number" class="container hide">
            <div class="row text-right">
                <i class="fas fa-times"></i>
            </div>
            <div class="row">
                <div class="col">
                    <div id="templates" class="text-center">
                        <div class="row">
                            <div class="col">
                                <h2 class="">Number</h2>
                                <p class="">Add a custom number to the template.</p>
                            </div>
                        </div>

                        <div class="row template-row">
                            <div class="col">
                                <input class="text-center" id="number_entered" type="number" placeholder="00" />
                                <a href="#" onclick="updated_numbers()" class="btn btn-primary" id="numberButton">Continue</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--  Name Input -->
        <section id="user_name" class="container hide">
            <div class="row text-right">
                <i class="fas fa-times"></i>
            </div>
            <div class="row">
                <div class="col">
                    <div id="templates" class="text-center">
                        <div class="row">
                            <div class="col">
                                <h2 class="">Name</h2>
                                <p class="">Add a custom name to the template.</p>
                            </div>
                        </div>

                        <div class="row template-row">
                            <div class="col">
                                <input class="text-center" id="name_entered" type="text" placeholder="" />
                                <a href="#" onclick="updated_name()" class="btn btn-primary" id="nameButton">Continue</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--  Product Options -->
        <section id="product_options" class="container hide">
            <div class="row text-right">
                <i class="fas fa-times"></i>
            </div>
            <div class="row">
                <div class="col">
                    <div id="templates" class="text-center">
                        <div class="row">
                            <div class="col">
                                <h2 class="">Complete</h2>
                                <p class="">Your item is now available for purchase.</p>
                            </div>
                        </div>

                        <div class="row template-row">
                            <div class="col">
                                <a id="goto_product" target="_blank" href="#" class="btn btn-primary" id="nameButton">Order</a>
                                <a id="goto_share" target="_blank" href="#" class="btn btn-primary" id="nameButton">Share</a>
                                <a id="goto_save" target="_blank" href="#" class="btn btn-primary" id="nameButton">Save</a>
                                <a id="goto_adjust" target="_blank" href="#" class="btn btn-primary" id="nameButton">Adjust</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script type="text/javascript" src="../js/Matrix.js"></script>
        <script type="text/javascript" src="../js/jquery.freetrans.js"></script>
        <script type="text/javascript" src="../js/html2canvas.min.js"></script>
        <script type="text/javascript" src="../js/app.js"></script>
    </body>
</html>

