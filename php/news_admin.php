<?php

include_once 'newscommon.php';
class news_admin extends newscommon
{
    public function __construct()
    {
        parent::__construct();
    }
//--------------------------------------------------------------------------

    public function list()
    {
        $l=$this->newslist();
        $z=[];
        $c="<pre> \n";
        foreach ($l as $v) {
            $c.= "<a href=/admin/?id=$v[0]>$v[1]</a>\n";
        }

        $c.=" </pre>\n";
        array_push($z,$c);
        $this->templater('template/admin/admin.html',$z);
    }
//--------------------------------------------------------------------------
    public function message($id)
    {
        $l = $this->newstext($id);
        $z = ["id" => $id] + $l;
        $this->templater('template/admin/edit.html', $z);
    }
//--------------------------------------------------------------------------
   public function savechange()
   {
       $ar=['id','title','mes','dt'];
       $b=true;
       foreach ($ar as $z) $b &= array_key_exists($z, $this->REQUEST);
       if ($b)
       {
           $this->newschange($this->REQUEST['id'],$this->REQUEST['title'],
               $this->REQUEST['mes'],$this->REQUEST['dt']);
       }
       $r=$this->getid();
       header_remove();
       if ($r>=0) header('Location: /admin/?id='.$r);
       else header('Location: /admin/');
   }
//--------------------------------------------------------------------------
   public function getid()
   {
      $r=-1;
       if (array_key_exists('id',$this->REQUEST)) return $r=$this->REQUEST['id'];
      return $r;
   }
//--------------------------------------------------------------------------
    public function new()
    {
        $this->newsadd('Новое сообщение', '', date('Y-m-d h:s'));
        header_remove();
        header('Location: /admin/');
    }
//--------------------------------------------------------------------------
    public function delete()
    {
        if (array_key_exists('id',$this->REQUEST))
        {
            $this->newsdel($r=$this->REQUEST['id']);
        }
        header_remove();
        header('Location: /admin/');
    }
//--------------------------------------------------------------------------
//--------------------------------------------------------------------------

}