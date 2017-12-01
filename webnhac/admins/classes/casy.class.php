<?php
class Casy extends Db{
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
		$sql="insert into casy(ma_ca_sy, ma_quoc_gia, ten_ca_sy, gioi_tinh, ngay_sinh, gioi_thieu, nghe_danh,hinh_anh) values(:ma_ca_sy, :ma_quoc_gia, :ten_ca_sy, :gioi_tinh, :ngay_sinh, :gioi_thieu, :nghe_danh,:hinh_anh) ";
		return $this->insert($sql,$arr);
	}
	public function xoa($arr)
	{
			$sql ="delete from casy where ma_ca_sy = :ma_ca_sy ";
			return $this->delete($sql,$arr);

	}
	public function sua_picture($arr)
	{	
			$sql="UPDATE casy SET ma_quoc_gia =:ma_quoc_gia, ten_ca_sy=:ten_ca_sy, gioi_tinh=:gioi_tinh,ngay_sinh=:ngay_sinh,gioi_thieu=:gioi_thieu,nghe_danh=:nghe_danh,hinh_anh=:hinh_anh WHERE ma_ca_sy = :ma_ca_sy";
		return $this->update($sql,$arr);
	}

	public function sua_khong_picture($arr)
	{	
			$sql="UPDATE casy SET ma_quoc_gia =:ma_quoc_gia, ten_ca_sy=:ten_ca_sy, gioi_tinh=:gioi_tinh,ngay_sinh=:ngay_sinh,gioi_thieu=:gioi_thieu,nghe_danh=:nghe_danh WHERE ma_ca_sy = :ma_ca_sy";
		return $this->update($sql,$arr);
	}

}
?>