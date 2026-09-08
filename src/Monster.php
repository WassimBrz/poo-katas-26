<?php

declare(strict_types=1);

namespace Dungeon;

/**
 * Un monstre du donjon. Classe ABSTRAITE : on ne croise jamais "un monstre",
 * on croise un gobelin ou un dragon. Niveau 3, devient Fighter au niveau 4.
 */
abstract class Monster implements Fighter
{
    use HasHealth;

    /** Doit garder le nom et initialiser hp et maxHp à $maxHp. */
    public function __construct(
        public readonly string $name,
        int $maxHp,
    ) {
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
