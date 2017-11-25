<?php
class Thanhvien extends Db{
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
		$sql="insert into thanhvien(id, username, mat_khau, gioi_tinh, ho_ten, nam_sinh, so_dien_thoai,email,quan_tri,tinh_trang) values(:id, :username, :mat_khau, :gioi_tinh, :ho_ten, :nam_sinh, :so_dien_thoai,:email,:quan_tri,:tinhtrang) ";
		return $this->insert($sql,$arr);
	}
	public function xoa($arr)
	{
			$sql ="delete from thanhvien where id = :id ";
			return $this->delete($sql,$arr);

	}


	public function sua($arr)
	{	
			$sql="UPDATE thanhvien SET tinh_trang =:tinh_trang,quan_tri=:quan_tri where id=:id";
		return $this->update($sql,$arr);
	}
	

}
?>