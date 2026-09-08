<?php

declare(strict_types=1);

namespace Dungeon;

/**
 * Un objet ramassable. Classe simple au niveau 2, ABSTRAITE au niveau 3 :
 * on ne ramasse jamais "un objet", on ramasse une arme ou une potion.
 */
abstract class Item implements \Stringable
{
    // protected : les sous-classes (Weapon, Potion) y ont accès, l'extérieur non.
    public function __construct(
        protected readonly string $name,
        protected readonly float $weight,
        protected readonly Rarity $rarity = Rarity::Common,
    ) {
    }

    /** Doit renvoyer le nom de l'objet. */
    public function name(): string
    {
        throw new \LogicException('À implémenter');
    }

    /** Doit renvoyer le poids en kilos. */
    public function weight(): float
    {
        throw new \LogicException('À implémenter');
    }

    /** Doit renvoyer la rareté (Rarity::Common par défaut). Niveau 4. */
    public function rarity(): Rarity
    {
        throw new \LogicException('À implémenter');
    }

    /** Doit renvoyer poids × multiplicateur de rareté (règle du jeu, arbitraire). Niveau 4. */
    public function value(): float
    {
        throw new \LogicException('À implémenter');
    }

    /** Chaque type d'objet se décrit à sa façon : c'est aux sous-classes de l'écrire. */
    abstract public function describe(): string;

    /** Doit renvoyer la même chose que describe() : c'est le contrat Stringable. Niveau 4. */
    public function __toString(): string
    {
        throw new \LogicException('À implémenter');
    }
}
