<?php
class Playlist extends Db{
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
		$sql="insert into book(book_id, book_name, description, price, img, pub_id, cat_id) values(:book_id, :book_name, :description, :price, :img, :pub_id, :cat_id) ";
		return $this->insert($sql,$arr);
	}
	public function xoa($arr)
	{
			$sql ="delete from book where book_id = :book_id ";
			return $this->delete($sql,$arr);
	}
}
?>