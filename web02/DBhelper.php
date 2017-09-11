<?php 
class DBhelper
{
	public function __construct()
	{
		$this->conn = new mysqli('localhost', 'root', '1234', 'db02');
		if($this->conn->connect_error)
		{
			die('conn err '.$this->conn->connect_error);
		}
		$this->conn->set_charset('utf8');
	}
	
	public function tr($data, $p=' AND ')
	{
		if(is_array($data))
		{
			$tmp=array();
			foreach($data as $k=>$v)
			{
				$tmp[]=$k."="."'".$v."'";
			}
			return implode($p, $tmp);
		}
		else
		{
			return "Not array";
		}
	}
	
	public function insert($table, $data)
	{
		$data = $this->tr($data, $p=",");
		$sql="INSERT INTO $table SET $data";
		$result = $this->conn->query($sql);
		if(!$result)
		{
			die("insert err ".$result->error);
		}
	}
	
	public function update($table, $data, $where=1)
	{
		$data = $this->tr($data, $p=",");
		if(is_array($where))
		{
			$where = $this->tr($where, $p=",");
		}
		$sql="UPDATE $table SET $data WHERE $where";
		$result = $this->conn->query($sql);
		if(!$result)
		{
			die("update err ".$result->error);
		}
	}
	
	public function delete($table, $where)
	{
		if(is_array($where))
		{
			$where = $this->tr($where);
		}
		$sql="DELETE FROM $table WHERE $where";
		$result = $this->conn->query($sql);
		if(!$result)
		{
			die("delete err ".$result->error);
		}
	}
	
	public function select($table, $where=1)
	{
		if(is_array($where))
		{
			$where = $this->tr($where);
		}
		$sql="SELECT * FROM $table WHERE $where";
		$result = $this->conn->query($sql);
		if(!$result)
		{
			die("select err ".$result->error);
		}
		$temp = array();
		if($result->num_rows>0)
		{
			while($row = $result->fetch_assoc())
			{
				$tmp[] = $row;
			}
			return $tmp;
		}
		else
		{
			return "0 result";
		}
	}
	
	
	public function page($num, $table, $where=1)
	{
		if(is_array($where))
		{
			$where = $this->tr($where);
		}
		$result = $this->select($table, $where);
		$tmp = array();
		for($i=0; $i<count($result);$i++)
		{
			$tmp[floor($i/$num)+1][]=$result[$i];
		}
		return $tmp;
	}
}
