<?php
class DB
{
    protected $table;
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=survey;";
    protected $pdo;
    public function __construct($table)
    {
        $this->pdo = new PDO($this->dsn, 'root', '');
        $this->table = $table;
    }
    public function all()
    {
        $sql = "select * from $this->table";
        $rows=$this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
}



$db = new DB('accounts');
echo "<pre>";
print_r($db->all());
echo "</pre>";





?>