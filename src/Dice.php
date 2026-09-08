<?php

declare(strict_types=1);

namespace Dungeon;

/** Un dé à N faces. Niveau 1. */
class Dice
{
    // Le nombre de faces, fixé à la création et jamais modifié.
    public function __construct(
        public readonly int $sides,
    ) {
    }

    /** Fabrique statique : doit renvoyer un dé à 6 faces. */
    public static function d6(): self
    {
        throw new \LogicException('À implémenter');
    }

    /** Fabrique statique : doit renvoyer un dé à 20 faces. */
    public static function d20(): self
    {
        throw new \LogicException('À implémenter');
    }

    /** Doit renvoyer un entier tiré au hasard entre 1 et $sides inclus. */
    public function roll(): int
    {
        throw new \LogicException('À implémenter');
    }
}
