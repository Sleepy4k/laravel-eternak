<?php
  
namespace App\Traits;

use App\Models\FarmData;

trait RandomNumber
{
    /**
     * Set min number
     *
     * @var int
     */
    protected $minNumber = 0;

    /**
     * Set max number.
     *
     * @var int
     */
    protected $maxNumber = 9;

    /**
     * List exists livestock
     *
     * @var object
     */
    protected $livestock = [
        'kambing' => 'kambing'
    ];
    
    /**
     * Set name code for livestock
     *
     * @var object
     */
    protected $nameCode = [
        'kambing' => 'kb',
        'sapi' => 'sp'
    ];

    /**
     * Set random unique id
     * 
     * @param $livestock, $length, $type
     * @var void
     */
    protected function generateUniqueId($livestock, $length = 8)
    {
        $number = '';
        $getNameCode = $this->generateNameCode($livestock);
        
        if (!is_null($getNameCode)) {
            $name = $getNameCode;
        }

        do {
            for ($i=$length; $i--; $i>0) {
                $number .= mt_rand($this->minNumber, $this->maxNumber);
            }
        } while ($this->checkUniqueId($livestock, $number));

        return $name.$number;
    }

    /**
     * Check unique id
     * 
     * @param $livestock, $number, $type
     * @var void
     */
    protected function checkUniqueId($livestock, $number)
    {
        if ($livestock === $this->livestock['kambing']) {
            return FarmData::where('register_number', $number)->first();
        } else {
            return false;
        }
    }

    /**
     * Generate name code for unique id
     * 
     * @param $livestock
     * @var void
     */
    protected function generateNameCode($livestock)
    {
        $result = '';

        if ($livestock === $this->livestock['kambing']) {
            $result = $this->nameCode['kambing'];
        } else {
            $result = null;
        }

        if (!is_null($result)) {
            $result = $result.'-';
        }

        return $result;
    }
}