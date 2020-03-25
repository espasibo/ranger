<?php

class Ranger
{

    private $range = [];
	private $sorted = [];

    public function __construct($range = [])
    {

        $this->range = $range;
		$this->demoSort();
    }

    public function generate()
    {

        $result = '';
        $diap = $fin = false;
        $size = sizeof($this->range);

        for ($i = 0;
             $i <= $size - 2;
             $i++) {
            $number = $symbol = '';
            $fin = $this->range[$i] + 1 != $this->range[$i + 1];

            if (!$diap || $fin) {

                $number = strval($this->range[$i]);
                $symbol = $fin ? ', ' : '-';
            }

            $diap = !$fin;

            $result .= $number . $symbol;
        }
		
		if ($size > 0) {
			
			$result .= strval($this->range[$size - 1]);
		}
        return $result;
    }

    public function demoSort()
    {

        foreach ($this->range as $i) {
            $sorted = [];
			
			if (empty($this->sorted))
				$sorted[] = $i;
			
			foreach ($this->sorted as $k=>$y) {
				
				if ($k == 0 && $i < $y) {
					$sorted[] = $i;
				}
				
				$sorted[] = $y;
				
				if ($i > $y && ($k == sizeof($this->sorted) - 1 || $i < $this->sorted[$k + 1])) {
					
					$sorted[] = $i;
				}
			}

            $this->sorted = $sorted;
        }
		
		$this->range = $this->sorted;
    }
}