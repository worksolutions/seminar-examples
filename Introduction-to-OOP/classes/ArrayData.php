<?php
/**
 * @author Maxim Sokolovsky <sokolovsky@worksolutions.ru>
 */

class ArrayData {

    /**
     * @var array
     */
    private $value;

    /**
     * @param array $value
     */
    public function __construct(array $value) {
        $this->value = $value;
    }

    /**
     * @param array $value
     */
    public function merge(array $value) {
        $this->value = array_merge($this->value ?: array(), $value);
    }

    /**
     * Filter elements in array
     * @param $function
     * @throws Exception
     */
    public function filter($function) {
        if (!is_callable($function) || !$function instanceof Closure) {
            throw new Exception("filter use with function");
        }
        $this->value = array_filter($this->value, $function);
    }

    /**
     * Assign prefix to each element
     * @param $prefix
     */
    public function assignPrefix($prefix) {
        array_walk($this->value, function (& $value) use ($prefix) {
            $value .= $prefix.''.$value;
        });
    }

    /**
     * @return array
     */
    public function getData() {
        return $this->value;
    }
}
