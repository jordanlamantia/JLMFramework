<?php

class CoreController extends Core
{
    public $load;
    public $model;

    public function __construct()
    {
        $this->load = new CoreView();

        // Récupération de l'action ou action par défaut
        if (isset($_GET["action"])) {
            $action = $_GET['action'];
        } else {
            $action = ACTION_DEFAUT;
        }

        // Appel de la méthode ou de la vue 404
        if (method_exists($this, $action)) {
            $this->$action();
        } else {
            // Sinon appelle la page 404
            define("TITLE_FOR_LAYOUT", "ERROR 404");
            $this->load->view('404.php');
        }
    }

    public function coreSetError()
    {

    }

    public function coreGetError($param)
    {
        //include_once('lib/messages_error.php');

    }
}