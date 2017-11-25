<?php
class Chitietablum extends Db{
	public function getRand($n)
	{
		$sql="select book_id, book_name, img from book order by rand() limit 0, $n ";
		return $this->select($sql);	
	}
	public function showall()
	{
		$sql="select *  from book ";
		return $this->select($sql);	
	}
	public function getByPubliser($manhaxb)
	{
		$sql="select book_id, book_name, img from book order by rand() limit 0, $n ";
		return $this->select($sql);	
	}
	
	public function them($arr)
	{
		$sql="insert into chitietablum(ma_chi_tiet_ablum, ma_chi_tiet_bh, ma_ablum) values(:ma_chi_tiet_ablum, :ma_chi_tiet_bh, :ma_ablum) ";
		return $this->insert($sql,$arr);
	}
	public function xoa($arr)
	{
			$sql ="delete from chitietablum where ma_chi_tiet_ablum = :ma_chi_tiet_ablum ";
			return $this->delete($sql,$arr);

	}

	public function sua($arr)
	{	
			$sql="UPDATE chitietablum SET ma_chi_tiet_bh =:ma_chi_tiet_bh, ma_ablum=:ma_ablum WHERE ma_chi_tiet_ablum = :ma_chi_tiet_ablum";
		return $this->update($sql,$arr);
	}
	

}
?>