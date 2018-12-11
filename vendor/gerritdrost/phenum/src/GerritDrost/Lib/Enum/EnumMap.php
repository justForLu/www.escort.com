<?php

namespace GerritDrost\Lib\Enum;

use ArrayAccess;
use InvalidArgumentException;
use Iterator;

class EnumMap implements Iterator, ArrayAccess {

    /**
     * @var string fqcn of the Enum
     */
    private $fqcn;

    /**
     * @var mixed[]
     */
    private $valueMap;

    /**
     * @var Enum[]
     */
    private $mappedEnums;

    /**
     * @var int
     */
    private $iteratorIndex;

    /**
     * @param string $fqcn FQCN of the enum class
     *
     * @throws InvalidArgumentException
     */
    public function __construct($fqcn)
    {
        if (!is_subclass_of($fqcn, Enum::class)) {
            throw new InvalidArgumentException(sprintf('Provided fqcn %s does not represent a class that extends %s', $fqcn, Enum::class));
        }

        $this->fqcn          = $fqcn;
        $this->mappedEnums   = [];
        $this->valueMap      = [];
        $this->iteratorIndex = 0;
    }

    /**
     * @param string $fqcn FQCN of the enum class
     *
     * @return EnumMap
     *
     * @throws InvalidArgumentException
     */
    public static function create($fqcn) {
        return new EnumMap($fqcn);
    }

    /**
     * @return string fqcn of the Enum
     */
    public function getEnumFQCN()
    {
        return $this->fqcn;
    }

    /**
     * @param Enum $enum An offset to check for.
     *
     * @return boolean true on success or false on failure.
     *
     * @throws InvalidArgumentException
     */
    public function has(Enum $enum)
    {
        $this->checkType($enum);

        return isset($this->valueMap[$enum->getConstName()]);
    }

    /**
     * @param Enum  $enum            The offset to retrieve.
     * @param mixed $notPresentValue The value to return when the enum is not mapped
     *
     * @return mixed Can return all value types.
     *
     * @throws InvalidArgumentException
     */
    public function get(Enum $enum, $notPresentValue = null)
    {
        $this->checkType($enum);

        return isset($this->valueMap[$enum->getConstName()])
            ? $this->valueMap[$enum->getConstName()]
            : $notPresentValue;
    }

    /**
     * @param Enum  $enum The offset to assign the value to.
     * @param mixed $value  The value to set.
     *
     * @return $this
     *
     * @throws InvalidArgumentException
     */
    public function map(Enum $enum, $value)
    {
        $this->checkType($enum);

        $this->valueMap[$enum->getConstName()] = $value;
        $this->mappedEnums[]                  = $enum;

        return $this;
    }

    /**
     * @param Enum $enum The offset to unset.
     *
     * @return mixed|null the removed value on success, null otherwise
     *
     * @throws InvalidArgumentException
     */
    public function remove(Enum $enum)
    {
        $this->checkType($enum);

        $enumName = $enum->getConstName();

        if (isset($this->valueMap[$enumName])) {
            $value = $this->valueMap[$enumName];

            unset($this->valueMap[$enumName]);

            $index = array_search($enum, $this->mappedEnums);
            unset($this->mappedEnums[$index]);

            return $value;
        }

        return null;
    }

    /**
     * @return int
     */
    public function size()
    {
        return count($this->valueMap);
    }

    /**
     * Clears the entire EnumMap
     */
    public function clear()
    {
        $this->valueMap    = [];
        $this->mappedEnums = [];
    }

    /**
     * @param Enum $enum
     *
     * @throws InvalidArgumentException
     */
    protected function checkType(Enum $enum)
    {
        if (get_class($enum) !== $this->fqcn) {
            throw new InvalidArgumentException(sprintf('Provided variable $enum is not of type %s', $this->fqcn));
        }
    }

    /**
     * Return the current element
     *
     * @link http://php.net/manual/en/iterator.current.php
     *
     * @return mixed
     */
    public function current()
    {
        return isset($this->mappedEnums[$this->iteratorIndex])
            ? $this->valueMap[$this->mappedEnums[$this->iteratorIndex]->getConstName()]
            : null;
    }

    /**
     * Move forward to next element
     *
     * @link http://php.net/manual/en/iterator.next.php
     *
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        $this->iteratorIndex++;
    }

    /**
     * Return the key of the current element
     *
     * @link http://php.net/manual/en/iterator.key.php
     *
     * @return Enum
     */
    public function key()
    {
        return isset($this->mappedEnums[$this->iteratorIndex])
            ? $this->mappedEnums[$this->iteratorIndex]
            : null;
    }

    /**
     * Checks if current position is valid
     *
     * @link http://php.net/manual/en/iterator.valid.php
     *
     * @return boolean The return value will be casted to boolean and then evaluated.
     *       Returns true on success or false on failure.
     */
    public function valid()
    {
        return isset($this->mappedEnums[$this->iteratorIndex]);
    }

    /**
     * Rewind the Iterator to the first element
     *
     * @link http://php.net/manual/en/iterator.rewind.php
     *
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        $this->iteratorIndex = 0;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Whether a offset exists
     *
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     *
     * @param mixed $offset <p>
     *                      An offset to check for.
     *                      </p>
     *
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     */
    public function offsetExists($offset)
    {
        return $this->has($offset);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to retrieve
     *
     * @link http://php.net/manual/en/arrayaccess.offsetget.php
     *
     * @param mixed $offset <p>
     *                      The offset to retrieve.
     *                      </p>
     *
     * @return mixed Can return all value types.
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to set
     *
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     *
     * @param mixed $offset <p>
     *                      The offset to assign the value to.
     *                      </p>
     * @param mixed $value  <p>
     *                      The value to set.
     *                      </p>
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->map($offset, $value);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to unset
     *
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     *
     * @param mixed $offset <p>
     *                      The offset to unset.
     *                      </p>
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        $this->remove($offset);
}}