<?php

namespace Sds\Validator\Test;

use Sds\Validator\ValidatorFactory;

class ValidatorFactoryTest extends \PHPUnit_Framework_TestCase {

    protected $class = 'Sds\Validator\Length';

    protected $options = [
        'min' => 2,
        'max' => 2
    ];

    public function testSingleClassArg(){
        $validator = ValidatorFactory::create($this->class);
        $this->assertInstanceOf($this->class, $validator);
    }

    public function testClassAndOptionsArg(){
        $validator = ValidatorFactory::create($this->class, $this->options);
        $this->assertInstanceOf($this->class, $validator);
        $this->assertTrue($validator->isValid('12')->getResult());
        $this->assertFalse($validator->isValid('1')->getResult());
        $this->assertFalse($validator->isValid('123')->getResult());
    }

    public function testSingleArrayArg(){
        $validator = ValidatorFactory::create(['class' => $this->class, 'options' => $this->options]);
        $this->assertInstanceOf($this->class, $validator);
        $this->assertTrue($validator->isValid('12')->getResult());
        $this->assertFalse($validator->isValid('1')->getResult());
        $this->assertFalse($validator->isValid('123')->getResult());
    }

    public function testMultipleArrayArg(){
        $validator = ValidatorFactory::create([
            ['class' => $this->class, 'options' => $this->options],
            ['class' => $this->class, 'options' => $this->options]
        ]);
        $this->assertInstanceOf('Sds\Validator\ValidatorGroup', $validator);
        $this->assertTrue($validator->isValid('12')->getResult());
        $this->assertFalse($validator->isValid('1')->getResult());
        $this->assertFalse($validator->isValid('123')->getResult());
    }
}
