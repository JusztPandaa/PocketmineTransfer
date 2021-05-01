<?php

namespace Pandaa\Transfercommand;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\command\{Command,CommandSender};

class Transferserver extends PluginBase implements Listener {

    public function onEnable() {
       $cmd = $this->getServer()->getCommandMap();
       if($cmd !== null){
       $cmd->unregister("transferserver");
       }
       $this->getServer()->getPluginManager()->registerEvent($this, $this);
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args){
        switch($cmd->getName()){
            case "transferserver":

                if(count($args) < 1){
                    throw new InvalidCommandSyntaxException();
                }elseif(!($sender instanceof Player)){
                    $sender->sendMessage("This command must be executed as a player");

                    return false;
                }

                $sender->transfer($args[0], (int) ($args[1] ?? 19132));

                return true;





        }
    }
}
