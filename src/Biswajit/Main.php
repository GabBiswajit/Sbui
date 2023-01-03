<?php

namespace Biswajit;

use onebone\economyapi\EconomyAPI;

use pocketmine\player\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\command\Command;

use pocketmine\command\CommandSender;

use pocketmine\event\Listener;

use pocketmine\event\player\PlayerJoinEvent;

use pocketmine\event\player\PlayerInteractEvent;

use pocketmine\event\inventory\InventoryTransactionEvent;

use pocketmine\event\player\PlayerDropItemEvent;

use pocketmine\utils\Config;

use pocketmine\scheduler\ClosureTask;

use pocketmine\item\Item;

use pocketmine\item\ItemFactory;

use pocketmine\Server;

use jojoe77777\FormAPI\SimpleForm;

class Main extends PluginBase implements Listener {

  

  public function onEnable() : void {

    $this->getLogger()->info("SBMenuUI By Biswajit Is Now Enabled ✅");

    $this->getServer()->getPluginManager()->registerEvents($this, $this);

  }

  

  public function onJoin(PlayerJoinEvent $event) {

      $sender = $event->getPlayer();

      $item = ItemFactory::getInstance()->get(399, 0, 1);

      $item->setCustomName("§r§l§bASSISTANT MENU  §r§7(Right-Click)");

      $sender->getInventory()->setItem(8, $item, true);

    }

  public function onClick(PlayerInteractEvent $event) {

      $sender = $event->getPlayer();

      $item = $event->getItem();

      if ($item->getId() === 399 && $item->getCustomName() === "§r§l§bASSISTANT MENU  §r§7(Right-Click)" && $item->getCount() === 1) {

        $this->ccsbmenu($sender);

      }

    }

  public function onTransaction(InventoryTransactionEvent $event) {

      $transaction = $event->getTransaction();

      foreach ($transaction->getActions() as $action) {

        $item = $action->getSourceItem();

        $source = $transaction->getSource();

        if ($source instanceof Player && $item->getId() === 399 && $item->getCustomName() === "§r§l§bASSISTANT MENU  §r§7(Right-Click)" && $item->getCount() === 1) {

          $event->cancel(true);

        }

      }

    }

    

  public function ccsbmenu(Player $player) {

    $form = $this->getServer()->getPluginManager()->getPlugin("FormAPI")->createSimpleForm(function (Player $player, int $data = null){

      if($data === null){

				return true;			}

      switch($data){

        case 0:

            $this->getServer()->dispatchCommand($player, "sbui");

        break;

        

        case 1:

            $this->getServer()->dispatchCommand($player, "profile");

        break;

        

        case 2:

            $this->getServer()->dispatchCommand($player, "mcmmo");

        break;

        

        case 3:

            $this->getServer()->dispatchCommand($player, "recipes");

        break;

        

        case 4:

            $this->getServer()->dispatchCommand($player, "shop");

        break;

        

        case 5:

            $this->getServer()->dispatchCommand($player, "quest");

        break;

        

        case 6:

            $this->getServer()->dispatchCommand($player, "kit");

        break;

        

        case 7:

            $this->getServer()->dispatchCommand($player, "job");

        break;

        

        case 8:

            $this->getServer()->dispatchCommand($player, "ec");

        break;

        

        case 9:

            $this->getServer()->dispatchCommand($player, "ah");

        break;

        

        case 10:

            $this->getServer()->dispatchCommand($player, "bank");

        break;

        

        case 11:

            $this->getServer()->dispatchCommand($player, "bazaar");

        break;

        

        case 12:

            $this->getServer()->dispatchCommand($player, "travel");

        break;

        

        case 13:

            $this->getServer()->dispatchCommand($player, "settings");

        break;

       }

      });

      $form->setTitle("§l§cASSISTANT MENU");

      $form->setContent("§r§9Please Select The Next Menu For Open:");

      $form->addButton("§l§bISLAND MENU\n§r§l§d» §r§8Tap To Open", 1, "https://www.clipartmax.com/png/full/162-1624622_brenz-block-is-a-skyblock-minecraft-logo.png");

      $form->addButton("§l§bYOUR PROFILE\n§r§l§d» §r§8Tap To Open", 1, "https://icons-for-free.com/iconfiles/png/512/profile+profile+page+user+icon-1320186864367220794.png");

      $form->addButton("§l§bSKILLS MENU\n§r§l§d» §r§8Tap To Open", 1, "https://cdn-icons-png.flaticon.com/512/3095/3095221.png");

      $form->addButton("§l§bRECIPES BOOK\n§r§l§d» §r§8Tap To Open", 1, "https://www.clipartmax.com/png/full/82-828417_recipe-book-icon-recipe-book-png.png");

      $form->addButton("§l§bSHOP MENU\n§r§l§d» §r§8Tap To Open", 1, "https://cdn-icons-png.flaticon.com/512/273/273177.png");

      $form->addButton("§l§bQUEST MENU\n§r§l§d» §r§8Tap To Open", 1, "https://cdn-icons-png.flaticon.com/512/1673/1673620.png");

      $form->addButton("§l§bKIT MENU\n§r§l§d» §r§8Tap To Open", 1, "https://www.clipartmax.com/png/full/283-2833130_small-business-toolkit-icon-business-toolkit-icon.png");

      $form->addButton("§l§bJOB MENU\n§r§l§d» §r§8Tap To Open", 1, "https://cdn-icons-png.flaticon.com/512/1803/1803330.png");

      $form->addButton("§l§bENDER CHEST\n§r§l§d» §r§8Tap To Open", 1, "https://www.clipartmax.com/png/full/290-2902217_brasschest-minecraft-chest-png.png");

      $form->addButton("§l§bAUCTION HOUSE\n§r§l§d» §r§8Tap To Open", 1, "https://cdn-icons-png.flaticon.com/512/345/345629.png");

      $form->addButton("§l§bBANK MENU\n§r§l§d» §r§8Tap To Open", 1, "https://raw.githubusercontent.com/ElectroGamesYT/BankUI/5fc9b197a614d37a81881398a23ade65e68ae513/icon.png");

      $form->addButton("§l§bBAZAAR MENU\n§r§l§d» §r§8Tap To Open", 1, "https://icons.iconarchive.com/icons/rockettheme/ecommerce/256/shop-icon.png");

      $form->addButton("§l§bFAST TRAVEL\n§r§l§d» §r§8Tap To Open", 1, "https://cdn.icon-icons.com/icons2/2239/PNG/512/world_travel_icon_134812.png");

      $form->addButton("§l§bSETTINGS\n§r§l§d» §r§8Tap To Open", 1, "https://cdn0.iconfinder.com/data/icons/the-essentials-ultra-colour-collection/60/The_Essentials_-_Ultra_Color_-_004_-_Settings-1024.png");

      $form->sendtoPlayer($player);

        return $form;

     }

 }
