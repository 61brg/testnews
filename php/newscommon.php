<?php


class newscommon
{
    protected SQLite3 $db;
    protected $SERVER;
    protected $REQUEST;
 public function __construct ()
 {
     $fn='db/testnews.db';
     $this->db = new SQLite3($fn, SQLITE3_OPEN_READWRITE);
     $this->SERVER=$_SERVER;
     $this->REQUEST=$_REQUEST;
 }
//--------------------------------------------------------------------------
 public function newsdel($id)
 {
     $sql="delete FROM Message WHERE id=$id";
     return $this->db->exec($sql);
 }
//--------------------------------------------------------------------------
 public function newslist()
 {
     $sql='SELECT id, title FROM Message ORDER BY dt';
     $res=$this->db->query($sql);
     $data= [];
     while ($r= $res->fetchArray(SQLITE3_NUM)) {
         array_push($data, $r);
     }
     return $data;
 }
//--------------------------------------------------------------------------
 public function newschange($id,$title, $mes, $dt)
 {
   $sql=sprintf('UPDATE Message SET title="%s",mes="%s",dt="%s" WHERE id="%d"',$title,$mes,$dt,$id);
      $r=$this->db->exec($sql);
   return $r;
 }
//--------------------------------------------------------------------------
public function newsadd($title, $mes, $dt)
 {
   $sql="INSERT INTO Message (title,mes,dt) values ('$title', '$mes', '$dt')";
   $r=$this->db->exec($sql);
   return $r;
 }
//--------------------------------------------------------------------------
 public function newstext( $id)
 {
     $sql="SELECT title, mes, dt FROM Message WHERE id='$id'";
     $r=$this->db->querySingle($sql,true);
     return $r;
 }
//--------------------------------------------------------------------------
// Читает файл шаблона $filename станицы  подминиет спец сочетаниясимволов !!![0-9] из параметра
// $txt
    public function templater( $filename,$txt)
     {
         $fp = fopen($filename, 'r'); // Бинарный режим
         if ($fp) {
             $templ=[];
             for($r=0;$r<count($txt);$r++)
                 array_push($templ, "!!!$r");
             $c = '';
             while (!feof($fp))
                {
                    $z=$c.fread($fp, 4000);
                    $s=str_replace($templ,$txt,$z);
                    echo mb_substr($s,0,mb_strlen($s)-3);
                    $c=mb_substr($s,mb_strlen($s)-3,3);
                }
         } else echo "Ошибка при открытии файла";
         fclose($fp);
     }
//--------------------------------------------------------------------------
 public function __destruct ()
 {
     try
     {
        //$this->db->close();
      } finally {}
 }

}
