<?php

namespace GamerMJay\EasyNoFallDamage;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\event\entity\EntityDamageEvent;
class Main extends PluginBase implements Listener {

public function onEnable(): void 
 {
 $this->getServer()->getPluginManager()->registerevents(($this), $this);
}
 
    public function onDamage(EntityDamageEvent $event): void {
        $entity = $event->getEntity();
        if ($entity instanceof Player and $event->getCause() === EntityDamageEvent::CAUSE_VOID) {
            $entity->teleport(Server::getInstance()->getWorldManager()->getDefaultWorld()->getSafeSpawn());
        }
        $event->cancel();
    }
}
