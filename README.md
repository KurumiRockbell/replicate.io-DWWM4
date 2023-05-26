![Replicate Logo](https://i.ibb.co/Vj4h8RJ/type-master-1-V3-TYPE.png)
Une approche MVC simple construite avec PHP8.



Notice d'installation du package PHP :
--------

1. Créez un domaine virtuel apache pointant vers un dossier local de vote disque dur.

2. Ajoutez votre domaine factice dans votre fichier hosts (c:\windows\system32\drivers\etc\hosts ou /etc/hosts).

3. Clonez le package Replicate.io avec la command : 
<code>git clone https://github.com/KurumiRockbell/replicate.io-DWWM4</code>.

4. Importez la base de données qui se trouve dans le dossier /public/assets/src/SQL en utilisant un outil de gestion de bases de données tel que phpMyAdmin. 

5. Éditez le fichier de configuration /conf/app.json pour paramétrer l'accès à la base de données. Il suffit de modifier les informations de votre serveur de base de données et les informations de connexion appropriées. Si vous avez choisi d'utiliser la base de données northwind, modifiez les paramètres de connexion pour correspondre à votre propre installation de la base de données.

6. Éditez le fichier de configuration /conf/app.json pour paramétrer votre domaine et votre url complète (originating_url) et votre clé d'encryptage (hmacData : 42 caractères conseillés).

7. Compilez les fichiers JS et générez la documentation de vos classes depuis le dossier /scripts/*.vbs ou *.sh.


Le package Replicate.io est maintenant installé et prêt à être utilisé. Il vous permettra de créer des interfaces utilisateur avancées pour votre application en utilisant une structure MVC (Modèle-Vue-Contrôleur).
