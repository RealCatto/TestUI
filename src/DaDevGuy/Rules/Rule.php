<?php

namespace DaDevGuy\Rules;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use DaDevGuy\Rules\libs\jojoe77777\FormAPI\SimpleForm;

use pocketmine\player\Player;
use pocketmine\Server;




class Rule extends PluginBase {
    public function onEnable(): void {
        $this->getLogger()->info("Plugin Is Enabled!");
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
                $form->setContent("§dHello, §a$name\n\n§9Read These Rules Before Playing:\n§2» §7Don't Use Toolbox\n§2» §7Join Our Discord Server\n§2» §7If You Found Any Bug So Report Us In Discord\n§2» §7Don't Spam In Chat\n§2» §7Nether And Come In Future\n§2» §7Put Items One By One For Craft In Work Bench\n§2» §7Type /recipes For See Custom Recipes Book\n§2» §7Vote Our Server To Get OP Rewards\n§2» §7Don't Abuse Anyone\n§2» §7Live Like A Family In Server\n§2» §7Use Fast-Travel To Travel\n§2» §7Type /kit For Claiming Free Kits\n§2» §7Purchase Ranks In our Discord Server\n\n§cFollow That Rules And See Full Info And After Enjoy Our Server!");
                $form->addButton("§6§lI Agree!", 0, "textures/ui/realms_slot_check");
                $form->sendToPlayer($player);
                return $form;
            }
}
