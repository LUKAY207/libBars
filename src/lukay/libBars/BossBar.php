<?php

namespace lukay\libBars;

use pocketmine\entity\Entity;
use pocketmine\network\mcpe\protocol\BossEventPacket;

class BossBar {

    private BossEventPacket $bossEventPacket;

    /**
     * PocketMine-MP has already implemented a Boss Bar API.
     * However, this one should be simpler to use.
     */

    public function __construct(string $title, float $healthPercent, int $color) {
        $this->bossEventPacket = new BossEventPacket();
        $this->bossEventPacket->bossActorUniqueId = Entity::nextRuntimeId();
        $this->bossEventPacket->title = $title;
        $this->bossEventPacket->healthPercent = $healthPercent;
        $this->bossEventPacket->color = $color;
    }

    public function show(): void {
        BossEventPacket::show
        (
            $this->bossEventPacket->bossActorUniqueId,
            $this->bossEventPacket->title,
            $this->bossEventPacket->healthPercent,
            $this->bossEventPacket->color
        );
    }
}
