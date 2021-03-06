<?php

/*
  ____             ____   __ ____  _ _       
 |  _ \           / __ \ / _|  _ \(_) |      
 | |_) | _____  _| |  | | |_| |_) |_| |_ ___ 
 |  _ < / _ \ \/ / |  | |  _|  _ <| | __/ __|
 | |_) | (_) >  <| |__| | | | |_) | | |_\__ \
 |____/ \___/_/\_\\____/|_| |____/|_|\__|___/
 
 The growing plugin with so many features, an alternative to Essentials or EssentialsPE
 
 */
 
namespace TheDragonRing\BoxOfBits\Commands;
 
use TheDragonRing\BoxOfBits\Loader;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\PluginCommand;
use pocketmine\permission\Permission;
use pocketmine\utils\Config;
use pocketmine\Player;
use pocketmine\Server;

class slay extends Loader{
    
    private $permMessage = "§4You do not have permission to run this command!";
    private $consoleMsg = "§4This command can only be executed in-game!";
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName() == "slay")){
            if(!($sender instanceof Player)){
				if(!isset($args[0])){
				    $sender->sendMessage(Colour::DARK_RED."Usage: /slay <playername>");
				}
				if(isset($args[0])){
				    $player = $this->getServer()->getPlayer($args[0]);
				    if($player instanceof Player){
				        $player->setHealth(0);
				        $player->sendMessage(Colour::DARK_RED."§4You were slain by the CONSOLE");
				        $sender->sendMessage(Colour::DARK_RED."§b$player has been slain");
				        $this->getServer()->broadcastPopup("§4$player was slain by the CONSOLE");
				    }else{
				        $sender->sendMessage(DARK_RED."Player Not Found");
					}
				}
            }
            if($sender instanceof Player){
				if($sender->hasPermission("boxofbits" or "boxofbits.slay")){
				    if(!isset($args[0])){
				        $sender->sendMessage(Colour::DARK_RED."Usage: /slay <playername>");
				    }
				    if(isset($args[0])){
				        $player = $this->getServer()->getPlayer($args[0]);
				        if($player instanceof Player){
				            $name = $sender->getName();
				            $player->setHealth(0);
				            $player->sendMessage(Colour::DARK_RED."§4You were slain by $name");
				            $sender->sendMessage(Colour::DARK_RED."§b$player has been slain");
				            $this->getServer()->broadcastPopup("§4$player was slain by $name");
				        }else{
				            $sender->sendMessage(DARK_RED."Player Not Found");
					   }
				    }
                }
            }
        }
        return true;
    }

}
