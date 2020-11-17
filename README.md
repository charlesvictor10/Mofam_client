__Description du projet__

__*mofam*__ est une application e-commerce qui permet de référencer et centraliser les producteurs et transformateurs des denrées locales de la Casamance qui est une région abondante et par la même occasion de formaliser la chaîne logistique et les distributions aux clients.
  L'idée est d'amener la population à consommer plus facilement en local en ayant plus facilement une idée de ce qui est disponible par le biais de cette platerforme.
  Nous avons décidé d'étendre progressivement cela à l'ensemble du Sénégal en procédant par régions, type de produits et saisons.

__Pré-requis avant exécution__

__*Installez un serveur local sur son ordinateur.*__

Afin d'installer et configurer rapidement et sans difficulté un serveur web, un gestionnaire de bases de données MySQL et PHP sous Windows, existe parmi d'autres la solution tout-en-un WAMP (acronyme de «Windows-Apache-MySQL-PHP»).
  L'installation est réalisée sur un système Windows et la version la plus récente de WampServer disponible est la 3.2.0, comprenant principalement:
  *. Apache 2.4.41;
  *. MySQL 5.7.28|8.0.18;
  *. MariaDB 10.4.10|10.3.20;
  *. Adminer 4.7.5;
  *. PhpSysInfo 3.3.1;
  *. phpMyAdmin 4.9.2;
  *. PHP 5.6.40, 7.3.12, 7.4.0;

Pour l'installation merci de suivre les étapes suivantes:  

1. Téléchargez l'exécutable d'installation qui correspond à votre architecture (32 ou 64 bits) sur le site www.wampserver.com. (cliquez sur le menu «Télécharger»).
2. Les exécutables d'installation ainsi que de nombreux utilitaires sont également disponibles sur le site wampserver.aviatechno.net.
Exécutez-le.
3. La première chose à faire est de sélectionner la langue
4. Bien entendu, vous lisez les conditions d'utilisation (rapidement, quand même, car le titre de l'article dit «en cinq minutes chrono» !) et cochez que vous en comprenez les termes.
5. Vous lisez également les informations suivantes, qui sont intéressantes pour la prise en main future
  Vient ensuite le choix du répertoire d'installation
  NB: Évitez absolument les noms de répertoires avec espaces.
6. Pour éviter des problèmes de droits d’administration, il est également préférable d’installer WampServer à la racine d’un disque.
7. Le programme d'installation vous demande ensuite dans quel répertoire du menu Démarrer il doit créer les raccourcis
8. Un petit résumé avant installation : si tout est correct, cliquez sur «Installer».
9. Le programme d'installation vous demandera, en passant, quel navigateur sera utilisé par défaut par WampServer
  J'ai personnellement opté pour Google Chrome, donc j'ai répondu «Oui» puis j'ai navigué dans le système de fichiers jusqu'à trouver l'exécutable du navigateur 
10. Même genre de question pour l'éditeur de texte par défaut
11. À l'issue du processus d'installation, des conseils d'ordre général vous sont donnés ; il n'est pas inutile d'en prendre connaissance 
12. Et c'est terminé
  Vous disposez à présent d'un raccourci dans le menu de démarrage de Windows 

__*Exécution de WampServer*__

L'exécution de WampServer ne déclenche pas grand-chose de visible, tout au plus la console qui s'ouvre et se referme rapidement. Mais si vous regardez dans votre zone de notification, à droite de la barre des tâches, vous verrez une icône avec le logo de WampServer devenir verte. Laissez traîner votre souris sur cette icône : une info-bulle vous indique que tous les services sont lancés. Donc le raccourci vers WampServer sert à cela: démarrer tous les services de votre serveur web/MySQL.

L’icône est verte quand tous les services sont démarrés, rouge lorsqu’ils sont tous inactifs et orange lorsque seulement une partie d’entre eux sont démarrés.

Pour accéder à la page web d’accueil, vous devez démarrer votre navigateur et taper «localhost» dans la barre d'adresse.
  Revenez sur la page de configuration du serveur et cliquez sur phpMyAdmin. L'application phpMyAdmin sert à administrer les bases de données MySQL sur le serveur local (le «My» désigne MySQL – il existe ainsi, par exemple, phpPgAdmin pour PostgreSQL).

__Exécution de l'application__

__*Veuillez suivre les indications suivantes:*__
1. Téléchargez le fichier compressé mofam.zip
2. Décompressez le dans .../wamp/www/
3. Ouvrir phpMyAdmin et créer une nouvelle base de données nommée mofam
4. Importez le fichier mofam.sql dans la base de données créées
5. Sur votre navigateur tapez l'adresse localhost/mofam