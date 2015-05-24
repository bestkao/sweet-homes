<?php

require_once("SweetHomeAutoloader.php");

/**
 * Description of Pagination
 *
 * @author sashi
 */
class Pagination 
{
     private $startIndex;
     private $limit;
     
     public function __construct()
     {
         
     }
     
     public function setStartIndex($index=0)
     {
         $this->startIndex=$index*$this->limit;
         PropertyGetter::setStartIndex($this->startIndex);
     }
     
     public function setLimit($lim=10)
     {
         $this->limit=$lim;
         PropertyGetter::setLimit($this->limit);
     }
   
}
