<?php
/**
 * @link       http://superdweebie.com
 * @package    Sds
 * @license    MIT
 */
namespace Sds\Validator;

/**
 *
 * @since   1.0
 * @author  Tim Roediger <superdweebie@gmail.com>
 */
class Group extends AbstractValidator
{

    protected $validators = [];

    public function __construct($validators = []){
        $this->validators = $validators;
    }

    public function isValid($value){

        $messages = [];

        $result = true;

        foreach($this->validators as $validator){
            if ($result && method_exists($validator, 'getSkipOnPass') && $validator->getSkipOnPass()){
                continue;
            }
            if (! $result && method_exists($validator, 'getSkipOnFail') && $validator->getSkipOnFail()){
                continue;
            }
            $validatorResult = $validator->isValid($value);
            if ( ! $validatorResult->getResult()){
                $result = false;
                $messages = array_merge($messages, $validatorResult->getMessages());
                if (method_exists($validator, 'getHaltOnFail') && $validator->getHaltOnFail()){
                    return new ValidatorResult($result, $messages);
                }
            }
            if (method_exists($validator, 'getHaltOnPass') && $validator->getHaltOnPass()){
                return new ValidatorResult($result, $messages);
            }
        }

        return new ValidatorResult($result, $messages);
    }
}
