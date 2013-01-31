<?php

namespace Sds\Validator\Test;

use Sds\Validator\Group;
use Sds\Validator\Length;
use Sds\Validator\Alpha;

class GroupTest extends \PHPUnit_Framework_TestCase {

    public function testValidator(){

        $validator = new Group([
            new Length(1, 5),
            new Alpha()
        ]);

        $testArray = [
            [true, 'abc'],
            [true, 'ABC'],
            [false, 'abc1'],
            [false, 'abcdefg']
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
