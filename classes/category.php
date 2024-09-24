<?php  

	require_once 'admin/lib/database.php';
	require_once 'admin/helpers/format.php';
?>



<?php
	class category
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}


		public function show_category()
		{
			$query = "SELECT * FROM tbl_loaisanpham ORDER BY maLoai ASC";
			$result = $this->db->select($query);
			return $result;
		}

		public function show_categoryLimit5()
		{
			$query = "SELECT * FROM tbl_loaisanpham ORDER BY maLoai ASC LIMIT 5";
			$result = $this->db->select($query);
			return $result;
		}

		public function show_categoryOthers()
		{
			$query = "SELECT * FROM tbl_loaisanpham ORDER BY maLoai ASC LIMIT 5,20 ";
			$result = $this->db->select($query);
			return $result;
		}

		public function getcatbyId($id){
			$query = "SELECT * FROM tbl_loaisanpham WHERE maLoai = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}

	}

?>