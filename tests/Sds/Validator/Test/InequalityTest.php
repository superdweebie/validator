<?php

namespace Sds\Validator\Test;

use Sds\Validator\Inequality;

class InequalityTest extends \PHPUnit_Framework_TestCase {

    public function testLessThan(){

        $validator = new Inequality('>', 10);

        $testArray = [
            [true, 9],
            [true, '9'],
            [false, 10],
            [false, 10.01]
        ];

        foreach ($testArray as $item) {
            if ($item[0]){
                $this->assertTrue($validator->isValid($item[1])->getResult());
            } else {
                $this->assertFalse($validator->isValid($item[1])->getResult());
            }
        }
    }

    public function testLessOrEqualThan(){

        $validator = new Inequality('>=', 10);

        $testArray = [
            [true, 9],
            [true, '9'],
            [true, 10],
            [false, 10.01]
        ];

        foreach ($testArray as $item) {
            if ($item[0]){
                $this->assertTrue($validator->isValid($item[1])->getResult());
            } else {
                $this->assertFalse($validator->isValid($item[1])->getResult());
            }
        }
    }

    public function testGreaterThan(){

        $validator = new Inequality('<', 10);

        $testArray = [
            [true, 11],
            [true, '11'],
            [false, 10],
            [false, 9.9]
        ];

        foreach ($testArray as $item) {
            if ($item[0]){
                $this->assertTrue($validator->isValid($item[1])->getResult());
            } else {
                $this->assertFalse($validator->isValid($item[1])->getResult());
            }
        }
    }

    public function testGreaterOrEqualThan(){

        $validator = new Inequality('<=', 10);

        $testArray = [
            [true, 11],
            [true, '11'],
            [true, 10],
            [false, 9.9]
        ];

        foreach ($testArray as $item) {
            if ($item[0]){
                $this->assertTrue($validator->isValid($item[1])->getResult());
            } else {
                $this->assertFalse($validator->isValid($item[1])->getResult());
            }
        }
    }

    public function testNotEqual(){

        $validator = new Inequality('!=', 10);

        $testArray = [
            [true, 11],
            [true, '11'],
            [false, 10],
            [true, 9.9]
        ];

        foreach ($testArray as $item) {
            if ($item[0]){
                $this->assertTrue($validator->isValid($item[1])->getResult());
            } else {
                $this->assertFalse($validator->isValid($item[1])->getResult());
            }
        }
    }
}
