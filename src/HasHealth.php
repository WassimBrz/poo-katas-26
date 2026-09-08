<?php

declare(strict_types=1);

namespace Dungeon;

/**
 * Le code des points de vie, partagé par Hero et Monster. Niveau 4.
 * Un trait n'est pas un parent : c'est du code copié dans la classe qui l'utilise.
 */
trait HasHealth
{
    /** Les points de vie courants, toujours entre 0 et $maxHp. */
    protected int $hp = 0;

    /** Le maximum de points de vie. */
    protected int $maxHp = 0;

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
}
