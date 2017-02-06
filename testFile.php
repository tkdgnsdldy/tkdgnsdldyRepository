<?php 


class member
{	

	public $name;
	private $age;
 
	function __construct()
	{
		# code...
	}

	function __get($name){
	  return $this -> $name;
	}

	function __set($name, $val){
		$this->$name = $val;
	}

	function say () {
		echo $this->name." / ". $this->age;
	}
}


  $a =new member();

  $a-> name= "상훈이당";
  $a-> age = 19;

  echo "<br>".$a -> name;

  $a-> say();

//parent::method() ; 부모의 함수를 호출 -> 

  /**
  * 
  */
  class haha
  {
  	
  	function __construct()
  	{
  		# code...
  	}
  	const animal="tiger";

static function staticfn (){
  echo "imstatic fn!!";
}
  }



echo haha::animal;
echo haha::staticfn();


?> 


