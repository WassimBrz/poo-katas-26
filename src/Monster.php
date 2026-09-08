<?php

declare(strict_types=1);

namespace Dungeon;

/**
 * Un monstre du donjon. Classe ABSTRAITE : on ne croise jamais "un monstre",
 * on croise un gobelin ou un dragon. Niveau 3, devient Fighter au niveau 4.
 */
abstract class Monster implements Fighter
{
    /** Les points de vie courants, toujours entre 0 et $maxHp. */
    protected int $hp = 0;

    /** Le maximum de points de vie. */
    protected int $maxHp = 0;

    /** Doit garder le nom et initialiser hp et maxHp à $maxHp. */
    public function __construct(
        public readonly string $name,
        int $maxHp,
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

    /** Chaque monstre frappe à sa façon : c'est aux sous-classes de l'écrire. */
    abstract public function attack(): int;

    /** Doit renvoyer "Gobelin (5/5 PV)". */
    public function __toString(): string
    {
        throw new \LogicException('À implémenter');
    }
}
