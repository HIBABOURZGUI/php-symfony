# 🚀 Symfony CRM — Full Stack Project

<div align="center">

# **SYMFONY CRM**
## **PROFESSIONAL CUSTOMER RELATIONSHIP MANAGEMENT**

| **VERSION** | **BUILD** | **LICENSE** |
|-------------|-----------|-------------|
| 1.0.0 | PASSING | MIT |

---

**Application CRM professionnelle développée avec Symfony - Par Hiba Bourzgui**

*Gestion complète de clients, leads et interactions ... 📊*

| ⭐ Stars | 🍴 Forks |
|---------|----------|
| ![Stars](https://img.shields.io/github/stars/HIBABOURZGUI/php-symfony?style=social) | ![Forks](https://img.shields.io/github/forks/HIBABOURZGUI/php-symfony?style=social) |

</div>

---

## 📋 Table des Matières

- [🌟 Aperçu du Projet](#-aperçu-du-projet)
- [🎯 Fonctionnalités Avancées](#-fonctionnalités-avancées)
- [🏗️ Architecture Technique](#️-architecture-technique)
- [💻 Stack Technologique](#-stack-technologique)
- [🚀 Guide d'Installation](#-guide-dinstallation)
- [📊 Structure des Données](#-structure-des-données)
- [🔐 Système de Sécurité](#-système-de-sécurité)
- [📱 Interface Utilisateur](#-interface-utilisateur)
- [🔄 Workflows Métier](#-workflows-métier)
- [🧪 Tests & Qualité](#-tests--qualité)
- [📞 Contact](#-contact)

---

## 🌟 Aperçu du Projet

**Symfony CRM** est une solution complète de gestion de relation client développée avec le framework Symfony par **Hiba Bourzgui**. Cette application permet aux entreprises de gérer efficacement leurs clients, leads et interactions commerciales.

### ✨ Points Forts
✅ Architecture MVC propre  
✅ Système d'authentification sécurisé  
✅ Gestion des rôles et permissions  
✅ Interface responsive avec Bootstrap  
✅ CRUD complet pour toutes les entités  
✅ Dashboard analytique  

---

## 🎯 Fonctionnalités Avancées

### 👥 Module Client

| Fonctionnalité | Description | Statut |
|---------------|-------------|--------|
| **Gestion des Clients** | CRUD complet avec recherche avancée | ✅ |
| **Profil Client** | Informations détaillées, historique des interactions | ✅ |
| **Import/Export CSV** | Gestion des données en masse | ✅ |
| **Segmentation** | Filtres avancés et catégorisation | ✅ |
| **Historique Interactions** | Suivi complet des échanges | ✅ |
| **Notes et Documents** | Gestion des pièces jointes | ✅ |

### 📈 Module Leads

| Fonctionnalité | Description | Statut |
|---------------|-------------|--------|
| **Suivi des Leads** | Pipeline de vente complet | ✅ |
| **Qualification** | Scoring et priorisation automatique | ✅ |
| **Assignation** | Distribution aux commerciaux | ✅ |
| **Conversion** | Transformation en client | ✅ |
| **Statistiques** | Taux de conversion, délais moyens | ✅ |

### 👑 Module Administrateur

| Module | Fonctionnalités | Technologies |
|--------|-----------------|--------------|
| **Dashboard** | KPIs, graphiques interactifs | Chart.js, Twig |
| **Gestion Utilisateurs** | CRUD, rôles, permissions | Symfony Security |
| **Rapports** | Analyses, exports PDF/CSV | Doctrine, Symfony |
| **Audit Logs** | Traçabilité des actions | Doctrine Extensions |
| **Configuration** | Paramètres système | Symfony Config |

---

## 🏗️ Architecture Technique

### Diagramme d'Architecture MVC
```mermaid
graph TD
    subgraph "🎨 COUCHE PRÉSENTATION"
        P1[<span style='color:#FF6B6B'>■</span> Twig]
        P2[<span style='color:#4ECDC4'>■</span> Bootstrap 5]
        P3[<span style='color:#E44D26'>■</span> HTML5]
        P4[<span style='color:#264DE4'>■</span> CSS3]
        P5[<span style='color:#F7DF1E'>■</span> JavaScript]
        P6[<span style='color:#528DD7'>■</span> Font Awesome]
    end

    subgraph "⚙️ COUCHE CONTRÔLEUR"
        C1[<span style='color:#45B7D1'>■</span> Contrôleurs Symfony]
        C2[<span style='color:#96CEB4'>■</span> Routes]
        C3[<span style='color:#FFEAA7'>■</span> Formulaires]
        C4[<span style='color:#D4A5A5'>■</span> Validation]
    end

    subgraph "💼 COUCHE MÉTIER"
        M1[<span style='color:#9B59B6'>■</span> Entités]
        M2[<span style='color:#3498DB'>■</span> Services]
        M3[<span style='color:#E67E22'>■</span> Repositories]
        M4[<span style='color:#2ECC71'>■</span> Business Logic]
    end

    subgraph "💾 COUCHE PERSISTANCE"
        D1[<span style='color:#4479A1'>■</span> Doctrine ORM]
        D2[<span style='color:#00758F'>■</span> MySQL]
        D3[<span style='color:#F29111'>■</span> Migrations]
        D4[<span style='color:#6DB33F'>■</span> Fixtures]
    end

    P1 & P2 & P3 & P4 & P5 & P6 --> C1
    C1 --> M1
    M1 --> D1
    D1 --> D2

    style P1 fill:#FF6B6B20,stroke:#FF6B6B,stroke-width:2px
    style P2 fill:#4ECDC420,stroke:#4ECDC4,stroke-width:2px
    style P3 fill:#E44D2620,stroke:#E44D26,stroke-width:2px
    style P4 fill:#264DE420,stroke:#264DE4,stroke-width:2px
    style P5 fill:#F7DF1E20,stroke:#F7DF1E,stroke-width:2px
    style P6 fill:#528DD720,stroke:#528DD7,stroke-width:2px
    style C1 fill:#45B7D120,stroke:#45B7D1,stroke-width:2px
    style C2 fill:#96CEB420,stroke:#96CEB4,stroke-width:2px
    style C3 fill:#FFEAA720,stroke:#FFEAA7,stroke-width:2px
    style C4 fill:#D4A5A520,stroke:#D4A5A5,stroke-width:2px
    style M1 fill:#9B59B620,stroke:#9B59B6,stroke-width:2px
    style M2 fill:#3498DB20,stroke:#3498DB,stroke-width:2px
    style M3 fill:#E67E2220,stroke:#E67E22,stroke-width:2px
    style M4 fill:#2ECC7120,stroke:#2ECC71,stroke-width:2px
    style D1 fill:#4479A120,stroke:#4479A1,stroke-width:2px
    style D2 fill:#00758F20,stroke:#00758F,stroke-width:2px
    style D3 fill:#F2911120,stroke:#F29111,stroke-width:2px
    style D4 fill:#6DB33F20,stroke:#6DB33F,stroke-width:2px

Structure du Projet

📦 php-symfony
├── <span style='color:#FF6B6B'>📂</span> config/         # Configuration Symfony
├── <span style='color:#4ECDC4'>📂</span> migrations/     # Migrations Doctrine
├── <span style='color:#45B7D1'>📂</span> public/         # Racine web
├── <span style='color:#9B59B6'>📂</span> src/            # Code source
│   ├── <span style='color:#45B7D1'>📂</span> Controller/
 # Contrôleurs
│   ├── <span style='color:#9B59B6'>📂</span> Entity/       # Entités
│   ├── <span style='color:#E67E22'>📂</span> Repository/   # Repositories
│   ├── <span style='color:#3498DB'>📂</span> Security/     # Sécurité
│   ├── <span style='color:#FFEAA7'>📂</span> Form/         # Formulaires
│   └── <span style='color:#2ECC71'>📂</span> DataFixtures/ # Données de test
├── <span style='color:#FF6B6B'>📂</span> templates/     # Templates Twig
├── <span style='color:#4ECDC4'>📂</span> translations/  # Fichiers de traduction
├── <span style='color:#96CEB4'>📂</span> var/           # Cache et logs
├── <span style='color:#F7DF1E'>📂</span> vendor/        # Dépendances
└── <span style='color:#6DB33F'>📂</span> tests/         # Tests

💻 Stack Technologique
⚙️ Backend Stack
<div align="center">
<img src="https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">	<img src="https://img.shields.io/badge/Symfony-6.4-black?style=for-the-badge&logo=symfony&logoColor=white" alt="Symfony">	<img src="https://img.shields.io/badge/Doctrine-ORM-4B8BBE?style=for-the-badge&logo=doctrine&logoColor=white" alt="Doctrine">	<img src="https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
PHP 8.2	Symfony 6.4	Doctrine ORM	MySQL 8.0
</div>

🎨 Frontend Stack
<div align="center">
<img src="https://img.shields.io/badge/Twig-3.0-green?style=for-the-badge&logo=twig&logoColor=white" alt="Twig">	<img src="https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap">	<img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white" alt="HTML5">	<img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS3">
Twig 3.0	Bootstrap 5.3	HTML5	CSS3
</div>

🚀 Guide d'Installation
Installation Complète

# 1. Cloner le dépôt
git clone https://github.com/HIBABOURZGUI/php-symfony.git
cd php-symfony

# 2. Installer les dépendances
composer install

# 3. Configurer l'environnement
cp .env .env.local
# Éditer .env.local avec vos informations de base de données

# 4. Créer la base de données
php bin/console doctrine:database:create

# 5. Exécuter les migrations
php bin/console doctrine:migrations:migrate

# 6. Charger les fixtures (données de test)
php bin/console doctrine:fixtures:load

# 7. Lancer le serveur
symfony server:start

📞 Contact
<div align="center">
Hiba Bourzgui

📧 hibaabourzgui@gmail.com | 💼 LinkedIn | 🐙 GitHub

</div>
<div align="center"> © 2024 Hiba Bourzgui - Tous droits réservés </div> ```

