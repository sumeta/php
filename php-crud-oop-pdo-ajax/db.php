<?php

	class Database {
		private $dsn = "mysql:host=localhost;dbname=scitech";
		private $user = "root";
		private $pass = "root";
		public $conn;

		public function __construct() {
			try {
				$this->conn = new PDO($this->dsn, $this->user, $this->pass);
				//echo 'Successfully Connected!';
			}
			catch (PDOException $e) {
				echo $e->getMessage();
			}
		}

		public function insert($tpos_academic, $tdoctor, $fname, $lname, $ttypeP, $tdeptP, $tdateBorn, $tdateWork) {
			$sql = "INSERT INTO  users (pos_academic, doctor, first_name, last_name, typeP, deptP, dateBorn, dateWork) VALUES (:tpos_academic,:tdoctor,:fname,:lname,:ttypeP,:tdeptP,:tdateBorn,:tdateWork)";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['tpos_academic' =>$tpos_academic,
				            'tdoctor'		=>$tdoctor,
				            'fname'			=>$fname,
				            'lname'			=>$lname,
				            'ttypeP'		=>$ttypeP,
				            'tdeptP'		=>$tdeptP,
				            'tdateBorn'		=>$tdateBorn,
				            'tdateWork'		=>$tdateWork]);

			return true;
		}

		public function read() {
			$data = array();
			$sql = "SELECT * FROM users";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach ($result as $row) {
				$data[] = $row;
			}
			return $data;
		}

		public function getUserById($id) {
			$sql = "SELECT * FROM users WHERE id = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['id'=>$id]);
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			return $result;
		}


		public function update($id, $tpos_academic, $tdoctor, $fname, $lname, $ttypeP, $tdeptP, $tdateBorn, $tdateWork) {
			$sql =  "UPDATE users SET 
			pos_academic	=:tpos_academic, 
			doctor			=:tdoctor,
			first_name		=:fname, 
			last_name		=:lname, 
			typeP			=:ttypeP, 
			deptP			=:tdeptP, 
			dateBorn		=:tdateBorn, 
			dateWork		=:tdateWork 
			WHERE id = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['id'			=>$id,
							'tpos_academic'	=>$tpos_academic,   
				            'tdoctor'		=>$tdoctor,
				            'fname'			=>$fname,
				            'lname'			=>$lname, 
				            'ttypeP'		=>$ttypeP,
				            'tdeptP'		=>$tdeptP,
				            'tdateBorn'		=>$tdateBorn,
				            'tdateWork'		=>$tdateWork]);
			return true;
		}

		public function delete($id) {
			$sql = "DELETE FROM users WHERE id = :id";
			$stmt = $this->conn->prepare($sql); 
			$stmt->execute(['id'=>$id]);
			return true;
		}

		public function totalRowCount() {
			$sql = "SELECT * FROM users";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			$t_rows = $stmt->rowCount();

			return $t_rows;
		}

	}
	//$ob = new Database();
	//print_r($ob->read());

	//echo $ob->totalRowCount();
?>