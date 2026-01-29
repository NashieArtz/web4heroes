# 🛡️ Web4Heroes - Incident Reporting System

**Web4Heroes** est une plateforme de gestion et de signalement d'incidents destinée aux citoyens et aux super-héros.
Développée dans le cadre d'un projet étudiant à Rouen, elle permet de centraliser les menaces (attaques de vilains,
catastrophes, invasions) pour optimiser les interventions héroïques.

## 🚀 Fonctionnalités Clés

- **Signalement d'incidents dynamique** : Formulaire intelligent avec validation côté serveur (PHP) et client (HTML5).
- **Normalisation Géographique** : Gestion des adresses via des tables liées `countries` et `cities` pour éviter les
  doublons et les erreurs de saisie.
- **Gestion des Menaces** : Intégration de profils de vilains (Alias, Spécialités) pour qualifier chaque incident.
- **Intégrité des données** : Utilisation intensive des types `ENUM` MySQL pour les types d'incidents et les statuts de
  résolution.
- **Architecture MVC Custom** : Framework PHP "maison" incluant un Router, une gestion de Request/Response et le pattern
  Repository.

## 🛠️ Stack Technique

- **Backend** : PHP 8.4 (Natif, Programmation Orientée Objet).
- **Frontend** : Bootstrap 5, PHP Natif
- **Base de données** : MySQL (Gestion des clés étrangères et contraintes d'intégrité).
- **Gestion de version** : Git / GitLab.

## 📂 Structure du Projet

```text
├── App/
│   ├── Controllers/    # IncidentController, UserController, etc.
│   ├── Core/           # Classes de base (Controller, Request, Response)
│   ├── Repository/     # Logique SQL (IncidentRepository, AddressRepository)
├── views/              # Templates HTML/PHP (home.php, layout.php, hero-dashboard.php, etc.)
│   ├── admin/
│   ├── dashboard/
│   ├── includes/
│   ├── error/
│   ├── hero/
├── config/             # Connection & schéma de la base de données et routing
├── vendor/             # Autoloading
├── public/             # Point d'entrée (index.php, CSS, JS)
└───├── assets/
    │   ├── img/
    │   ├── css/
    └───├── js/
```

## ⚙️ Installation Rapide

1. **Cloner le projet** :

```bash
git clone [https://gitlab.com/NashieArtz/web4heroes.git](https://gitlab.com/NashieArtz/web4heroes.git)
cd web4heroes

```

2. **Configuration SQL** :
   Créez une base de données `web4heroes` et importez le schéma :

```sql
mysql
-u root -p web4heroes < database.sql

```

3. **Serveur local** :
   Lancez le serveur PHP intégré depuis le dossier `public` :

```bash
php -S localhost:8000 -t public

```

## 📋 Roadmap & Améliorations

* [ ] **Filtrage AJAX** : Chargement dynamique des villes en fonction du pays choisi.
* [ ] **Gamification** : Intégration d'un système de points XP pour les citoyens signalant des incidents réels.
* [ ] **API Rest** : Permettre aux héros d'accéder à la liste des incidents via une application mobile.

## 👥 Rôles et Gestion de Projet

Ce projet a été réalisé en **groupe de 3 personnes** sur une période intensive de **3 semaines**.
J'ai assuré l'intégralité des responsabilités suivantes pour garantir la livraison d'un produit fonctionnel :

- **Chef de Projet (Lead)** : Définition du cahier des charges, planification des sprints et répartition des User
  Stories.
- **Git Master** : Mise en place de la stratégie de branching (GitFlow), gestion des Pull Requests et résolution des
  conflits pour maintenir un code propre et stable.
- **Maquetteur (UI/UX)** : Conception de l'identité visuelle et réalisation des maquettes pour assurer une expérience
  utilisateur fluide sur le formulaire de signalement.
- **Développeur Full Stack** :
  - **Backend** : Architecture MVC, développement des Repositories (SQL pur), gestion de la logique métier et
    sécurisation des données.
  - **Frontend** : Intégration responsive avec Bootstrap 5 et dynamisation des composants.

## ⏱️ Déroulement du Projet (Sprint 3 semaines)

1. **Semaine 1** : Conception, Schéma de base de données (UML/ERD) et mise en place de l'architecture Core (Router/MVC).
2. **Semaine 2** : Développement des modules Address, Cities et Countries avec normalisation SQL.
3. **Semaine 3** : Module de gestion des Vilains, intégration finale, tests unitaires manuels et documentation
   technique.

```

