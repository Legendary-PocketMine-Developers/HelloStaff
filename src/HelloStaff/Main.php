<?php
namespace HelloStaff;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{
    public function onLoad(){
        $this->getLogger()->info(TextFormat::LIGHT_PURPLE . "HelloStaff is Loading!");
    }
    public function onEnable(){
        $this->getLogger()->info(TextFormat::LIGHT_PURPLE . "HelloStaff is Enabled!");
    }
    public function onDisable(){
        $this->getLogger()->info(TextFormat::LIGHT_PURPLE . "Bye Staff!");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args){
        switch($command->getName()){
/**
*
*                                         checkop
*
**/
            case "checkop":
                if(!(isset($args[0]))){
                    return false;
                }
                $name = $args[0];
	 			$targetPlayer = $this->getServer()->getPlayer($name);
                if (!($targetPlayer instanceof $name)){ 
                $sender->sendMessage($name . " isn't online right now.");
                    return true;
                }
                /**	 			$name = $args[0];
	 			$targetPlayer = $this->getServer()->getPlayer($name);
                **/
                if($targetPlayer instanceof Player){
	 				if($targetPlayer->isOp()){
	 					$sender->sendMessage($args[0] . " is OP!" );
                        return true;
	 				}
	 		    }else{
	 		        $sender->sendMessage($args[0] . " is not OP.");
                    return true;
	 			}
                return true;
                break;
/**
*
*                                 checkgm
*
**/

            case "checkgm":
                
                $name = $args[0];
	 			$player = $this->getServer()->getPlayer($sender->getName());
                
                if (!($targetPlayer instanceof $name)){ 
                $sender->sendMessage($name . " isn't online right now.");
                    return true;
	 			}
	 			if ($player->getGamemode() == 1){
	 				$sender->sendMessage(TextFormat::GREEN . $args[0] . " is in ". "creative!");
	 				return true;
	 			}
	 			if ($player->getGamemode() == 0){
	 				$sender->sendMessage(TextFormat::GREEN . $args[0] . " is in ". "survival!");
	 				return true;
	 			}
	 			if ($player->getGamemode() == 2){
	 				$sender->sendMessage(TextFormat::GREEN . $args[0] . " is in ". "Adventure Mode!");
	 				return true;
	 			}
	 			if ($player->getGamemode() == 3){
	 				$sender->sendMessage(TextFormat::GREEN . $args[0] . " is in ". "Spectator Mode!");
				}
	 				return true;
					break;
/**
*
*              Main Command                     
*
**/

            case "hellostaff":
                    $sender->sendMessage(TextFormat::GREEN . "HelloStaff:");
                    $sender->sendMessage(TextFormat::GREEN . "Used to allow anyone to keep track on the staff");
                    $sender->sendMessage(TextFormat::GREEN . "/checkop <playerName> To see if Player is op.");
                    $sender->sendMessage(TextFormat::GREEN . "/checkgm <playerName> To see what Gamemode they are in.");
                return true;
            break;
        default:
            return false;
        }
    return false;
    }
}
