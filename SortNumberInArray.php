<?php

class SortNumberInArrays {

    function sortNumber($stingInput) {
        $arrayInput = explode(',', $stingInput);
        $arrayInput = explode(',', $stingInput);
        $arrayUnique = null;
        foreach ($arrayInput as $val) {
            if (intval($val)!=0) {
                $arrayUnique[$val] = $val;
            }
        }
        $arrayUniqueIndex = null;
        foreach ($arrayUnique as $key => $val) {
            $arrayUniqueIndex[] = $key;
        }
        $tmp = null;
        for ($i = 0; $i < count($arrayUniqueIndex); $i++) {
            for ($j = 0; $j < count($arrayUniqueIndex) - 1; $j++) {
                if ($arrayUniqueIndex[$j + 1] < $arrayUniqueIndex[$j]) {
                    $tmp = $arrayUniqueIndex[$j];
                    $arrayUniqueIndex[$j] = $arrayUniqueIndex[$j + 1];
                    $arrayUniqueIndex[$j + 1] = $tmp;
                }
            }
        }
        return $arrayUniqueIndex;
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
        $expected = array(
            1, 2, 9
        );
        $result = $this->sortNumber->sortNumber('9,"x",2,1');
        $this->assertEquals($expected, $result);
    }

}
?>