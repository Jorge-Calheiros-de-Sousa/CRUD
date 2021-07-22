<?php
namespace Mvc\Model;

  class Connection 
  {
    private $_dbHostname = "localhost";
    private $_dbName = "dbusuarios";
    private $_dbUsername = "root";
    private $_dbPassword = "";
    private $pdo;
    
    public function __construct()
    {
    	try {
        $this->pdo = new \PDO("mysql:host=$this->_dbHostname;
        dbname=$this->_dbName", $this->_dbUsername, $this->_dbPassword);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
	    } catch(\Exception $e) {
        echo "Falha ao conectar: " . $e->getMessage();
		  }
    }
    public function returnConnection() 
    {
      return $this->pdo;
    }
  }
?>