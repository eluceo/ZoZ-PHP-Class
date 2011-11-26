<?php

/**
 * Ziehen ohne Zurücklegen
 */
class Zoz
{

    /** @var array */
    private $pool = array();

    /** @var int */
    private $i = 0;

    /** @var int */
    private $n = 0;

    /**
     * @param null $pool
     */
    public function __construct($pool = null)
    {
        if ($pool) {
            $this->setPool($pool);
        }
    }

    /**
     * @param $pool
     * @return void
     */
    public function setPool($pool)
    {
        $this->pool = array();

        $i = 0;
        foreach($pool as $element) {
            $this->pool[$i++] = $element;
        }

        $this->n = count($this->pool);
        $this->reShufflePool();
    }

    /**
     * @return void
     */
    public function reShufflePool()
    {
        shuffle($this->pool);
        $this->i = 0;
    }

    /**
     * @return mixed|boolean
     */
    public function getOneElement()
    {
        if ($this->i > ($this->n - 1)) {
            return false;
        } else {
            return $this->pool[$this->i++];
        }
    }

    /**
     * @param $n
     * @return array
     */
    public function getElements($n)
    {
        $elements = array();
        for ($n; $n>0; $n--) {
            $elements[] = $this->getOneElement();
        }
        return $elements;
    }
}