<?php
include_once 'news_root.php';
include_once 'news_admin.php';

class  newsroute
{
 private $SERVER;
 private $REQUEST;
   public function __construct()
   {
     $this->SERVER=$_SERVER;
     $this->REQUEST=$_REQUEST;
   }
//----------------------------------------------
   public function work()
   {
      $s=preg_replace('#\?.*$#', '',$this->SERVER['REQUEST_URI']);
      $rq=array_key_exists('id',$this->REQUEST);

      switch ($s)
      {
          case "/":
            $r=new news_root();
            if (!$rq)
               {
                   $r->list();
               } else
               {
                   $r->message($this->REQUEST['id']);
               }
          break;
          case "/admin/":
              $r=new news_admin();
              if (!$rq)
              {
                  $r->list();
              } else
              {
                  $r->message($this->REQUEST['id']);
              }
          break;
          case "/ch/":
              $r=new news_admin();
              if (array_key_exists('save',$this->REQUEST))
              {
                  $r->savechange();
              } else if (array_key_exists('delete',$this->REQUEST))
              {
                  $r->delete();
              } else if (array_key_exists('new',$this->REQUEST))
              {
                  $r->new();
              }
              break;
      }
   }


}
