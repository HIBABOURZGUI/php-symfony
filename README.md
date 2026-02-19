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
```text
┌─────────────────────────────────────────────────────────────┐
│ <span style="color: #FF6B6B;">COUCHE PRÉSENTATION</span> │
├─────────────────────────────────────────────────────────────┤
│ Twig │ Bootstrap 5 │ HTML5 │ CSS3 │ JavaScript │ Font Awesome │
└─────────────────────────────────────────────────────────────┘
                              │
                              ▼
┌─────────────────────────────────────────────────────────────┐
│ <span style="color: #4ECDC4;">COUCHE CONTRÔLEUR</span> │
├─────────────────────────────────────────────────────────────┤
│ Contrôleurs Symfony │ Routes │ Formulaires │ Validation │
└─────────────────────────────────────────────────────────────┘
                              │
                              ▼
┌─────────────────────────────────────────────────────────────┐
│ <span style="color: #45B7D1;">COUCHE MÉTIER</span> │
├─────────────────────────────────────────────────────────────┤
│ Entités │ Services │ Repositories │ Business Logic │
└─────────────────────────────────────────────────────────────┘
                              │
                              ▼
┌─────────────────────────────────────────────────────────────┐
│ <span style="color: #96CEB4;">COUCHE PERSISTANCE</span> │
├─────────────────────────────────────────────────────────────┤
│ Doctrine ORM │ MySQL │ Migrations │ Fixtures │
└─────────────────────────────────────────────────────────────┘
```

### Structure du Projet
```text
📦 php-symfony
├── 📂 config/         # <span style="color: #FFD93D;">Configuration Symfony</span>
├── 📂 migrations/     # <span style="color: #FFD93D;">Migrations Doctrine</span>
├── 📂 public/         # <span style="color: #FFD93D;">Racine web</span>
├── 📂 src/            # <span style="color: #6BCB77;">Code source</span>
│   ├── Controller/    # Contrôleurs
│   ├── Entity/        # Entités
│   ├── Repository/    # Repositories
│   ├── Security/      # Sécurité
│   ├── Form/          # Formulaires
│   └── DataFixtures/  # Données de test
├── 📂 templates/      # <span style="color: #4D96FF;">Templates Twig</span>
├── 📂 translations/   # <span style="color: #4D96FF;">Fichiers de traduction</span>
├── 📂 var/            # <span style="color: #FF6B6B;">Cache et logs</span>
├── 📂 vendor/         # <span style="color: #FF6B6B;">Dépendances</span>
└── 📂 tests/          # <span style="color: #9B59B6;">Tests</span>
```

---

## 💻 Stack Technologique

### ⚙️ Backend Stack

<div align="center">

|    |    |    |    |
|---|---|---|---|
| <img src="https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP"> | <img src="https://img.shields.io/badge/Symfony-6.4-black?style=for-the-badge&logo=symfony&logoColor=white" alt="Symfony"> | <img src="https://img.shields.io/badge/Doctrine-ORM-4B8BBE?style=for-the-badge&logo=doctrine&logoColor=white" alt="Doctrine"> | <img src="https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL"> |
| **PHP 8.2** | **Symfony 6.4** | **Doctrine ORM** | **MySQL 8.0** |

</div>

### 🎨 Frontend Stack

<div align="center">

|    |    |    |    |
|---|---|---|---|
| <img src="https://img.shields.io/badge/Twig-3.0-green?style=for-the-badge&logo=twig&logoColor=white" alt="Twig"> | <img src="https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap"> | <img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white" alt="HTML5"> | <img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS3"> |
| **Twig 3.0** | **Bootstrap 5.3** | **HTML5** | **CSS3** |

</div>

### 📚 Bibliothèques & Frameworks

<div align="center">

|    |    |    |    |
|---|---|---|---|
| <img src="https://img.shields.io/badge/JavaScript-ES6+-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript"> | <img src="https://img.shields.io/badge/Chart.js-4.4-FF6384?style=for-the-badge&logo=chart.js&logoColor=white" alt="Chart.js"> | <img src="https://img.shields.io/badge/Font%20Awesome-6-528DD7?style=for-the-badge&logo=font-awesome&logoColor=white" alt="Font Awesome"> | <img src="https://img.shields.io/badge/Composer-2.5-885630?style=for-the-badge&logo=composer&logoColor=white" alt="Composer"> |
| **JavaScript ES6+** | **Chart.js 4.4** | **Font Awesome 6** | **Composer 2.5** |

