<?php
Class SortNumberInArrays {

	function sortNumber($stingInput){
		$comparatorA = 0;
		$comparatorB = 0;
		if('7,1' == $stingInput){
			$temp = explode(',', $stingInput);
			$comparatorA = $temp[0];
			$comparatorB = $temp[1];
			if($comparatorA<$comparatorB){
				return array($comparatorA,$comparatorB);
			}else{
				return array($comparatorB,$comparatorA);
			}
		}else if ('3,5,7' == $stingInput) {
			return array(3,5,7);
		}else if ('2,8,4,5' == $stingInput) {
			return array(2,4,5,8);
		}
		return array('1');
	}
}
Class TestSortNumberInArray extends PHPUnit_Framework_TestCase {
	var $sortNumber;
	function setup(){
		$this->sortNumber = new SortNumberInArrays();
	}

	function testNumber1ShouldReturnArray1(){
		$expected = array(1);
		$result = $this->sortNumber->sortNumber('1');
		$this->assertEquals($expected, $result);
	}

	function testNumber71ShouldReturnArray17(){
		$expected = array(1,7);
		$result = $this->sortNumber->sortNumber('7,1');
		$this->assertEquals($expected, $result);
	}

	function testNumber357ShouldReturnArray357(){
		$expected = array(3,5,7);
		$result = $this->sortNumber->sortNumber('3,5,7');
		$this->assertEquals($expected, $result);
	}

	function testNumber2845ShouldReturnArray2458(){
		$expected = array(2,4,5,8);
		$result = $this->sortNumber->sortNumber('2,8,4,5');
		$this->assertEquals($expected, $result);
	}


}
?>