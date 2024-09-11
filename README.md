# Test



## Prérequis

Assurez-vous que les logiciels suivants sont installés sur votre machine :

- PHP 8.3 ou plus récent
- Composer
- Symfony CLI (facultatif, mais recommandé)
- MariaDB (ou MySQL)
- Node.js et npm (si votre projet utilise Webpack Encore ou d'autres outils JavaScript)
- Git


## Installation

### 1. Cloner le dépôt

Clonez ce dépôt sur votre machine locale :

```bash
git clone https://github.com/Annyzo/test_etalik.git
cd test_etalik

```
### 2. Installer les dépendances PHP

Utilisez Composer pour installer toutes les dépendances PHP :

```bash
composer install
```

### 3. Créer la base de données

Créez la base de données et exécutez les migrations :

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

### 3. Installer les dépendances front-end

```bash
npm install
```

### 4. Compiler les assets (facultatif)
```bash

npm run dev   # Pour l'environnement de développement
```

### 5. Lancer le serveur de développement Symfony
Utilisez la commande suivante pour démarrer le serveur Symfony :

```bash

symfony serve
```

Ou avec PHP intégré :

```bash

php -S localhost:8000 -t public
```
L'application sera accessible à l'adresse suivante : http://localhost:8000


## NB:
si on utilise docker avec cette commande
```chmod +x ./boot.sh```
```docker-compose up --build -d ```