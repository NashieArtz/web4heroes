
#  Heros-SOS (Web4Heroes)

> **"Votre Sécurité, Notre Mission."**

**Heros-SOS** est une plateforme web communautaire déployée pour le **Rouen District**. Elle permet la mise en relation sécurisée entre les citoyens et les super-héros locaux afin d'assurer une réponse rapide aux incidents (attaques de vilains, catastrophes naturelles, etc.).

Ce projet a été développé "from scratch" avec une architecture **MVC (Modèle-Vue-Contrôleur)** en PHP 8.x, sans framework tiers.

---

## Fonctionnalités

Le projet respecte les spécifications du cahier des charges officiel :

### Espace Citoyen
* **Signalement d'incidents** : Formulaire géolocalisé pour déclarer des menaces en temps réel.
* **Suivi des dossiers** : Tableau de bord personnel pour voir l'état des incidents (Signalé, En cours, Résolu).
* **Interaction** : Possibilité de noter les super-héros et de commenter leurs interventions.

### Espace Super-Héros
* **Profil Public** : Page de profil personnalisable affichant la réputation, les statistiques et l'identité secrète (optionnelle).
* **Vidéothèque** : Gestion d'une liste de films favoris visible sur le profil (CRUD complet).
* **Gestion d'Intervention** : Prise en charge des incidents assignés.

### Espace Administrateur (Modération)
* **Tableau de Bord (KPIs)** : Vue d'ensemble des statistiques (Utilisateurs, Incidents actifs, Héros en attente).
* **Validation des Héros** : Workflow de validation pour les nouveaux comptes "Super-héros".
* **Gestion de Contenu** : Modération des commentaires, des incidents et des films ajoutés.
* **Newsletter** : Outil d'envoi de mails d'information aux abonnés.

---

## 🛠️ Stack Technique

* **Langage** : PHP 8.2+ (Typage strict activé `declare(strict_types=1);`).
* **Architecture** : MVC Custom (Router, Controller, Repository Pattern).
* **Base de Données** : MySQL / MariaDB.
* **Frontend** : HTML5, CSS3 (Variables CSS), Bootstrap (Composants).
* **Gestionnaire de dépendances** : Composer.

### Structure du projet

```text
web4heroes/
├── App/
│   ├── Controllers/    # Logique métier (Admin, Hero, Incident, Villain...)
│   ├── Core/           # Noyau (Router, Database, Container...)
│   └── Repository/     # Accès aux données (Requêtes SQL PDO)
├── config/             # Configuration de la BDD et Routes
│   └── web4heroes/     # Scripts SQL d'initialisation
├── public/             # Point d'entrée (index.php) et assets (CSS/IMG/JS)
├── views/              # Templates HTML/PHP
└── vendor/             # Autoload Composer

```

---

## Installation

### 1. Cloner le projet

```bash
git clone [https://github.com/NashieArtz/web4heroes.git](https://github.com/NashieArtz/web4heroes.git)
cd web4heroes

```

### 2. Configuration de la Base de Données

1. Créez une base de données MySQL vide (ex: `web4heroes`).
2. Importez les scripts SQL situés dans `config/web4heroes/` dans cet ordre précis :
* `web4heroes.sql` (Structure des tables)
* `address.sql` (Données géographiques)
* `users.sql` (Jeux de données de test)



### 3. Configuration du Projet

Modifiez le fichier `config/database.php` avec vos accès locaux :

```php
// config/database.php
define('DB_HOST', 'localhost');
define('DB_NAME', 'web4heroes');
define('DB_USER', 'root');
define('DB_PASS', ''); // Votre mot de passe

```

### 4. Lancement

* Installez l'autoloader si nécessaire :
```bash
composer dump-autoload

```


* Lancez un serveur PHP local pointant vers le dossier `public` :
```bash
php -S localhost:8000 -t public

```


* Accédez à : `http://localhost:8000`

---

## Auteurs

**Ange Wu**

* Développeur Lead & Architecture MVC

**Fallou Thiaw**

* Développeuse Front

---

*Projet réalisé dans le cadre de la formation développement web de la NFS - Janvier 2026.*

```
