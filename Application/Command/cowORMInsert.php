<?php
namespace Application\Command;

class cowORMInsert extends \System\Core\Command {
	protected function exec(){
            $name=$_POST['name'];
            $color=$_POST['color'];
            $corral=$_POST['corral_id'];
            $insert=new \Application\Model\Cow();
            $insert->setName($name);
            $insert->setColor($color);
            $insert->setCorral($corral);
            $insert2=new \Application\Model\Cow();
            $insert2->setName("Pitak");
            $insert2->setColor("black");
            $insert2->setCorral($corral);
            \System\Orm\ObjectWatcher::instance()->performOperations();
            return $this->render(
			array("name" => $name,"color" => $color,"corral" => $corral)
		);
	}
}
?>