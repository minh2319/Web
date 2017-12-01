<?php
class Tonghop extends Db{
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
	


	public function thongtinbh($arr)
	{	
			$sql="SELECT
			baihat.ten_bai_hat,
			casy.nghe_danh,
			chitietbaihat.hinh_anh,
			chitietbaihat.ma_chi_tiet_bh,
			chitietbaihat.duong_dan,
			baihat.loi_bai_hat,
			theloai.ten_the_loai,
			chitietbaihat.luot_nghe
			FROM
			casy
			INNER JOIN chitietbaihat ON chitietbaihat.ma_ca_sy = casy.ma_ca_sy
			INNER JOIN baihat ON chitietbaihat.ma_bai_hat = baihat.ma_bai_hat
			INNER JOIN theloai ON chitietbaihat.ma_the_loai = theloai.ma_the_loai WHERE chitietbaihat.ma_chi_tiet_bh = :ma_chi_tiet_bh";
		return $this->select($sql,$arr);
	}

	public function bxh()
	{
		$sql="SELECT
		baihat.ten_bai_hat,
		casy.ten_ca_sy,
		chitietbaihat.luot_nghe,
		chitietbaihat.ma_chi_tiet_bh
		FROM
		baihat
		INNER JOIN chitietbaihat ON chitietbaihat.ma_bai_hat = baihat.ma_bai_hat
		INNER JOIN casy ON chitietbaihat.ma_ca_sy = casy.ma_ca_sy
		ORDER BY
		chitietbaihat.luot_nghe DESC
		LIMIT 0, 10";
		return $this->select($sql);

	}

		public function login($arr)
	{
		$sql="SELECT
			username,
			mat_khau,
			hinh_anh
			FROM
			thanhvien WHERE username like :username
			";
		return $this->select($sql,$arr);

	}

}

?>