<?php

class SortNumberInArrays {

    function sortNumber($stingInput) {
        $arrayInput = explode(',', $stingInput);
        $tmp = null;
        $countArrayInput = count($arrayInput);
        for ($i = 0; $i < $countArrayInput; $i++) {
            for ($j = 0; $j < $countArrayInput - 1; $j++) {
                if ($arrayInput[$j + 1] < $arrayInput[$j]) {
                    $tmp = $arrayInput[$j];
                    $arrayInput[$j] = $arrayInput[$j + 1];
                    $arrayInput[$j + 1] = $tmp;
                }
            }
        }
        $unique = $this->arrayUnique($arrayInput);
        return $unique;
    }

    function arrayUnique($input = ''){
    	$unique = array();
    	$unique[] = $input[0];
    	$temp = $input[0];
    	unset($input[0]);
    	foreach ($input as $keyOfInputData => $valueOfInputData) {
    		if(!is_numeric($valueOfInputData)){
        		continue;
        	}
    		if($temp != $valueOfInputData){
    			$unique[] = $valueOfInputData;
    		}
    		$temp = $valueOfInputData;
    	}
    	return $unique;
    }

}

class TestSortNumberInArray extends PHPUnit_Framework_TestCase {

    var $sortNumber;

    function setup() {
        $this->sortNumber = new SortNumberInArrays();
    }

    function testNumber1ShouldReturnArray1() {
        $expected = array(
            1 
        );
        $result = $this->sortNumber->sortNumber('1');
        $this->assertEquals($expected, $result);
    }

    function testNumber71ShouldReturnArray17() {
        $expected = array(
            1, 7 
        );
        $result = $this->sortNumber->sortNumber('7,1');
        $this->assertEquals($expected, $result);
    }

    function testNumber357ShouldReturnArray357() {
        $expected = array(
            3, 5, 7 
        );
        $result = $this->sortNumber->sortNumber('3,5,7');
        $this->assertEquals($expected, $result);
    }

    function testNumber2845ShouldReturnArray2458() {
        $expected = array(
            2, 4, 5, 8 
        );
        $result = $this->sortNumber->sortNumber('2,8,4,5');
        $this->assertEquals($expected, $result);
    }

    function testNumber3775ShouldReturnArray357() {
        $expected = array(
            3, 5, 7
        );
        $result = $this->sortNumber->sortNumber('3,7,7,5');
        $this->assertEquals($expected, $result);
    }

    function testNumberDuplicate9921() {
    	$expected = array(1, 2, 9);
    	$result = $this->sortNumber->sortNumber('9,"",2,1');
    	$this->assertEquals($expected, $result);
    }

}
?>