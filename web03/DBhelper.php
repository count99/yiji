<?php
class DBhelper
{
	function __construct()
	{
		$this->conn=new mysqli("localhost","root","","db03");
		$this->conn->set_charset("utf8");
	}
	
	function tr($data,$p=" AND ")
	{
		$tmp=array();
		foreach($data as $k=>$v)
		{
			$tmp[]=$k."='".$v."'";
		}
		return implode($p, $tmp);
	}
	
	function insert($table,$data)
	{
		$data=$this->tr($data, $p=',');
		$sql="INSERT INTO $table SET $data";
		$result=$this->conn->query($sql);
	}
	
	function update($table,$data,$where=1)
	{
		$data=$this->tr($data, $p=',');
		if(is_array($where))
		{
		$where=$this->tr($where);
		}
		$sql="UPDATE $table SET $data WHERE $where";
		$result=$this->conn->query($sql);
	}
	
	function delete($table,$where=1)
	{
		if(is_array($where))
		{
		$where=$this->tr($where);
		}
		$sql="DELETE FROM $table WHERE $where";
		$result=$this->conn->query($sql);
	}
	
	function select($table,$where=1)
	{
		if(is_array($where))
		{
		$where=$this->tr($where);
		}
		$sql="SELECT * FROM $table WHERE $where";
		$result=$this->conn->query($sql);
		if($result->num_rows>0)
		{
			$tmp=array();
			while($data=$result->fetch_assoc())
			{
				$tmp[]=$data;
			}
			return $tmp;
		}
		else
		{
			return "ZERO";
		}
	}
}
