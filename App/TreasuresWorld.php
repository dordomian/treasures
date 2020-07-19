<?php

namespace App;

use Treasure;
/*
 * Class TreasuresWorld
 * @package App
 */
 
class TreasuresWorld
{
	const STEP_UP = ')',
        STEP_DOWN = '(',
        TREASURE = '*'
	;
	/** @var array */
    private static $_stepLevels = array(
        self::STEP_UP => 1,
        self::STEP_DOWN => -1,
        self::TREASURE => 0,
    );
	/*
	 * Walking path
     * @var string
     */
    private $_walkingPath = '';
    /**
     * Constructor.
     *
	 * @param string walkingPath
	 *
     * @return void
     */
    public function __construct(string $walkingPath = null) {
        $this->_walkingPath = $walkingPath;
    }
	/**
     * Sets walking path.
     *
     * @return void
     */
    public function setWalkingPath(string $walkingPath) {
        $this->_walkingPath = $walkingPath;
		return $this;
    }
	/**
     * Get walking path.
     *
     * @return string
     */
    public function getWalkingPath() {
        return $this->_walkingPath;
    }
	/**
     * Get steps levels array.
     *
     * @return array
     */
    public static function getStepLevels() {
        return self::$_stepLevels;
    }
	/**
     * Return if string is Treasure sign.
     *
     * @return bool
     */
	public static function isTreasure(string $sign) {
		return $sign == self::TREASURE;
	}
    /**
     * Check Walking path sign.
     *
	 * @param string $sign
	 *
     * @return int
     * @throws \InvalidArgumentException
     */
    public function getStepLevel(string $sign) {
		$stepsLevels = self::getStepLevels();
		if(!isset($stepsLevels[$sign]))
			throw new \InvalidArgumentException('Value must be within ' . implode(',',array_keys($stepsLevels)) . ' values');
		return $stepsLevels[$sign];
    }
}
