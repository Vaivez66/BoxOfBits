<?php

/*
  ____             ____   __ ____  _ _       
 |  _ \           / __ \ / _|  _ \(_) |      
 | |_) | _____  _| |  | | |_| |_) |_| |_ ___ 
 |  _ < / _ \ \/ / |  | |  _|  _ <| | __/ __|
 | |_) | (_) >  <| |__| | | | |_) | | |_\__ \
 |____/ \___/_/\_\\____/|_| |____/|_|\__|___/
 
 The growing plugin with so many features
 
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

class gmsp extends Loader{
    
    private $permMessage = Colour::DARK_RED."You do not have permission to run this command!";
    private $consoleMsg = Colour::DARK_RED."This command can only be executed in-game!";
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        if(strolower($cmd->getName() == "gmsp")){
            if(!($sender instanceof Player)){
				if(!isset($args[0])){
					$sender->sendMessage("§4Usage: /gmsp [playername] - [playername] required when run from console!");
                }else{
                    $player = $this->getServer()->getPlayer($args[0]);
				    if($player instanceof Player){
                        if($player->getGamemode() == 3){
							$name = $player->getName();
							$sender->sendMessage("§4$name is already in Spectator");
				        }else{
							$player->setGamemode(3);
							$player->sendMessage("§aYou are now in Spectator");
							$name = $player->getName();
							$sender->sendMessage("§a$name is now in Spectator");
							$line = "\n";
							$message = str_replace("{player}", $name, "{line}", $line, $this->cfg->get("GamemodeChangePopup"));
							$this->getServer()->broadcastPopup($message);
		          		}else{
				            $sender->sendMessage("§4Player Not Found");
			         	}
                    }
				}
            }
            if($sender instanceof Player){
                if(!isset($args[0])){
				    if($player->hasPermission("boxofbits" or "boxofbits.gmsp")){
				        if($sender->getGamemode() == 3){
				            $sender->sendMessage("§4You are already in Spectator");
                        }else{
				            $sender->setGamemode(3);
				            $sender->sendMessage("§aYou are now in Spectator");
                            $name = $player->getName();
                            $line = "\n";
                            $message = str_replace("{player}", $name, "{line}", $line, $this->cfg->get("GamemodeChangePopup"));
                            $this->getServer()->broadcastPopup($message);
						}
                    }else{
				        $sender->sendMessage("$this->$permMessage");
				    }
				}
                if(isset($args[0])){
				    if($sender->hasPermission("boxofbits.gmsp")){
				        $player = $this->getServer()->getPlayer($args[0]);
				        if($player instanceof Player){
				            if($player->getGamemode() == 3){
				                $name = $player->getName();
								$sender->sendMessage("§4$name is already in Spectator");
				            }else{
								$player->setGamemode(3);
								$player->sendMessage("§aYou are now in Spectator");
								$name = $player->getName();
								$sender->sendMessage("§a$name is now in Spectator");|
								$line = "\n";
								$message = str_replace("{player}", $name, "{line}", $line, $this->cfg->get("GamemodeChangePopup"));
								$this->getServer()->broadcastPopup($message);
				            }
				        }else{
				            $sender->sendMessage("§4Player Not Found");
				        }
				    }else{
				        $sender->sendMessage("$this->$permMessage");
				    }
				}
            }
        }
        return true;
    }

}
