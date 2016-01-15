Landscape WordPress Theme. Developed and designed by [Diverse Themes](https://diversethemes.com). [Release page](https://diversethemes.com/premium-themes/landscape/).

![Landscape Screenshot](https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Adams_The_Tetons_and_the_Snake_River.jpg/959px-Adams_The_Tetons_and_the_Snake_River.jpg)

## License and Credit

Landscape is a responsive, single column, WordPress theme for personal blogs and business sites.

Landscape,  like WordPress, is licensed under the GPL.

Font icons by [Automattic](http://automattic.com) are GPL licensed and can be found at [Genericons.com](http://genericons.com).

Header image by Ansel Adams and is licensed under the Public Domain:
https://en.wikipedia.org/wiki/File:Adams_The_Tetons_and_the_Snake_River.jpg


## Theme Installation

 - Log in to your WordPress Dashboard.
 - Select the Appearance panel, then Themes.
 - Select Add New.
 - Click the Upload Theme button.
 - Find the .zip file you downloaded after purchasing directly or from Creative Market after purchasing Residence.
 - Install, then activate.

## Homepage Setup

Create a page called ```'Home'```. Choose ```'Homepage Template'``` as the page template. For your content, we recommend a single paragraph describing your site. Publish your new page that you created.

Create a page called ```'Blog'```. No content or page templates needed. Just the title and publish the page.

In your WordPress dashboard go to your ```Settings > Reading > Select 'Static Page'``` and choose your ```'Home'``` page as the Front page and choose your ```'Blog'``` page as your Posts page.

Then go to ```Appearance > Customize > Landscape Options```. From here you can choose your featured pages that display on the homepage. Be sure to save and publish your changes. The pages you choose to be featured supports featured images.


## Social Media Setup

To setup your social links menu. Log in to your WordPress Dashboard. Go to Appearance Menus Create a new menu Name it social Check 'Social' under theme location. Finally, add custom links to your menu. Be sure to click the 'Save Menu' button to save your menu. Residence supports most social networks.


## Need premium support?

Become a member today at [Diverse Themes](https://diversethemes.com/pricing).


## Editing Landscape

# Pre-Installation

Basic knowledge of the command line and the following dependencies are required to use Landscape:

- Node ([http://nodejs.org/](http://nodejs.org/))
- Ruby ([http://rubyinstaller.org/](http://rubyinstaller.org/))
- Grunt CLI ([http://gruntjs.com/](http://gruntjs.com/)) - `npm install -g grunt-cli`
- Bower ([http://bower.io/](http://bower.io/)) - `npm install -g bower`
- Sass ([http://sass-lang.com/](http://sass-lang.com/install)) - `gem install sass`

# Installation

## Manual Installation

##### 1) Navigate to the /themes folder of your project
`cd /your-project/wordpress/wp-content/themes`

##### 2) Install Grunt and Dependencies
- Run `npm install && bower install` from the command line to install Grunt and pull down any dependencies via Bower.

Now you can begin using Grunt.

# Usage
After you've installed Landscape, and run `npm install && bower install` from the command line you can start using grunt.

## Grunt

##### 1) Navigate to your new theme
`cd /your-project/wordpress/wp-content/themes/your-new-theme`

##### 2) Grunt tasks available:

`grunt watch` - Automatically handle changes to CSS, javascript, and image sprites

`grunt javascript` - Concatenate and minify javascript files

`grunt styles` - Comb, compile, prefix, combine media queries, and minify CSS files

`grunt imageminnewer` - Minify images

`grunt sprites` - Generate image sprites and the associated CSS

`grunt i18n` - Generate a translation file

`grunt` - Do it all once!
