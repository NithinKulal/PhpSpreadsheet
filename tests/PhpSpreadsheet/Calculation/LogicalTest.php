<?php

namespace PhpSpreadsheet\Tests\Calculation;

use PHPExcel\Calculation\Functions;
use PHPExcel\Calculation\Logical;

class LogicalTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        Functions::setCompatibilityMode(Functions::COMPATIBILITY_EXCEL);
    }

    public function testTRUE()
    {
        $result = Logical::TRUE();
        $this->assertEquals(true, $result);
    }

    public function testFALSE()
    {
        $result = Logical::FALSE();
        $this->assertEquals(false, $result);
    }

    /**
     * @dataProvider providerAND
     */
    public function testAND()
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(array(Logical::class,'logicalAnd'), $args);
        $this->assertEquals($expectedResult, $result);
    }

    public function providerAND()
    {
        return new \PhpSpreadsheet\Tests\TestDataFileIterator('rawTestData/Calculation/Logical/AND.data');
    }

    /**
     * @dataProvider providerOR
     */
    public function testOR()
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(array(Logical::class,'logicalOr'), $args);
        $this->assertEquals($expectedResult, $result);
    }

    public function providerOR()
    {
        return new \PhpSpreadsheet\Tests\TestDataFileIterator('rawTestData/Calculation/Logical/OR.data');
    }

    /**
     * @dataProvider providerNOT
     */
    public function testNOT()
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(array(Logical::class,'NOT'), $args);
        $this->assertEquals($expectedResult, $result);
    }

    public function providerNOT()
    {
        return new \PhpSpreadsheet\Tests\TestDataFileIterator('rawTestData/Calculation/Logical/NOT.data');
    }

    /**
     * @dataProvider providerIF
     */
    public function testIF()
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(array(Logical::class,'statementIf'), $args);
        $this->assertEquals($expectedResult, $result);
    }

    public function providerIF()
    {
        return new \PhpSpreadsheet\Tests\TestDataFileIterator('rawTestData/Calculation/Logical/IF.data');
    }

    /**
     * @dataProvider providerIFERROR
     */
    public function testIFERROR()
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(array(Logical::class,'IFERROR'), $args);
        $this->assertEquals($expectedResult, $result);
    }

    public function providerIFERROR()
    {
        return new \PhpSpreadsheet\Tests\TestDataFileIterator('rawTestData/Calculation/Logical/IFERROR.data');
    }
}
