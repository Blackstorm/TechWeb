<?php

namespace Wac\TechWebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;


/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class User extends BaseUser
{


    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Board", mappedBy="user")
     */
    protected $board;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add task
     *
     * @param \Wac\TechWebBundle\Entity\Board $task
     * @return User
     */
    public function addTask(\Wac\TechWebBundle\Entity\Board $task)
    {
        $this->task[] = $task;

        return $this;
    }

    /**
     * Remove task
     *
     * @param \Wac\TechWebBundle\Entity\Board $task
     */
    public function removeTask(\Wac\TechWebBundle\Entity\Board $task)
    {
        $this->task->removeElement($task);
    }

    /**
     * Get task
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * Add board
     *
     * @param \Wac\TechWebBundle\Entity\Board $board
     * @return User
     */
    public function addBoard(\Wac\TechWebBundle\Entity\Board $board)
    {
        $this->board[] = $board;

        return $this;
    }

    /**
     * Remove board
     *
     * @param \Wac\TechWebBundle\Entity\Board $board
     */
    public function removeBoard(\Wac\TechWebBundle\Entity\Board $board)
    {
        $this->board->removeElement($board);
    }

    /**
     * Get board
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBoard()
    {
        return $this->board;
    }
}
