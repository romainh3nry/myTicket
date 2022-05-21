<?php

namespace Myticket\Models;


class Tickets extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $title;

    /**
     *
     * @var string
     */
    public $date_creation;

    /**
     *
     * @var string
     */
    public $date_closure;

    /**
     *
     * @var string
     */
    public $author;

    /**
     *
     * @var string
     */
    public $service;

    /**
     *
     * @var string
     */
    public $state;

    /**
     *
     * @var string
     */
    public $message;

    /**
     *
     * @var string
     */
    public $related_to;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
        $this->setSource("tickets");
        $this->hasMany('id', 'TicketsUpdates', 'ticket_id', ['alias' => 'TicketsUpdates']);
        $this->belongsTo('author', 'Users', 'id', ['alias' => 'Users']);
        $this->belongsTo('related_to', 'Customers', 'id', ['alias' => 'Customers']);
        $this->belongsTo('service', 'Services', 'id', ['alias' => 'Services']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tickets';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tickets[]|Tickets|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tickets|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
