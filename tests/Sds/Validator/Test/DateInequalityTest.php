<?php

namespace Sds\Validator\Test;

use Sds\Validator\DateInequality;

class DateInequalityTest extends \PHPUnit_Framework_TestCase {

    public function testLessThan(){

        $validator = new DateInequality('>', new \DateTime('2013-01-01'));

        $testArray = [
            [true, new \DateTime('2010-01-01')],
            [true, new \DateTime('2012-12-31')],
            [false, new \DateTime('2013-01-01')],
            [false, new \DateTime('2013-01-02')]
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

        $validator = new DateInequality('>=', new \DateTime('2013-01-01'));

        $testArray = [
            [true, new \DateTime('2010-01-01')],
            [true, new \DateTime('2012-12-31')],
            [true, new \DateTime('2013-01-01')],
            [false, new \DateTime('2013-01-02')]
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

        $validator = new DateInequality('<', new \DateTime('2013-01-01'));

        $testArray = [
            [false, new \DateTime('2010-01-01')],
            [false, new \DateTime('2012-12-31')],
            [false, new \DateTime('2013-01-01')],
            [true, new \DateTime('2013-01-02')]
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

        $validator = new DateInequality('<=', new \DateTime('2013-01-01'));

        $testArray = [
            [false, new \DateTime('2010-01-01')],
            [false, new \DateTime('2012-12-31')],
            [true, new \DateTime('2013-01-01')],
            [true, new \DateTime('2013-01-02')]
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

        $validator = new DateInequality('!=', new \DateTime('2013-01-01'));

        $testArray = [
            [true, new \DateTime('2010-01-01')],
            [true, new \DateTime('2012-12-31')],
            [false, new \DateTime('2013-01-01')],
            [true, new \DateTime('2013-01-02')]
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
