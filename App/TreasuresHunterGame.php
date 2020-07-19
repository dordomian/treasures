<?php

namespace App;

use App\TreasuresWorld;
use App\Treasure;
/*
 * Class TreasuresHunterGame
 * @package App
 */
 
class TreasuresHunterGame
{
	/**
     * @var TreasuresWorld
     */
    private $_treasuresWorld;
	/**
     * @var int
     */
    private $_currentLevel = 0;
    /**
	 * Array of Treasure objects 
     * @var array
     */
    private $_treasuresArr = [];
	/**
     * @var int
     */
	private $_currentTreasuresValue = 0;
	/**
     * @var int
     */
	private $_currentTreasuresIndex = -1;
    /**
     * Constructor.
     *
	 * @param TreasuresWorld $treasuresWorld
	 *
     * @return void
     */
    public function __construct(TreasuresWorld $treasuresWorld) {
        $this->_treasuresWorld = $treasuresWorld;
    }
     /**
     * Get current step level.
     *
     * @return int
     */
    public function getCurrentStepLevel() {
        return $this->_currentLevel;
    }
    /**
     * Sets current step level.
	 * @param int $inc
     *
     * @return this
     */
    public function setCurrentStepLevel(int $inc) {
        $this->_currentLevel += $inc;
        return $this;
    }
	/**
     * Get current treasure index.
     *
     * @return int
     */
    public function getCurrentTreasureIndex() {
        return $this->_currentTreasuresIndex;
    }
	/**
     * Sets current treasure index.
     *
     * @return int
     */
    public function setCurrentTreasureIndex($currentTreasuresIndex) {
        return $this->_currentTreasuresIndex = $currentTreasuresIndex;
    }
	/**
     * Get current treasure value.
     *
     * @return int
     */
    public function getCurrentTreasureValue() {
        return $this->_currentTreasuresValue;
    }
	/**
     * Sets current treasure value.
     *
     * @return int
     */
    public function setCurrentTreasureValue($currentTreasuresValue) {
        return $this->_currentTreasuresValue = $currentTreasuresValue;
    }
	/**
     * Sets current step level.
	 * @param int $currentStepLevel
	 * @param int $index
     *
     * @return void
     */
	protected function updateTreasures(int $currentStepLevel, int $index) {
		if(!isset($this->_treasuresArr[$currentStepLevel]))
			$this->_treasuresArr[$currentStepLevel] = new Treasure(0,$index);
        
		$this->_treasuresArr[$currentStepLevel]->incrementOccurenceFrequencyValue();
                
        if($this->_treasuresArr[$currentStepLevel]->getOccurenceFrequency() > $this->_currentTreasuresValue) {
            $this->setCurrentTreasureValue($this->_treasuresArr[$currentStepLevel]->getOccurenceFrequency());
            $this->setCurrentTreasureIndex($this->_treasuresArr[$currentStepLevel]->getFirstOccurenceLevel());
        }
	}
   /**
     * Find most common treasure index.
     *
     * @return int
     */
    public function findMostCommonTreasureIndex(string $walkingPath) {
		
		$walkingPath = $this->_treasuresWorld->setWalkingPath($walkingPath)->getWalkingPath();
		
        for ($i = 0; $i < strlen($walkingPath); $i++) {
            $sign = $walkingPath[$i];
            $currentStepLevel = $this->setCurrentStepLevel($this->_treasuresWorld->getStepLevel($sign))->getCurrentStepLevel();
            
            if(TreasuresWorld::isTreasure($sign)) {
				$this->updateTreasures($currentStepLevel,$i);
            }
        }
		
        return $this->getCurrentTreasureIndex();
    }
}
