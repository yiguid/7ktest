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

	public function computeMoney($printerid,$papersize,$isdoubleside,$range,$fenshu,$zhuangding)
	{
		$this->db->select('*');
		$this->db->from('printer_meta');
		$this->db->where('printerid',$printerid);
		$query = $this->db->get();
		foreach ($query->result() as $row) {
			$unit = $row->price;
			//papersize
			$papersize_arr = array();
			$temp = explode("|", $row->papersize);
			foreach ($temp as $opt) {
				$key = substr($opt, 0, strpos($opt, ','));
				$value = substr($opt, strpos($opt, ',') + 1, strlen($opt));
				$papersize_arr[$key] = $value;
			}
			//isdoubleside
			$isdoubleside_arr = array();
			$temp = explode("|", $row->isdoubleside);
			foreach ($temp as $opt) {
				$key = substr($opt, 0, strpos($opt, ','));
				$value = substr($opt, strpos($opt, ',') + 1, strlen($opt));
				$isdoubleside_arr[$key] = $value;
			}
			//zhuangding
			$zhuangding_arr = array();
			$temp = explode("|", $row->zhuangding);
			foreach ($temp as $opt) {
				$key = substr($opt, 0, strpos($opt, ','));
				$value = substr($opt, strpos($opt, ',') + 1, strlen($opt));
				$zhuangding_arr[$key] = $value;
			}
		}
		$price = 0;
		$price = $unit * $papersize_arr[$papersize];
		$pageNum = $this->countPageNum($range);

		if($pageNum != -1){
			$price *= $pageNum;
			$price *= $fenshu;
			$price *= $isdoubleside_arr[$isdoubleside];
			$price += $zhuangding_arr[$zhuangding];
		}
		else
			$price = "0";
		return $price;
	}
}
?>