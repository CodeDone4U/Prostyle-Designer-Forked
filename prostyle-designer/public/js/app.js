// Preloader
$('body').append('<div style="" id="loadingDiv"><div class="loader"><img src="../img/logod.png" /></div></div>');
$(window).on('load', function () {
    setTimeout(removeLoader, 3000);
});

var testing = '/prostyle/api/';
var live = '/api/';

// Show any element
function show(element) {
    var control = document.getElementById(element);
    control.style.display = 'block';
}

// Show any element
function hide(element) {
    var control = document.getElementById(element);
    control.style.display = 'none';
}

function login() {
    $("#start").fadeOut(500, function () {
        show('login');
        //show('app');
    });
}

function register() {
    $("#start").fadeOut(500, function () {
        show('register');
        //show('app');
    });
}

function guest() {
    $("#start").fadeOut(500, function () {
        show_app();
    });
}

function show_app() {
    show('app_header');
    show('app');
    show('footer');
}

function hide_app() {
    hide('app_header');
    hide('app');
    hide('footer');
}


function removeLoader() {
    $("#loadingDiv").fadeOut(500, function () {

        $("#loadingDiv").remove();
        //show('start');
        show_app();
    });
}



function update_template(template, color) {
    var name = document.getElementById('name');
    var numbers = document.getElementById('numbers');
    var control = document.getElementById('capture');
    var text_control = document.getElementById('top');
    var number_control = document.getElementById('number_entered');
    name.style.color = color;
    numbers.style.color = color;
    text_control.innerHTML = "Great!<br><br>";
    control.style.background = 'url(' + template + ')';
    hide('template_input');
    show('number_input');
    hide('default_templates');
    number_control.focus();

}

function updated_numbers() {
    var number_entered = document.getElementById('number_entered').value;
    var control = document.getElementById('numbers');
    var text_control = document.getElementById('top');
    text_control.innerHTML = "Perfect!<br><br>";
    control.innerHTML = number_entered;

    hide('number_input');
    show('name_input');
    hide('user_number');

    $('#numbers').freetrans('controls', true);
}

function updated_name() {
    var entered = document.getElementById('name_entered').value;
    var control = document.getElementById('name');
    var text_control = document.getElementById('top');
    text_control.innerHTML = "Nice!<br><br>";
    control.innerHTML = entered;

    hide('name_input');
    show('preview');
    hide('user_name');
    $('#name').freetrans('controls', true);
}

function save() {
    $('#numbers').freetrans('controls', false);
    $('#name').freetrans('controls', false);
    export_image();
}

function export_image() {
    var target = $('#capture')[0];
    html2canvas(target).then(canvas => {
        var image = canvas.toDataURL('image/png');
        var src = {image: image}
        $.post(location.origin + live, src, function (data, status) { 
            console.log(status);
            var product = data;
            var button = document.getElementById('goto_product');
            button.href = product;
            
            hide_app();
            show('product_options');
        });

    });

}
