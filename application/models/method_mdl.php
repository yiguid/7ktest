<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Interval
{
	private $start;
	private $end;
	public function getStart()
	{
		return $this->start;
	}
	public function getEnd()
	{
		return $this->end;
	}
	public function countInt()
	{
		return $this->end - $this->start + 1;
	}
	public function update($s,$e)
	{
		$this->start =$s;
		$this->end = $e;
	}
}

class Method_mdl extends CI_Model {

	public function __construct()
	{
		parent:: __construct();
	}


	public function isIntersectant($inv1,$inv2)
	{
		if($inv1->getEnd() < $inv2->getStart() || $inv1->getStart() > $inv2->getEnd())
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function countPageNum($pageSequence)
	{
		$failedResult = -1;
		$sum = 0;
		$pageArray=explode(',',$pageSequence);	
		$singlePattern = '/^\d+$/';
		$doublePattern = '/^(\d+)-(\d+)$/';
		$invArr = array();
		foreach($pageArray as $pageElement)
		{
			$interval = new	Interval();
			$flag = false;
			if(preg_match($singlePattern,$pageElement))
			{
				$interval->update($pageElement,$pageElement);
				$flag = true;
			}elseif(preg_match($doublePattern,$pageElement,$match))
			{
				if($match[1] <= $match[2])
				{
					$interval->update($match[1],$match[2]);
					$flag = true;
				}
			}
			if($flag){
				foreach($invArr as $inv)
				{
					if($this->isIntersectant($interval,$inv))
					{
						return $failedResult;
					}
				}
				$invArr[]=$interval;
				$sum+=$interval->countInt();
			}else{
				return $failedResult;
			}
		}
		return $sum;
		
	}
}
?>