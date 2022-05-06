<?php

namespace GM;

use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\event\Listener as L;
use pocketmine\plugin\PluginBase as P;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\player\GameMode;

#libs
use libs\FormAPI\SimpleForm;

class Main extends P implements L {
  
  public $prefix = "§l§5Game§7Mode §r§7» ";
  
  public function onEnable(): void {
    
  $this->getServer()->getLogger()->info($this->prefix."Plugin Enable");                                                                                                                                                                                                                                                                                                                                                                                       
  
  }
  
  public function onCommand(CommandSender $pl, Command $cmd, string $label, array $args): bool{
    switch($cmd->getName()){
      case "gm":
        if($pl->hasPermission("gm.cmd")){
          $this->getGamemodes($pl);
        }else{
          
        }
      break;
    }
    return true;
  }
  
  public function getGamemodes(Player $pl){
    $form = new SimpleForm(function (Player $pl, int $data = null){
      if($data === null){
        return true;
      }
      switch($data){
        case 0:
          $pl->setGamemode(GameMode::SURVIVAL());
          $pl->sendTip($this->prefix."Se Cambio el Modo de Juego");
        break;
        case 1:
          $pl->setGamemode(GameMode::CREATIVE());
          $pl->sendTip($this->prefix."Se Cambio el Modo de Juego");
        break;
        case 2:
          $pl->setGamemode(GameMode::SPECTATOR());
          $pl->sendTip($this->prefix."Se Cambio el Modo de Juego");
        break;
        case 3:
          $pl->setGamemode(GameMode::ADVENTURE());
          $pl->sendTip($this->prefix."Se Cambio el Modo De Juego");
        break;
      }
    });
    $form->setTitle("§l§5Gamemode");
    $form->addButton("§l§8SURVIVAL");
    $form->addButton("§l§8CREATIVO");
    $form->addButton("§l§8ESPECTADOR");
    $form->addButton("§l§8AVENTURA");
    $form->sendToPlayer($pl);
    return $form;
  }
}
