<?php
namespace dog\db;

class Db
{
	private $host = null;
	private $username = null;
	private $password = null;
	private $port = null;
	private $dbname = null;
	
	private static $db_con = null;
	
	public function __construct($host,$username,$password,$dbname,$port=3306)
	{
		if(!self::$db_con){
			self::$db_con = mysqli_connect($host,$username,$password,$dbname,$port);
			if (mysqli_connect_errno(self::$db_con)){
				throw new \Exception("连接 MySQL 失败: " . mysqli_connect_error());	
			}
		}
	}
	
	public function select($sql)
	{
		$result = mysqli_query(self::$db_con,$sql);
		$data = [];
		while ($row = mysqli_fetch_assoc($result)){
			$data[] = $row;
  		}
		return $data;
	}
}