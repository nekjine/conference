<?php
require_once('UpdateFactory.php');

class JournalUpdateFactory extends UpdateFactory{
    function newUpdate(DomainObject $obj){
        //�������� ����� ���������� ��������
        $id= $obj->getId();
        $cond=null;
        $values['title']=$obj->getTitle();
        if ($id >-1){
            $cond['id']=$id;
            return $this->buildStatement('journal',$values,$cond);
        }
        return $this->buildStatement('journal',$values,$cond,true);
    }
    
    function InsertLink(DomainObject $obj){
        $papers=$obj->getPapers();
        $links= array('journal_id','paper_id'); 
        $query=$this->buildLinks('journal_paper',$links);
        foreach ($papers as $paper){
            $values[]=array($obj->getId(),$paper->getId());
        }  
        return array($query,$values);
    }
}

?>