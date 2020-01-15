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

namespace Bavfalcon9\Mavoric\events\player;

use pocketmine\Player;
use pocketmine\math\Vector3;
use Bavfalcon9\Mavoric\Mavoric;
use Bavfalcon9\Mavoric\events\MavoricEvent;

class PlayerAttack extends MavoricEvent {
    /** @var Player */
    private $attacker;
    /** @var Player */
    private $victim;
    /** @var Bool */
    private $projectile;

    public function __construct(Mavoric $mavoric, Player $attacker, Player $victim, Bool $projectile) {
        parent::__construct($mavoric, $attacker);
        $this->attacker = $attacker;
        $this->victim = $victim;
        $this->projectile = $projectile;
    }

    public function getAttacker(): ?Player {
        return $this->attacker;
    }

    public function getVictim(): ?Player {
        return $this->attacker;
    }

    public function getDistance(): float {
        $pos1 = $this->attacker->getPosition() ?? new Vector3(0,0,0);
        $pos2 = $this->victim->getPosition() ?? new Vector3(0,0,0);
        return $pos1->distance($pos2);
    }

    public function isPlayerToPlayer(): Bool {
        return !$this->projectile;
    }
}