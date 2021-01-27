<?php
include_once 'newscommon.php';

class news_root extends newscommon
{
    public function __construct()
    {
        //echo 'start1';
        parent::__construct();
    }
    //-----------------------------------
    public function list()
    {
        $l =  $this->newslist();
        $z=[];
        $c="<pre> \n";
        foreach ($l as $v) {
            $c.= "<a href=/?id=$v[0]>$v[1]</a>\n";
        }
        $c.=" </pre>\n";
        array_push($z,$c);
        $this->templater('template/root.html',$z);
    }
//-----------------------------------
    public function message($id)
    {
        $l= $this->newstext($id);
        $c="<h>".$l['title']."</h>";
        $c.="<p> Время сообщения: ".$l['dt']."</p>";
        $c.="<textarea readonly cols='70'' rows='10''>".$l['mes']." </textarea>";
        $z=[];
        array_push($z,$c);
        $this->templater('template/root.html',$z);
    }
}