<?php
declare(strict_types=1);
namespace Etewa\Model;


class Sport
{
    /** @var  int id */
    private $id;

    /** @var string $name */
    protected $name;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Sport
     */
    public function setId(int $id): Sport
    {
        $this->id = $id;
        return $this;
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Sport
     */
    public function setName(string $name): Sport
    {
        $this->name = $name;
        return $this;
    }

    public function getList()
    {

    }

}