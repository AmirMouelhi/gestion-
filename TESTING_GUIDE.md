# 🧪 Guide de Test - Système de Gestion des Étudiants

## ✅ Base de Données Prête

Votre base de données SQLite est maintenant remplie avec des données de test réalistes !

### 📊 Données Générées

| Type | Quantité | Description |
|------|----------|-------------|
| 🏙️ **Villes** | 15 | Villes tunisiennes avec codes postaux (10000-99999) |
| 🎓 **Spécialités** | 8 | Informatique, Génie Civil, Mécanique, Électrique, etc. |
| 👨‍🎓 **Étudiants** | 50 | Étudiants avec NCE, NCI, dates de naissance, adresses |
| 📚 **Matières** | 20 | Matières avec coefficients (1-5) et niveaux (1-5) |
| 📝 **Inscriptions** | 80 | Inscriptions avec résultats et mentions |
| 📊 **Notes** | 200 | Notes de contrôle et d'examen calculées automatiquement |
| 👤 **Utilisateurs** | 2 | 1 admin + 1 utilisateur test |

---

## 🔐 Identifiants de Connexion

### Administrateur Principal
```
Email: admin@gestion.test
Mot de passe: password
```

### Utilisateur Test
```
Email: test@example.com
Mot de passe: password
```

---

## 🚀 Comment Tester

### 1️⃣ Démarrer le Serveur
```bash
php artisan serve
```
Le serveur démarre sur : `http://127.0.0.1:8000`

### 2️⃣ Connexion
1. Ouvrez votre navigateur : `http://127.0.0.1:8000`
2. Cliquez sur **"Connexion"**
3. Utilisez : `admin@gestion.test` / `password`

### 3️⃣ Tester les Fonctionnalités

#### ✅ Liste des Étudiants
- Naviguez vers **Étudiants**
- Vous verrez 50 étudiants avec leurs informations
- **Testez la recherche** : tapez un nom dans la barre de recherche
- **Pagination** : naviguer entre les pages

#### ✅ Créer un Étudiant
1. Cliquez sur **"Ajouter un Étudiant"**
2. Remplissez le formulaire
3. Les villes et spécialités sont déjà disponibles dans les listes déroulantes

#### ✅ Voir un Étudiant
1. Cliquez sur **"Voir"** pour un étudiant
2. Visualisez :
   - ℹ️ Informations personnelles
   - 📚 Inscriptions et mentions
   - 📊 Notes obtenues
   - 🎓 Résultats finaux

#### ✅ Modifier un Étudiant
1. Cliquez sur **"Modifier"**
2. Changez les informations
3. Enregistrez

#### ✅ Supprimer un Étudiant
1. Cliquez sur **"Supprimer"**
2. Confirmez dans la modale
3. L'étudiant et toutes ses données liées sont supprimés

---

## 🎯 Points à Vérifier

### ✅ Design Moderne
- [ ] Fond avec dégradé violet-rose
- [ ] Navbar glassmorphism
- [ ] Cards avec ombres élégantes
- [ ] Animations fluides
- [ ] Responsive sur mobile/tablette/desktop

### ✅ Fonctionnalités
- [ ] Authentification fonctionnelle
- [ ] Recherche d'étudiants en temps réel
- [ ] CRUD complet (Create, Read, Update, Delete)
- [ ] Validation des formulaires avec messages d'erreur
- [ ] Affichage des relations (inscriptions, notes)
- [ ] Calcul automatique des mentions

### ✅ Performance
- [ ] Pages chargent rapidement
- [ ] Pas d'erreurs dans la console
- [ ] Recherche fluide
- [ ] Transitions douces

---

## 📱 Test sur Différents Appareils

### Desktop (1920x1080)
- Layout en 3 colonnes pour les cards
- Navbar complète avec tous les liens

### Tablette (768x1024)
- Layout en 2 colonnes
- Menu burger pour la navigation

### Mobile (375x667)
- Layout en 1 colonne
- Navigation simplifiée
- Formulaires adaptés

---

## 🔄 Réinitialiser les Données

Si vous voulez recommencer avec de nouvelles données :

```bash
php artisan migrate:fresh --seed
```

Cela va :
1. Supprimer toutes les tables
2. Recréer les tables
3. Générer 50 nouveaux étudiants aléatoires
4. Créer 200 nouvelles notes
5. Recréer les utilisateurs admin/test

---

## 📊 Structure de la Base de Données

### SQLite
- **Emplacement** : `database/database.sqlite`
- **Type** : Base de données locale
- **Avantage** : Aucune installation MySQL requise
- **Visualisation** : Utilisez [DB Browser for SQLite](https://sqlitebrowser.org/)

### Tables Créées
```
users              → Utilisateurs authentifiés
villes             → Villes (cpVilles, designationVilles)
specialites        → Spécialités (codeSp, designationSp)
etudiants          → Étudiants (nce, nom, prenom, etc.)
matieres           → Matières (codeMat, codeSp, coef, niveau)
inscriptions       → Inscriptions (nce, codeSp, resultat, mention)
notes              → Notes (nce, codeMat, noteControle, noteExamen)
```

---

## 🐛 Dépannage

### Erreur : "Database file not found"
```bash
touch database/database.sqlite
php artisan migrate:fresh --seed
```

### Erreur : "Class not found"
```bash
composer dump-autoload
```

### Erreur : "Too few arguments"
```bash
php artisan config:clear
php artisan cache:clear
```

### Page blanche ou erreur 500
- Vérifiez les logs : `storage/logs/laravel.log`
- Permissions : `chmod -R 775 storage bootstrap/cache`

---

## 📚 Documentation Complète

Pour plus de détails sur l'architecture et le code :
- **README.md** : Vue d'ensemble du projet
- **GUIDE_COMPLET.md** : Documentation technique détaillée
- **TESTING_GUIDE.md** : Ce fichier (guide de test)

---

## ✨ Fonctionnalités Testées Automatiquement

Les **Factories** génèrent automatiquement :

### 📍 Villes Réalistes
- Codes postaux uniques (5 chiffres)
- Noms de villes variés

### 🎓 Étudiants Cohérents
- NCE unique (format: NCE12345)
- NCI avec 8 chiffres
- Âges entre 18 et 25 ans
- Adresses complètes avec codes postaux
- Ville de naissance et ville d'habitation

### 📊 Notes Calculées
- Note contrôle (0-20)
- Note examen (0-20)
- **Résultat = (Contrôle × 0.4) + (Examen × 0.6)**
- Mention automatique :
  - ≥ 16 : **Très Bien** 🏆
  - ≥ 14 : **Bien** 🥈
  - ≥ 12 : **Assez Bien** 🥉
  - ≥ 10 : **Passable** ✅
  - < 10 : **Échec** ❌

---

## 🎉 Bon Test !

Votre projet est maintenant prêt à être testé avec des données réalistes.
N'hésitez pas à créer, modifier et supprimer des étudiants pour tester toutes les fonctionnalités.

**Rappel** : Utilisez `admin@gestion.test` / `password` pour vous connecter !
