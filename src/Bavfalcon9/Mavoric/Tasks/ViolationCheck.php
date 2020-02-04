<?php
/***
 *      __  __                       _      
 *     |  \/  |                     (_)     
 *     | \  / | __ ___   _____  _ __ _  ___ 
 *     | |\/| |/ _` \ \ / / _ \| '__| |/ __|
 *     | |  | | (_| |\ V / (_) | |  | | (__ 
 *     |_|  |_|\__,_| \_/ \___/|_|  |_|\___|
 *                                          
 *   THIS CODE IS TO NOT BE REDISTRUBUTED
 *   @author MavoricAC
 *   @copyright Everything is copyrighted to their respective owners.
 *   @link https://github.com/Olybear9/Mavoric                                  
 */

namespace Bavfalcon9\Mavoric\Tasks;
use pocketmine\scheduler\Task;
use Bavfalcon9\Mavoric\Mavoric;
use Bavfalcon9\Mavoric\misc\Classes\CheatPercentile;
use Bavfalcon9\Mavoric\Bavfalcon9\Mavoric\Bans\BanHandler;

class ViolationCheck extends Task {
    private $mavoric;
    private $warned = [];
    private $lastAlert = [];
    private $seconds = 0;

    public function __construct(Mavoric $mavoric) {
        $this->mavoric = $mavoric;
    }

    public function onRun(int $tick) {
        // Do players
        // Add per cheat violation
        $this->seconds++;
        $this->mavoric->getPlugin()->reportHandler->checkReports();
        $players = $this->mavoric->getPlugin()->getServer()->getOnlinePlayers();
        $waveHandler = $this->mavoric->getWaveHandler();
        $currentWave = $waveHandler->getCurrentWave();

        /*
        foreach ($players as $player) {
            if ($currentWave->isIssued()) {
                $currentWave = $waveHandler->getWave($currentWave->getNumber() + 1);
            }

            $flag = $this->mavoric->getFlag($player);
            $top = $flag->getMostViolations();
            $this->mavoric->getCheatName($top);

            if ($flag->getTotalViolations() >= 53) {
                $flags = $flag->getFlagsByNameAndCount();
                if (!$currentWave->hasPlayer($player->getName())) {
                    $this->mavoric->messageStaff(Mavoric::INFORM, $player->getName() . ' has been automatically added to wave: ' . $currentWave->getNumber());
                }
                $currentWave->addPlayer($player->getName(), '§4[AC] Illegal Client Modifications or Abuse.', $flags, $flag->getTotalViolations());
            }

            if ($flag->getTotalViolations() >= 240) {
                $flags = $flag->getFlagsByNameAndCount();
                $data = $currentWave->addPlayer($player->getName(), '§4[AC] Illegal Client Modifications or Abuse.', $flags, $flag->getTotalViolations());
                $this->mavoric->issueBan($player, $currentWave, $data);
            }
        }*/
    }
}