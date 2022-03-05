<?php

namespace Rules\DaDevGuy;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use DaDevGuy\Rules\libs\jojoe77777\FormAPI\SimpleForm;

use pocketmine\player\Player;
use pocketmine\Server;

class Rule extends PluginBase {
    public function onEnable(): void {
    @mkdir($this->getDataFolder());
    $this->saveDefaultConfig();
    $this->getResources("config.yml");
    }
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {
        if($cmd->getName() == "rules") {
            if($sender instanceof Player) {
                $this->rules($sender);
            } else {
                $sender->sendMessage("Please Use This Command In-Game!");
            }
            return true;
        }
        return false;
    }
    public function rules($player) {
                $form =  new SimpleForm(function(Player $player, int $data =  null){
                   if($data === null){
                       return true;
                   }

                   switch($data){
                       case 0:
                        $player->sendMessage("Thanks For Accepting Our Rules!!");
                        break;
                   }
                });
                $name = $player->getName();
                $form->setTitle("§c§lRules!");
                $form->setContent($this->getConfig()->get("rules"));
                $form->addButton("§6§lI Agree!", 0, "textures/ui/realms_slot_check");
                $form->sendToPlayer($player);
                return $form;
            }
}
