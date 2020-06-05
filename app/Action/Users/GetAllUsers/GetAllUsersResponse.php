<?php


namespace App\Action\Users\GetAllUsers;


class GetAllUsersResponse
{
    private $collection;

    /**
     * GetAllUsersResponse constructor.
     */
    public function __construct($collection)
    {
        $this->collection = $collection;
    }

    public function getCollection()
    {
        return $this->collection;
    }

    public function toArray(): array
    {
        return $this->collection->toArray();
    }
}