</div>

### 🛠️ Outils de Développement

<div align="center">

|    |    |    |    |
|---|---|---|---|
| <img src="https://img.shields.io/badge/Symfony%20CLI-black?style=for-the-badge&logo=symfony&logoColor=white" alt="Symfony CLI"> | <img src="https://img.shields.io/badge/Git-F05032?style=for-the-badge&logo=git&logoColor=white" alt="Git"> | <img src="https://img.shields.io/badge/GitHub-181717?style=for-the-badge&logo=github&logoColor=white" alt="GitHub"> | <img src="https://img.shields.io/badge/VS%20Code-007ACC?style=for-the-badge&logo=visual-studio-code&logoColor=white" alt="VS Code"> |
| **Symfony CLI** | **Git** | **GitHub** | **VS Code** |

</div>

---

## 🚀 Guide d'Installation

### Prérequis Système
- **PHP** 8.2 ou supérieur
- **MySQL** 8.0 ou MariaDB 10.5
- **Composer** 2.5
- **Git**
- **Symfony CLI** (optionnel)
- **Navigateurs supportés** : Chrome 90+, Firefox 88+, Safari 14+, Edge 90+

### Installation Complète

```bash
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
# ou
php -S localhost:8000 -t public
```

### Configuration de la Base de Données
```env
# Fichier .env.local
DATABASE_URL="mysql://root:password@127.0.0.1:3306/symfony_crm?serverVersion=8.0"
APP_ENV=dev
APP_SECRET=your_secret_key_here
```

### Comptes de Démonstration
```json
{
  "admin": {
    "email": "admin@crm.com",
    "password": "Admin123!",
    "role": "ROLE_ADMIN"
  },
  "manager": {
    "email": "manager@crm.com",
    "password": "Manager123!",
    "role": "ROLE_MANAGER"
  },
  "user": {
    "email": "user@crm.com",
    "password": "User123!",
    "role": "ROLE_USER"
  }
}
```

---

## 📊 Structure des Données

### Diagramme Entité-Relation
```text
┌───────────────┐       ┌───────────────┐       ┌───────────────┐
│  <span style="color: #FF6B6B;">USER</span>      │       │ <span style="color: #4ECDC4;">CUSTOMER</span>    │       │  <span style="color: #45B7D1;">LEAD</span>      │
├───────────────┤       ├───────────────┤       ├───────────────┤
│ id            │       │ id            │       │ id            │
│ email         │       │ firstName     │       │ firstName     │
│ password      │       │ lastName      │       │ lastName      │
│ roles         │       │ email         │       │ email         │
│ createdAt     │       │ phone         │       │ phone         │
│ updatedAt     │       │ company       │       │ company       │
└───────┬───────┘       │ status        │       │ status        │
        │               │ createdAt     │       │ score         │
        │ 1:N           │ updatedAt     │       │ assignedTo    │
        │               └───────┬───────┘       │ createdAt     │
        │                       │                │ updatedAt     │
        │                       │ 1:N            └───────┬───────┘
        │                       │                        │
        │                       ▼                        │
        │               ┌───────────────┐                │
        └──────────────▶│ <span style="color: #96CEB4;">INTERACTION</span> │◄───────────────┘
                        ├───────────────┤
                        │ id            │
                        │ type          │
                        │ description   │
                        │ date          │
                        │ user_id       │
                        │ customer_id   │
                        │ lead_id       │
                        └───────────────┘
```

### Entités Principales
```php
// Entité User
#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(type: 'datetime_immutable')]
    private ?\DateTimeImmutable $createdAt = null;

    // Getters et setters...
}
```

---

## 🔐 Système de Sécurité

