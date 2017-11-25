<?php
class Theloai extends Db{
	public function getRand($n)
	{
		$sql="select book_id, book_name, img from book order by rand() limit 0, $n ";
		return $this->select($sql);	
	}
	public function showall()
	{
		$sql="select *  from theloai ";
		return $this->select($sql);	
	}
	public function getByPubliser($manhaxb)
	{
		$sql="select book_id, book_name, img from book order by rand() limit 0, $n ";
		return $this->select($sql);	
	}
	
	public function them($arr)
	{
		$sql="insert into theloai(ma_the_loai, ten_the_loai) values(:ma_the_loai, :ten_the_loai) ";
		return $this->insert($sql,$arr);
	}
	public function xoa($arr)
	{
			$sql ="delete from theloai where ma_the_loai = :ma_the_loai ";
			return $this->delete($sql,$arr);

	}
	public function sua($arr)
	{	
			$sql="UPDATE theloai SET ten_the_loai =:ten_the_loai WHERE ma_the_loai = :ma_the_loai";
		return $this->update($sql,$arr);
	}
	

}
?>