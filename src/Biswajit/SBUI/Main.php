<?php

namespace Biswajit\SBUI;

use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\utils\Config;
use pocketmine\item\Item;
use pocketmine\item\StringToItemParser;
use pocketmine\Server;
use jojoe77777\FormAPI\SimpleForm;

class Main extends PluginBase implements Listener {
    
    private Config $config;
    
    protected function onEnable() : void {
        $this->saveDefaultConfig();
        $this->config = $this->getConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

  public function onJoin(PlayerJoinEvent $event) {
      $sender = $event->getPlayer();
      $itemID = $this->config->getNested('skyblockMenu.itemID');
      $itemName = $this->config->getNested('skyblockMenu.itemName');
      $itemLore = $this->config->getNested('skyblockMenu.itemLore');
      $item = StringToItemParser::getInstance()->parse($itemID);
      $item->setCustomName($itemName);
      $item->setLore($itemLore);
      $item->getNamedTag()->setString("skyblockmenu", "menu");
      // better way to lock item..
      $item->getNamedTag()->setByte("minecraft:item_lock", 1);
      $sender->getInventory()->setItem(8, $item, true);
    }

  public function onClick(PlayerInteractEvent $event) {
      $sender = $event->getPlayer();

      $item = $event->getItem();
      if ($item->getNamedTag()->getTag("skyblockmenu") !== null) {
        $this->ccsbmenu($sender);
      }
    }

  public function ccsbmenu(Player $player): void {
  	
    $form = new SimpleForm(function (Player $player, int $data = null) {
            if ($data === null) {
                return;
            }

      switch($data){
        case 0:
           $this->getServer()->dispatchCommand($player, $this->config->get("Form-1-CMD"));
        break;
        
        case 1:
            $this->getServer()->dispatchCommand($player, $this->config->get("Form-2-CMD"));
        break;

        case 2:
            $this->getServer()->dispatchCommand($player, $this->config->get("Form-3-CMD"));
        break;       

        case 3:
            $this->getServer()->dispatchCommand($player, $this->config->get("Form-4-CMD"));
        break;      

        case 4:
            $this->getServer()->dispatchCommand($player, $this->config->get("Form-5-CMD"));
        break;
        
        case 5:
            $this->getServer()->dispatchCommand($player, $this->config->get("Form-6-CMD"));
        break;

        case 6:
            $this->getServer()->dispatchCommand($player, $this->config->get("Form-7-CMD"));
        break;
        
        case 7:
            $this->getServer()->dispatchCommand($player, $this->config->get("Form-8-CMD"));
        break;

        case 8:
            $this->getServer()->dispatchCommand($player, $this->config->get("Form-9-CMD"));
        break;
        
        case 9:
            $this->getServer()->dispatchCommand($player, $this->config->get("Form-10-CMD"));
        break;        

        case 10:
            $this->getServer()->dispatchCommand($player, $this->config->get("Form-11-CMD"));
        break;
        
        case 11:
            $this->getServer()->dispatchCommand($player, $this->config->get("Form-12-CMD"));
        break;

        case 12:
            $this->getServer()->dispatchCommand($player, $this->config->get("Form-13-CMD"));
        break;        

        case 13:
            $this->getServer()->dispatchCommand($player, $this->config->get("Form-14-CMD"));
        break;

       }
      });
      
      $form->setTitle("§l§cASSISTANT MENU");
      $form->setContent("§r§9Please Select The Next Menu For Open:");
      $form->addButton($this->config->get("Form-1"), 1, $this->config->get("Form-1-Img"));
      $form->addButton($this->config->get("Form-2"), 1, $this->config->get("Form-2-Img"));
      $form->addButton($this->config->get("Form-3"), 1, $this->config->get("Form-3-Img"));
      $form->addButton($this->config->get("Form-4"), 1, $this->config->get("Form-4-Img"));
      $form->addButton($this->config->get("Form-5"), 1, $this->config->get("Form-5-Img"));
      $form->addButton($this->config->get("Form-6"), 1, $this->config->get("Form-6-Img"));
      $form->addButton($this->config->get("Form-7"), 1, $this->config->get("Form-7-Img"));
      $form->addButton($this->config->get("Form-8"), 1, $this->config->get("Form-8-Img"));
      $form->addButton($this->config->get("Form-9"), 1, $this->config->get("Form-9-Img"));
      $form->addButton($this->config->get("Form-10"), 1, $this->config->get("Form-10-Img"));
      $form->addButton($this->config->get("Form-11"), 1, $this->config->get("Form-11-Img"));
      $form->addButton($this->config->get("Form-12"), 1, $this->config->get("Form-12-Img"));
      $form->addButton($this->config->get("Form-13"), 1, $this->config->get("Form-13-Img"));
      $form->addButton($this->config->get("Form-14"), 1, $this->config->get("Form-14-Img"));
      $player->sendForm($form);
     }
}
