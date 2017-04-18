<?php
namespace app\gather\control;
use dog\Control;
use dog\pattern\CalculatorSETime;
use dog\db\Db;
class Index extends Control{
	
	
	public function index(){
		//array1 & array2  => 取交集

		
		return CalculatorSETime::arithmetic(function(){
			
			
			$array1 = ['中国电信','奋斗开始','你好','中国银行外汇牌价','贷款软件','软件测试培训','中国农业银行','中国知网','fdscv'];
			$db = new Db('127.0.0.1', 'root', 'root', 'test');
			$result = $db->select('select name from t_keywords limit 0,400000');
			$array2 = [];
			foreach ($result as $value){
				$array2[] = $value['name'];
			}
			$diff = array_intersect($array1, $array2);
			echo '<pre>';
			print_r($diff);
			//print_r( array_diff($array1, $array2) );
			
		});

	}	
}