<!doctype html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('«', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="container">
    <header>
        <div class="nav-field">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6">
                    <nav class="navbar-header">
                        <?= wp_nav_menu(array('menu' => 'nav-menu', 'menu_class' => 'nav-menu')); ?>
                    </nav>
                    <div id="sliding-menu"></div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-6">
                    <div class="register-box">
                        <div class="cart" onclick="location.href = '<?= get_permalink( wc_get_page_id( 'cart' ) ); ?>'">
                            <div class="cart_count"><?php echo WC()->cart->get_cart_contents_count(); ?></div>
                        </div>
                        <div class="buttons" id="reg-buttons">
                            <button class="cd-signin" onclick="location.href = ''">вход</button>
                            <button class="cd-signup" onclick="location.href = ''">регистрация</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-circle">
            <p>авторские селекционные формы и сорта винограда</p>
        </div>
    </header>