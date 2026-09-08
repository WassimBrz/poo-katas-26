<?php

declare(strict_types=1);

namespace Dungeon;

/**
 * Le personnage joueur. Niveau 1, complété aux niveaux 2, 3 et 4.
 * Fighter (niveau 4) : le contrat commun avec les monstres.
 */
final class Hero implements Fighter
{
    /** Les points de vie courants, toujours entre 0 et $maxHp. Niveau 1. */
    protected int $hp = 0;

    /** Le maximum de points de vie. Niveau 1. */
    protected int $maxHp = 0;

    /** Le sac, créé dans le constructeur : composition. Niveau 2. */
    private Inventory $inventory;

    /** L'arme équipée, ou null si le héros se bat à mains nues. Niveau 3. */
    private ?Weapon $weapon = null;

    /** Doit initialiser hp et maxHp, et créer l'inventaire du héros. */
    public function __construct(
        public readonly string $name,
        int $maxHp = 10,
        public readonly int $strength = 2,
    ) {
        throw new \LogicException('À implémenter');
    }

    /** Doit renvoyer les points de vie courants. */
    public function hp(): int
    {
        throw new \LogicException('À implémenter');
    }

    /** Doit renvoyer le maximum de points de vie. */
    public function maxHp(): int
    {
        throw new \LogicException('À implémenter');
    }

    /** Doit retirer $amount points de vie, sans jamais descendre sous 0. */
    public function takeDamage(int $amount): void
    {
        throw new \LogicException('À implémenter');
    }

    /** Doit rendre $amount points de vie, sans jamais dépasser $maxHp. */
    public function heal(int $amount): void
    {
        throw new \LogicException('À implémenter');
    }

    /** Doit renvoyer true tant qu'il reste au moins 1 point de vie. */
    public function isAlive(): bool
    {
        throw new \LogicException('À implémenter');
    }

    /** Doit renvoyer l'inventaire du héros. Niveau 2. */
    public function inventory(): Inventory
    {
        throw new \LogicException('À implémenter');
    }

    /** Doit équiper l'arme passée en paramètre. Niveau 3. */
    public function equip(Weapon $weapon): void
    {
        throw new \LogicException('À implémenter');
    }

    /** Doit renvoyer l'arme équipée, ou null. Niveau 3. */
    public function weapon(): ?Weapon
    {
        throw new \LogicException('À implémenter');
    }

    /** Doit soigner le héros du montant de la potion, puis retirer la potion de l'inventaire. Niveau 3. */
    public function drink(Potion $potion): void
    {
        throw new \LogicException('À implémenter');
    }

    /** Doit renvoyer strength, plus les dégâts de l'arme équipée s'il y en a une. */
    public function attack(): int
    {
        throw new \LogicException('À implémenter');
    }

    /** Doit renvoyer "Arthur (7/10 PV)". */
    public function __toString(): string
    {
        throw new \LogicException('À implémenter');
    }
}
