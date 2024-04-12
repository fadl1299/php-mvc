<?php

namespace SecTheater\Validation\Rules;

use SecTheater\Validation\Rules\Contract\Rule;

class MaxRule implements Rule {

    protected $max;

    public function __construct($max)
    {
        $this->$max = $max;
    }

    public function apply($field, $value, $data = [])
    {
        return (strlen($value) < $this->max);
    }

    public function __toString()
    {
        return `%s Must Be Less Than ($this->max)`;
    }

}


?>