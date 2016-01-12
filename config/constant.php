<?php

// Nom de la session
define("SESSION_NAME", "SESSION_VOLUNTEERS");

// Choix du serveur DEV/TEST/PROD
define('SERVER', 'LOCAL');

// Constantes générales d'URL
//define('BASE_HOME', '<base href="http://localhost:8888/3ADEV/Volunteers/">');
define('MODULE_DEFAUT', 'Home');
define('ACTION_DEFAUT', 'home');

// PATH (Chemins)
define('PATH_1', 'path/');
define('PATH_2', 'path/');

// Gestion de l'environnement du serveur
if(SERVER === 'LOCAL') {
    /**
     * Constantes spécifiques pour config serveur de dev
     */
    define('DEBUG', true);
    define('BASE_HOME', '<base href="http://localhost:8888/3ADEV/Volunteers/">');
    /**
     * Constantes de Base de Données
     */
    define('DB_DNS',      'mysql:host=ns366377.ovh.net;dbname=la_mantia');
    define('DB_USERNAME', 'la_mantia');
    define('DB_PASSWORD', '669763');
    define('DB_CHARSET', 'utf8');
    define('DB_PREFIX', 'vol_');

}
else if(SERVER === 'DEV') {
    /**
     * Constantes spécifiques pour config serveur de dev
     */
    define('DEBUG', true);
    define('BASE_HOME', '<base href="http://sabates.etudiant-eemi.com/perso/volunteers/dev/">');
    /**
     * Constantes de Base de Données
     */
    define('DB_DNS',      'mysql:host=localhost;dbname=sabates');
    define('DB_USERNAME', 'sabates');
    define('DB_PASSWORD', '564426');
    define('DB_CHARSET', 'utf8');
    define('DB_PREFIX', 'vol_');

}
else if(SERVER === 'TEST') {
    /**
     * Constantes spécifiques pour config serveur de test
     */
    define('DEBUG', true);
    define('BASE_HOME', '<base href="http://sabates.etudiant-eemi.com/perso/volunteers/test/">');
    /**
     * Constantes de Base de Données
     */
    define('DB_DNS',      'mysql:host=localhost;dbname=vanwelde');
    define('DB_USERNAME', 'vanwelde');
    define('DB_PASSWORD', '282814');
    define('DB_CHARSET', 'utf8');
    define('DB_PREFIX', 'vol_');
}
else if(SERVER === 'PROD') {
    /**
     * Constantes spécifiques pour config serveur de prod
     */
    define('DEBUG', false);
    define('BASE_HOME', '<base href="http://sabates.etudiant-eemi.com/perso/volunteers/prod/">');
    /**
     * Constantes de Base de Données
     */
    define('DB_DNS',      'mysql:host=localhost;dbname=sabates');
    define('DB_USERNAME', 'sabates');
    define('DB_PASSWORD', '564426');
    define('DB_CHARSET', 'utf8');
    define('DB_PREFIX', 'vol_');
}