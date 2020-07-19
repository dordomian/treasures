<?php

namespace App;
/*
 * Class Treasure
 * @package App
 */
 
class Treasure
{
	/*
	 * Occurence frequency value.
     * @var int
     */
    private $_occurenceFrequencyValue = 0;
	/*
	 * Level of first occurence
     * @var int
     */
    private $_firstOccurenceLevel = 0;
    /**
     * Constructor.
     *
	 * @param int $occurenceFrequencyValue
	 * @param int $firstOccurenceLevel
	 *
     * @return void
     */
    public function __construct(int $occurenceFrequencyValue = 0, int $firstOccurenceLevel = 0) {
        $this->_occurenceFrequencyValue = $occurenceFrequencyValue;
		$this->_firstOccurenceLevel = $firstOccurenceLevel;
    }
	/**
     * Get occurence frequency.
     *
     * @return int
     */
    public function getOccurenceFrequency() {
        return $this->_occurenceFrequencyValue;
    }
	/**
     * Sets occurence frequency.
     *
     * @return void
     */
    public function setOccurenceFrequency(int $occurenceFrequencyValue) {
        return $this->_occurenceFrequencyValue = $occurenceFrequencyValue;
    }
	/**
     * Get first occurence level.
     *
     * @return int
     */
    public function getFirstOccurenceLevel() {
        return $this->_firstOccurenceLevel;
    }
	/**
     * Sets first occurence level.
     *
     * @return void
     */
    public function setFirstOccurenceLevel(int $firstOccurenceLevel) {
        return $this->_firstOccurenceLevel = $firstOccurenceLevel;
    }
	/**
     * Increment occurence frequency value.
     *
     * @return void
     */
    public function incrementOccurenceFrequencyValue() {
        $this->_occurenceFrequencyValue++;
    }
}
