<?php

namespace rodriguezric\FP;

class Box
{
    private $value;
    private $condition;

    public function __construct($value) 
    {
        $this->value = $value;
        $this->condition = true;
    }

    public function _if(callable $condition)
    {
        $this->condition = $condition();

        return $this;
    }


    public function _endif()
    {
        $this->condition = true;

        return $this;
    }

    public function __invoke(callable $callable)
    {
        if ($this->condition) {
            $this->value = $callable($this->value);
        }

        return $this;
    }

    public function set($value) {
        $this->value = $value;

        return $this;
    }

    public function get()
    {
        return $this->value;
    }

    public function useValueWith(callable $callable) 
    {
        $callable($this->value);
    
        return $this;
    }
}
