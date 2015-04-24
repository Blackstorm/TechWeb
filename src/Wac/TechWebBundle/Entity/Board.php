<?php

namespace Wac\TechWebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Board
 *
 * @ORM\Table(name="board")
 * @ORM\Entity
 */
class Board
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Task", mappedBy="board", cascade={"remove"})
     */
    protected $task;

    /**
   * @ORM\ManyToMany(targetEntity="User", inversedBy="board", cascade={"persist"})
   * @ORM\JoinTable(name="user_board")
   *
   * @var ArrayCollection $user
   */
    protected $user;
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
     * Set name
     *
     * @param string $name
     * @return Board
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->task = new \Doctrine\Common\Collections\ArrayCollection();
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }


    public function __toString() {
        return $this->name;
    }
    /**
     * Add task
     *
     * @param \Wac\TechWebBundle\Entity\Task $task
     * @return Board
     */
    public function addTask(\Wac\TechWebBundle\Entity\Task $task)
    {
        $this->task[] = $task;

        return $this;
    }

    /**
     * Remove task
     *
     * @param \Wac\TechWebBundle\Entity\Task $task
     */
    public function removeTask(\Wac\TechWebBundle\Entity\Task $task)
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
     * Set user
     *
     * @param \Wac\TechWebBundle\Entity\User $user
     * @return Board
     */
    public function setUser(\Wac\TechWebBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Wac\TechWebBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add user
     *
     * @param \Wac\TechWebBundle\Entity\User $user
     * @return Board
     */
    public function addUser(\Wac\TechWebBundle\Entity\User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \Wac\TechWebBundle\Entity\User $user
     */
    public function removeUser(\Wac\TechWebBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }
}
