<?php
class ablum extends Db{
	public function getRand($n)
	{
		$sql="select ma_ablum, ma_the_loai,ten_ablum from ablum order by rand() limit 0, $n ";
		return $this->select($sql);	
	}
	public function showall()
	{
		$sql="select *  from ablum ";
		return $this->select($sql);	
	}
	public function getByPubliser($manhaxb)
	{
		$sql="select book_id, book_name, img from book order by rand() limit 0, $n ";
		return $this->select($sql);	
	}
	
	public function them($arr)
	{
		$sql="insert into ablum(ma_ablum, ma_the_loai, ten_ablum,hinh_anh) values(:ma_ablum, :ma_the_loai, :ten_ablum,:hinh_anh)";
		return $this->insert($sql,$arr);
	}
	public function xoa($arr)
	{	
			$sql ="delete from ablum where ma_ablum = :ma_ablum ";

			return $this->delete($sql,$arr);

	}
	public function sua_khong_picture($arr)
	{	
			$sql="UPDATE ablum SET ten_ablum =:ten_ablum, ma_the_loai = :ma_the_loai WHERE ma_ablum = :ma_ablum";
		return $this->update($sql,$arr);
	}
	public function sua_picture($arr)
	{	
			$sql="UPDATE ablum SET ten_ablum =:ten_ablum, ma_the_loai = :ma_the_loai, hinh_anh=:hinh_anh WHERE ma_ablum = :ma_ablum";
		return $this->update($sql,$arr);
	}

	

}
?>