# Backdrop Core: A WordPress Framework
Backdrop Core is a framework for developing WordPress Themes.

The main objective of this Backdrop Core is build a theme with its finest tools that you can use.

## Requirements
- WordPress 5.0 or higher
- PHP 5.6 or higher ( PHP 7.0 or higher is recommended )
- Composer ( PSR-4 Autoload )

## Documentations
The documentations is under construction and will be available when I finished writing up everything I need.

## Installation
Since Backdrop uses composer, we will use composer to install the framework inside of the directory you are working with.

<pre>
composer require benlumia007/backdrop-core
</pre>

The next step is to add the autload to your functions.php within your working directory.

<pre>
if ( file_exists( get_parent_theme_file_path( 'vendor/autoload.php' ) ) ) {
	require_once( get_parent_theme_file_path( 'vendor/autoload.php' ) );
}
</pre>