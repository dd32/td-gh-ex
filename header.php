<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<?php wp_head(); ?> 
</head>
<body  <?php body_class(); ?>>

    <header id="header">
        <div class="wrap">
            <h1 id="logo"><a href="<?php echo esc_url(home_url('/')); ?>"><span style=" color:#00caf2;"><?php bloginfo('name'); ?></span></a></h1>
            <nav class="header-nav">
                <button type="button" id="header-nav-btn"><i class="icon-menu"></i><i class="icon-cross"></i></button>
                <!-- Mobile button -->
                <ul>
                    <li class="active">
                        <a href="/">Home</a>
                        <ul class="sub-menu">
                            <li class="active"><a href="/">Home P</a></li>
                            <li><a href="/">Home a</a></li>
                        </ul>
                    </li>
                    <li><a href="/product/pricing/">pricing</a></li>
                    <li><a href="/customers/">customers</a></li>
                    <li><a href="/app/">App</a></li>
                    <li>
                        <a href="/">resources</a>
                        <ul class="sub-menu">
                            <li><a href="/">example</a></li>
                            <li><a href="/">Blog</a>
                        </ul>
                    </li>
                    <li class="btn register"><a href="/">register</a></li>
                    <li class="btn"><a href="/">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>