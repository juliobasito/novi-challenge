# Slimstarter

A simple starter for php slim framework (demo available here: https://slimstarter.herokuapp.com).

## Dependencies
Install dependencies via composer
  
    composer install
    
Ubuntu/unix : http://sheebypanda.com/installer-composer-sur-ubuntu/
Windows: https://getcomposer.org/Composer-Setup.exe
    
## Organisation

Router + controllers are in index.php, you can decouple it and organize it better.

Models are in models folder, you must require them in index.php.

Views are un views folder, there are folders for each concerns. Views templates are required in each controller, you can use a template system like twig.

## Layout

Using slim-layout-view for layout (reuse header and footer).

https://github.com/petebrowne/slim-layout-view

## Named routes

After each route block, there's a method "name". You can call thoses routes with urlFor (I pass the $app variable to the view with a hook). 
