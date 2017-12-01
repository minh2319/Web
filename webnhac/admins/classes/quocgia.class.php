<?php
class Quocgia extends Db{
	public function getRand($n)
	{
		$sql="select book_id, book_name, img from book order by rand() limit 0, $n ";
		return $this->select($sql);	
	}
	public function showall()
	{
		$sql="select *  from quocgia ";
		return $this->select($sql);	
	}
	public function getByPubliser($manhaxb)
	{
		$sql="select book_id, book_name, img from book order by rand() limit 0, $n ";
		return $this->select($sql);	
	}
	
	public function them($arr)
	{
		$sql="insert into quocgia(ma_quoc_gia, ten_quoc_gia) values(:ma_quoc_gia, :ten_quoc_gia) ";
		return $this->insert($sql,$arr);
	}
	public function xoa($arr)
	{
			$sql ="delete from quocgia where ma_quoc_gia = :ma_quoc_gia ";
			return $this->delete($sql,$arr);

	}

	public function sua($arr)
	{	
			$sql="UPDATE quocgia SET ten_quoc_gia =:ten_quoc_gia WHERE ma_quoc_gia = :ma_quoc_gia";
		return $this->update($sql,$arr);
	}
	

}
?>