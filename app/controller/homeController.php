<?php

Class homeController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function home()
    {
        // Chargement de la home
        define("TITLE_FOR_LAYOUT", "Archi");
        $this->load->view('page/index.php');
    }
}