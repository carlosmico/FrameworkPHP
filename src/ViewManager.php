<?php
namespace App;
use Twig;

class ViewManager{
    private $twig;

    public function __construct(){
        //Configuramos en el loader la ruta de nuestras vistas
        $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__).'/templates');

        //Configuramos en el entorno la ruta de nuestra cache de pre-bindings de las vistas
        $this->twig = new \Twig\Environment($loader, [
            'cache'=>dirname(__DIR__).'/cache/views'
        ]);
    }

    public function render($view, $args=[]){
        //Si los parametros son diferentes de null los extraemos para setear a Twig
        if($args!=null){
            extract($args, EXTR_SKIP);
        }

        //Obtenemos la ruta completa de la vista
        $file = dirname(__DIR__).'/templates'.$view;

        //Comprobamos si existe el archivo
        if(is_readable($file)){
            require $file;
        }else{
            throw new \InvalidArgumentException();
        }
    }

    public function renderTemplate($template, $args=[]){
        echo $this->twig->render($template, $args);
    }
}