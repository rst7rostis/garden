<?
class Garden{
	public $Fruit = array();
	public $Trees = array();
	
	
	function __construct($Trees){
		$this->Trees = $Trees;
		
	}//construct

	function FillGarden($Trees){
		//total
		if(is_array($Trees)){
			if(isset($this->Trees[0]) and isset($this->Trees[1])){
				$this->Trees["total"] = $this->Trees[0] + $this->Trees[1];
			}
		}
		
		for($i=0; $i<$this->Trees["total"]; $i++){
			
		if($i < $this->Trees[0]){
				$this->Fruit["type"]="apple";
				$this->Fruit["fruit_quantity"] = rand(40,50); 
				$this->Fruit["fruit_weight"] = rand(150,180); 
			}
		elseif($i > $this->Trees[0]-1){ 
			$this->Fruit["type"]="pear";
			$this->Fruit["fruit_quantity"] = rand(0,20);
			$this->Fruit["fruit_weight"] = rand(130,170);
		}
			
			$this->Trees[2][] = array(
				"TreeId"=>$i, //
				"TreeType"=>$this->Fruit["type"], //
				"FruitsQuantity"=>$this->Fruit["fruit_quantity"], //
				"FruitsWeight"=>$this->Fruit["fruit_weight"], //
			);
		}
		
		return $this->Trees[2];
	}
	
	function addTree($Trees, $type){
		if($type=="apple"){
			$this->Fruit["type"] = "apple";
			$this->Fruit["fruit_quantity"] = rand(40,50); 
			$this->Fruit["fruit_weight"] = rand(150,180);
		}else{
			$this->Fruit["type"] = "pear";
			$this->Fruit["fruit_quantity"] = rand(0,20);
			$this->Fruit["fruit_weight"] = rand(130,170);
		}
		$this->Trees[2][]=array(
				"TreeId"=> count($this->Trees[2])+1, //
				"TreeType"=>$this->Fruit["type"], //
				"FruitsQuantity"=>$this->Fruit["fruit_quantity"], //
				"FruitsWeight"=>$this->Fruit["fruit_weight"], //
			);
	}
	function countTrees($Trees){
		echo "Количество деревьев: ".count($this->Trees[2]). "----------------------------<br>";
	}	

	function countFruits($Trees){
		foreach($this->Trees[2] as $Tree){
			$TreeCnt+=$Tree["FruitsQuantity"];
		}
		echo "Количество плодов: ".$TreeCnt. " Шт----------------------------<br>";
	}	
	
	function countFruitsWeight($Trees){
		foreach($this->Trees[2] as $Tree){
			$FruitsWeight+=$Tree["FruitsWeight"];
		}
		echo "Вес всего урожая: ".$FruitsWeight. " КГ----------------------------<br>";
	}	
	
	function countFruitsWeightByType($Trees, $type){
		$cnt=0;
		foreach($this->Trees[2] as $Tree){
			
			if($Tree["TreeType"]==$type){
				$FruitsWeight+=$Tree["FruitsWeight"];
				$cnt++;
			}
		}

		echo "Вес всего урожая с ".$cnt." деревьев : ".$type." =".$FruitsWeight. " КГ----------------------------<br>";
	}
}
///class



	
$gardenA = new Garden([$Trees[0]=10,$Trees[1]=15]); //размерность сада (яблоко, груша)
$gardenA->FillGarden( $Trees); //заполнение
$gardenA->countTrees($Trees); //подсчет деревьев (всего)
$gardenA->countFruits($Trees); //подсчет фруктов (всего)
$gardenA->countFruitsWeight($Trees); //подсчет веса (всего)
$gardenA->countFruitsWeightByType($Trees, "apple"); //подсчет деревьев (по типу яблоко)
$gardenA->countFruitsWeightByType($Trees, "pear");  //подсчет деревьев (по типу груша)
$gardenA->addTree($Trees, "apple"); //добавление дерева в сад (тип яблоко)
$gardenA->addTree($Trees, "pear"); //добавление дерева в сад (тип груша)
//пересчет сада
$gardenA->countTrees($Trees);
$gardenA->countFruits($Trees);
$gardenA->countFruitsWeight($Trees);
$gardenA->countFruitsWeightByType($Trees, "apple");
$gardenA->countFruitsWeightByType($Trees, "pear");


echo "----------------------------<br>";
var_dump($gardenA);
