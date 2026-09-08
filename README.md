# Les katas du Donjon (poo-katas-26)

Les exercices du bloc POO de 5XCOS. **Un niveau = un chapitre.** Vous ne partez
pas d'une page blanche : les classes sont déjà déclarées dans `src/`, avec les
bonnes signatures. Les méthodes, elles, lèvent toutes `LogicException('À implémenter')`.
Votre travail : remplacer ces lignes par du vrai code, jusqu'à ce que les tests
du niveau passent au vert.

Les tests sont déjà écrits. **Ils sont l'énoncé.** Un test rouge vous dit
exactement ce qu'on attend.

## Les niveaux

| Niveau | Chapitre | Ce que vous écrivez | Notions |
|---|---|---|---|
| 1 | 1 — Objets et classes | `Dice`, `Hero` | classe, `new`, `$this`, constructeur avec promotion, `readonly`, visibilité, `__toString()`, méthode `static` |
| 2 | 4 — Relations entre objets | `Item`, `Inventory`, `Hero::inventory()` | propriété typée par une classe, tableau d'objets, composition (le sac est créé dans le constructeur du héros) |
| 3 | 5 — Héritage et polymorphisme | `Weapon`, `Potion`, `Monster`, `Goblin`, `Dragon`, `InventoryFullException`, `Hero::equip()`, `Hero::drink()` | `extends`, `abstract`, `parent::__construct()`, redéfinition, `?Weapon`, exceptions personnalisées |
| 4 | 6 — Contrats | `Rarity`, `Fighter`, `HasHealth`, `Item implements Stringable`, `Inventory implements Countable, IteratorAggregate` | enum, interface, trait, interfaces natives de PHP |
| 5 (bonus) | 6 — Contrats | `Battle` | typer par une interface, recevoir une dépendance au lieu de la fabriquer |

## La procédure, pas à pas

1. **Forkez** ce dépôt sur votre compte GitHub (bouton *Fork* en haut à droite).
2. **Clonez** votre fork :
   ```bash
   git clone https://github.com/VOTRE-COMPTE/poo-katas-26.git
   cd poo-katas-26
   ```
3. **Installez** les dépendances (Pest) :
   ```bash
   composer install
   ```
4. **Lancez tout** une fois, pour voir l'ampleur du chantier :
   ```bash
   composer test
   ```
   Tout est rouge. C'est normal, c'est le point de départ.
5. **Travaillez un niveau à la fois** :
   ```bash
   composer test -- --group=niveau-1
   ```
6. **Lisez le premier test rouge.** Pest affiche le nom du test, le fichier, la
   ligne, la valeur attendue et la valeur obtenue. Ouvrez la classe concernée
   dans `src/`, supprimez le `throw new \LogicException('À implémenter');`,
   écrivez le code. Relancez. Vert.
7. **Committez et poussez** dès qu'un niveau est vert :
   ```bash
   git add .
   git commit -m "niveau 1 vert"
   git push
   ```
8. **Regardez l'onglet Actions** de votre fork sur GitHub : cinq jobs
   (`niveau-1` … `niveau-5`), une coche verte ou une croix rouge pour chacun.
   C'est votre tableau de bord : il ne ment pas et il ne juge pas.

Pour ne relancer qu'un seul test pendant que vous cherchez :

```bash
vendor/bin/pest --filter="heal ne dépasse jamais"
```

## Comment lire `src/`

Chaque membre porte un commentaire d'une ou deux lignes qui dit **ce qu'il doit
faire**, et le niveau auquel il arrive. Exemple :

```php
/** Doit renvoyer un entier tiré au hasard entre 1 et $sides inclus. */
public function roll(): int
{
    throw new \LogicException('À implémenter');
}
```

Ne changez pas les signatures (noms, types, paramètres) : les tests s'appuient
dessus. Vous pouvez en revanche ajouter des méthodes privées si ça vous aide.

## Deux détails qui surprennent (et qui sont voulus)

**1. `Item` est déjà abstraite, dès le niveau 2.** Le repo ne contient qu'un seul
`src/`, celui de l'état final. Or au chapitre 5, `Item` devient abstraite : on ne
ramasse jamais « un objet », on ramasse une arme ou une potion. Pour que les
tests du niveau 2 restent valables jusqu'au bout, ils utilisent
`tests/Support/SimpleItem.php`, une petite sous-classe concrète qui n'existe que
pour les tests. Vous n'avez rien à y faire : implémentez `Item` normalement.

**2. Le sac trop plein : `false` au niveau 2, exception au niveau 3.** Le
chapitre 4 vous fait renvoyer `false` quand l'objet ne rentre pas ; le chapitre 5
remplace ça par `throw new InventoryFullException(...)`. Le test du niveau 2 est
écrit pour accepter **les deux** comportements — il vérifie surtout que le sac
reste vide. Le test du niveau 3, lui, exige l'exception. Vous ne cassez donc rien
en faisant l'évolution demandée.

## Ce qui est dans le dossier

| Fichier | Rôle |
|---|---|
| `composer.json` | Dépendances (Pest), autoload PSR-4 `Dungeon\` → `src/`, script `composer test`. |
| `phpunit.xml` | Configuration du lanceur de tests. |
| `src/` | Les squelettes à compléter : c'est **le seul dossier que vous modifiez**. |
| `tests/Niveau1Test.php` … `Niveau5Test.php` | Les énoncés, un fichier par niveau, chaque test marqué `->group('niveau-N')`. **Ne les modifiez pas.** |
| `tests/Support/SimpleItem.php` | Sous-classe concrète d'`Item` pour les tests du niveau 2. |
| `tests/Support/FixedDice.php` | Un dé truqué qui déroule une série fixe, pour rendre le combat du niveau 5 reproductible. |
| `tests/Pest.php` | Configuration de Pest. |
| `.github/workflows/tests.yml` | La CI : un job par niveau, cinq résultats visibles dans l'onglet Actions. |

## Besoin d'un exemple ?

Le Donjon complet et corrigé jusqu'au niveau 2 est ici :
[`poo-exemple-26`](https://github.com/opmvpc/poo-exemple-26). C'est celui qu'on
lit ensemble en séance 1.
