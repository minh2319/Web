<?php
class Baihat extends Db{
	public function getRand($n)
	{
		$sql="select book_id, book_name, img from book order by rand() limit 0, $n ";
		return $this->select($sql);	
	}
	public function showall()
	{
		$sql="select *  from baihat ";
		return $this->select($sql);	
	}
	public function getByPubliser($manhaxb)
	{
		$sql="select ma_bai_bat, ten_bai_hat, nhac_sy from baihat order by rand() limit 0, $n ";
		return $this->select($sql);	
	}
	
	public function them($arr)
	{
		$sql="insert into baihat (ma_bai_hat, nhac_sy, loi_bai_hat, ma_quoc_gia, ten_bai_hat) values(:ma_bai_hat, :nhac_sy, :loi_bai_hat, :ma_quoc_gia, :ten_bai_hat) ";
		return $this->insert($sql,$arr);
	}
	public function xoa($arr)
	{
			$sql ="delete from baihat where ma_bai_hat = :ma_bai_hat ";
			return $this->delete($sql,$arr);

	}
	public function sua($arr)
	{	
			$sql="UPDATE baihat SET nhac_sy =:nhac_sy, loi_bai_hat=:loi_bai_hat, ma_quoc_gia=:ma_quoc_gia,ten_bai_hat=:ten_bai_hat WHERE ma_bai_hat = :ma_bai_hat";
		return $this->update($sql,$arr);
	}

	

}
?>