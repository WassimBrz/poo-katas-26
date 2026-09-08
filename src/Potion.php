<?php

declare(strict_types=1);

namespace Dungeon;

/** Une potion : un objet qui rend des points de vie. Niveau 3. */
final class Potion extends Item
{
    /** Doit appeler le constructeur parent avec nom, poids et rareté, puis garder $healing. */
    public function __construct(
        string $name,
        float $weight,
        private readonly int $healing,
        Rarity $rarity = Rarity::Common,
    ) {
        throw new \LogicException('À implémenter');
    }

    /** Doit renvoyer le nombre de points de vie rendus. */
    public function healing(): int
    {
        throw new \LogicException('À implémenter');
    }

    /** Doit renvoyer : "Potion de soin : potion (0.5 kg, +5 PV)". */
    public function describe(): string
    {
        throw new \LogicException('À implémenter');
    }
}
