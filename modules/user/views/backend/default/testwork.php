<?php

class myIterator implements Iterator {

    private $array = [];

    public function __construct($array) {
        $this->array = $array;
    }

    public function rewind() {
        var_dump(__METHOD__);
        reset($this->array);
    }

    public function next() {
        var_dump(__METHOD__);
        $result = next($this->array);
        return $result;
    }

    public function valid(): bool{
        var_dump(__METHOD__);
        $result = $this->current() !== false;
        return $result;
    }

    public function current() {
        var_dump(__METHOD__);
        $result = current($this->array);
        return $result;
    }

    public function key() {
        var_dump(__METHOD__);
        $result = key($this->array);
        return $result;
    }

}

$array = array(
    0 => 'Швейцария',
    1 => 'Германия',
    2 => 'Индонезия',
);

$it = new myIterator($array);

$start = microtime(true);

    foreach($it as $key => $value) {
        debug($value);
    }

echo xdebug_time_index() . ' sec.';






