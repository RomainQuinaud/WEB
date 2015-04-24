<?php
use CalendR\Event\AbstractEvent;

class ResEvent extends AbstractEvent
{
    protected $begin;
    protected $end;
    protected $uid;

    // And all your fields

    public function __construct($uid, \DateTime $start, \DateTime $end)
    {
        $this->uid = $uid;
        $this->begin = clone $start;
        $this->end = clone $end;
    }

    public function getUid()
    {
        return $this->uid;
    }

    public function getBegin()
    {
        return $this->begin;
    }

    public function getEnd()
    {
        return $this->end;
    }
}