# JLMFramework
My personal MVC framework.

# Description
Cette architecture est composé d'un dossier principale nommé [votre nom de projet], ce dossier contient différents fichiers, gitignore pour ignoré les fichiers sensibles du dépot git, .htaccess pour la configuration de la réecriture d'URL, index.php qui est le controleur principale de l'application ainsi que le readme, ce dossier app contient plusieurs sous dossier :

App : Ce dossier contient les élements nécessaire au fonctionnement de l'application, trois fichiers, app.php qui est le controleur secondaire qui permet la redirection automatique vers le bon controller lorsqu'on appel une fonction, AppController.php qui contient les différents élements de contrôles commun à l'application entière et le fichier AppModel.php qui contient les différents fonctions qui peuvent s'appliqué à l'ensemble du site. Ce dossier contient également deux sous dossiers, le dossier controller qui contient tout les différents controller de l'application ainsi que le dossier model qui contiendra tout les différents model de l'application.
Assets : Ce dossier contient tout les élements nécessaire au design du site, tel que les fichiers css ou encore js.
Config : Ce dossier contient les différents fichiers nécessaire à la configuration du site.
Core : Ce dossier contient tout les fichiers de core, ces fichiers servent au bon fonctionnement du site web, ils sont les premiers fchiers appeler dans le controleur principale, les dossiers présent dans app hérite du CoreController et du CoreModel.
Lib : Ce dossier contient les différentes fonctions précedemment codé.
Views : Ce dossier contient les différentes vue du site web, chaque vue est rangé dans un sous dossiers qui correspond au nom de la fonctionnalité ou de la page développer.