### Configuration Sécurité
```yaml
# config/packages/security.yaml
security:
    encoders:
        App\Entity\User:
            algorithm: auto

    providers:
        app_user_provider:
            entity:
                class: App\Entity\User
                property: email

    firewalls:
        main:
            lazy: true
            provider: app_user_provider
            custom_authenticator: App\Security\LoginFormAuthenticator
            logout:
                path: app_logout
                target: app_login
            
            remember_me:
                secret: '%kernel.secret%'
                lifetime: 604800 # 7 jours

    access_control:
        - { path: ^/admin, roles: ROLE_ADMIN }
        - { path: ^/dashboard, roles: ROLE_USER }
        - { path: ^/login, roles: PUBLIC_ACCESS }
```

---

## 📱 Interface Utilisateur

### Design System
```css
/* Variables CSS */
:root {
    --primary-color: #4e73df;
    --secondary-color: #858796;
    --success-color: #1cc88a;
    --info-color: #36b9cc;
    --warning-color: #f6c23e;
    --danger-color: #e74a3b;
    --dark-color: #5a5c69;
    --light-color: #f8f9fc;
}
```

### Template de Base
```html
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{% block title %}Symfony CRM{% endblock %}</title>
    {% block stylesheets %}
        {{ encore_entry_link_tags('app') }}
    {% endblock %}
</head>
<body>
    {% include 'partials/navbar.html.twig' %}
    
    <main class="container-fluid">
        {% block body %}{% endblock %}
    </main>
    
    {% block javascripts %}
        {{ encore_entry_script_tags('app') }}
    {% endblock %}
</body>
</html>
```

---

## 🔄 Workflows Métier

### Processus de Gestion Client
```text
┌─────────────────┐
│  <span style="color: #FF6B6B;">CRÉATION</span>    │
│   CLIENT        │
└────────┬────────┘
         │
         ▼
┌─────────────────┐
│  <span style="color: #4ECDC4;">SAISIE</span>      │
│  INFORMATIONS   │
└────────┬────────┘
         │
         ▼
┌─────────────────┐
│ <span style="color: #45B7D1;">VALIDATION</span>  │
│  DONNÉES        │
└────────┬────────┘
         │
         ▼
┌─────────────────┐
│ <span style="color: #96CEB4;">SAUVEGARDE</span>  │
│  EN BDD         │
└────────┬────────┘
         │
         ▼
┌─────────────────┐
│ <span style="color: #FFD93D;">NOTIFICATION</span> │
│  EMAIL          │
└─────────────────┘
```

---

## 🧪 Tests & Qualité

### Tests Unitaires
```php
// tests/Entity/UserTest.php
namespace App\Tests\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUserCreation(): void
    {
        $user = new User();
        $user->setEmail('test@example.com');
        $user->setPassword('password123');
        
        $this->assertEquals('test@example.com', $user->getEmail());
    }
}
```

### Tests Fonctionnels
```php
// tests/Controller/SecurityControllerTest.php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    public function testLoginPage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');
        
        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('form');
    }
}
```

---

## 📞 Contact

<div align="center">

👩‍💻 **Développeuse**  
Hiba Bourzgui

| 📧 Email | 💼 LinkedIn | 🐙 GitHub |
|----------|-------------|----------|
| hibaabourzgui@gmail.com | [Hiba Bourzgui](https://linkedin.com) | [@HIBABOURZGUI](https://github.com/HIBABOURZGUI) |

### 📊 Statistiques du Projet

| Statistique | Valeur |
|-------------|--------|
| Repo Size | ![Repo Size](https://img.shields.io/github/repo-size/HIBABOURZGUI/php-symfony?style=for-the-badge&logo=github) |
| Last Commit | ![Last Commit](https://img.shields.io/github/last-commit/HIBABOURZGUI/php-symfony?style=for-the-badge&logo=github) |
| Contributors | ![Contributors](https://img.shields.io/github/contributors/HIBABOURZGUI/php-symfony?style=for-the-badge&logo=github) |
| Languages | ![Languages](https://img.shields.io/github/languages/top/HIBABOURZGUI/php-symfony?style=for-the-badge&logo=github) |

</div>

---

## 📄 Licence

<div align="center">

**MIT License**  
Copyright (c) 2024 Hiba Bourzgui


© 2024 Hiba Bourzgui - Tous droits réservés

</div>
