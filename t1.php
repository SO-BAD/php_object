<?php

class DB{
    protected $table;
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=survey";
    protected $pdo;

    public function __construct($table){
        $this->pdo=new PDO($this->dsn,'root','');
        $this->table=$table;
    }


    public function all(...$arg){
        $sql="SELECT * FROM $this->table ";

        //依參數數量來決定進行的動作因此使用switch...case
        switch(count($arg)){
            case 1:
        
                //判斷參數是否為陣列
                if(is_array($arg[0])){
        
                    //使用迴圈來建立條件語句的字串型式，並暫存在陣列中
                    foreach($arg[0] as $key => $value){
        
                        $tmp[]="`$key`='$value'";
        
                    }
        
                    //使用implode()來轉換陣列為字串並和原本的$sql字串再結合
                    $sql.=" WHERE ". implode(" AND " ,$tmp);
                }else{
                    
                    //如果參數不是陣列，那應該是SQL語句字串，因此直接接在原本的$sql字串之後即可
                    $sql.=$arg[0];
                }
            break;
            case 2:
        
                //第一個參數必須為陣列，使用迴圈來建立條件語句的陣列
                foreach($arg[0] as $key => $value){
        
                    $tmp[]="`$key`='$value'";
        
                }
        
                //將條件語句的陣列使用implode()來轉成字串，最後再接上第二個參數(必須為字串)
                $sql.=" WHERE ". implode(" AND " ,$tmp) . $arg[1];
            break;
        
            //執行連線資料庫查詢並回傳sql語句執行的結果
            }
        
            //fetchAll()加上常數參數FETCH_ASSOC是為了讓取回的資料陣列中
            //只有欄位名稱,而沒有數字的索引值
           // echo $sql;
            return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        
        
    }

    //只取一筆
    public function find($id){
        $sql = "SELECT * FROM $this->table WHERE ";
        if(is_array($id)){
            foreach($id as $key =>$value){
                $tmp[] = "`$key` = '$value'"; 
            }

            $sql .= implode(' AND ',$tmp);
        }else{
            $sql .= " `id` = $id";
        }


        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }










}

// class Survey extends DB{
//     protected $table='surveys';
//     public function __construct(){
//         parent::__construct($this->table);
//     }
// }

$survey_tb = new DB('surveys');
echo "<pre>";
// print_r($survey_tb->all());
print_r($survey_tb->find(['title'=>'鞋子']));
echo "</pre>";


?>