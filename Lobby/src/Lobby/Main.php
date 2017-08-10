<?php

namespace Lobby;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\utils\TextFormat as C;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener {
  
  public $prefix = C::GRAY.">";
  
  public function onEnable(){
	  $this->getLogger()->info($this->prefix.C::GREEN."Lobby by Karan Activated!");
  }
  public function onDisable(){
	  $this->getLogger()->info($this->prefix.C::RED."Deactivated!");
  }
  public function onCommand(CommandSender $s, Command $cmd,$label, array $args){
    $ds = $this->getServer()->getDefaultLevel()->getSpawnLocation();
    $name = $s->getName();
    switch($cmd->getName()){
      case "Lobby":
        if($s instanceof Player){
          $s->sendMessage($this->prefix.C::RED." Welcome to the Lobby ".C::GRAY.$name);
          $s->teleport($ds);
          return true;
		  }else{
			  $s->sendMessage(C::RED."Use this Command in-game");
			  return true;
		  }
	}
  }
}