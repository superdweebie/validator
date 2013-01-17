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
class ValidatorResult
{

    protected $result;

    protected $messages;

    public function getResult() {
        return $this->result;
    }

    public function getMessages() {
        return $this->messages;
    }

    public function __construct($result, array $messages = []){
        $this->result = (boolean) $result;
        $this->messages = $messages;
    }
}
