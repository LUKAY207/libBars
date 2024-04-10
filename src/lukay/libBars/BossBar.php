<?php

namespace lukay\libBars;

use pocketmine\entity\Entity;
use pocketmine\network\mcpe\protocol\BossEventPacket;
use pocketmine\player\Player;

class BossBar {

    private BossEventPacket $bossEventPacket;

    /**
     * PocketMine-MP has already implemented a Boss Bar API.
     * However, this one should be simpler to use.
     */

    public function __construct(string $title, bool $darkenScreen = false, float $healthPercent = 100.0, int $color = 0, int $overlay = 0) {
        $this->bossEventPacket = new BossEventPacket();
        $this->bossEventPacket->bossActorUniqueId = Entity::nextRuntimeId();
        $this->bossEventPacket->title = $title;
        $this->bossEventPacket->healthPercent = $healthPercent;
        $this->bossEventPacket->darkenScreen = $darkenScreen;
        $this->bossEventPacket->color = $color;
        $this->bossEventPacket->overlay = $overlay;
    }

    public function show(Player $player): void {
        BossEventPacket::registerPlayer($this->bossEventPacket->bossActorUniqueId, $player->getId());
        BossEventPacket::show
        (
            $player->getId(),
            $this->bossEventPacket->title,
            $this->bossEventPacket->healthPercent,
            $this->bossEventPacket->darkenScreen,
            $this->bossEventPacket->color,
            $this->bossEventPacket->overlay
        );
    }
}
