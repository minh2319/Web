<?php
class Chitietbaihat extends Db{
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
		$sql="insert into chitietbaihat(ma_chi_tiet_bh, ma_bai_hat, ma_ca_sy, ma_the_loai, duong_dan, chat_luong, hinh_anh) values(:ma_chi_tiet_bh, :ma_bai_hat, :ma_ca_sy, :ma_the_loai, :duong_dan, :chat_luong, :hinh_anh) ";
		return $this->insert($sql,$arr);
	}
	public function xoa($arr)
	{
			$sql ="delete from chitietbaihat where ma_chi_tiet_bh = :ma_chi_tiet_bh ";
			return $this->delete($sql,$arr);
	}

	public function sua_picture($arr)
	{	
			$sql="UPDATE chitietbaihat SET ma_bai_hat =:ma_bai_hat, ma_ca_sy=:ma_ca_sy, ma_the_loai=:ma_the_loai,duong_dan=:duong_dan,chat_luong=:chat_luong,hinh_anh=:hinh_anh WHERE ma_chi_tiet_bh = :ma_chi_tiet_bh";
		return $this->update($sql,$arr);
	}
	public function sua_khong_picture($arr)
	{	
			$sql="UPDATE chitietbaihat SET ma_bai_hat =:ma_bai_hat, ma_ca_sy=:ma_ca_sy, ma_the_loai=:ma_the_loai,duong_dan=:duong_dan,chat_luong=:chat_luong WHERE ma_chi_tiet_bh = :ma_chi_tiet_bh";
		return $this->update($sql,$arr);
	}
		public function luot_nghe($arr)
	{	
			$sql="UPDATE chitietbaihat SET luot_nghe =:luot_nghe WHERE ma_chi_tiet_bh = :ma_chi_tiet_bh";
		return $this->update($sql,$arr);
	}
	

}
?>