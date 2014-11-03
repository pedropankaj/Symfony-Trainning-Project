<?php

namespace Smartshore\SignUpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lists
 */
class Lists
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $listName;

    /**
     * @var integer
     */
    private $listStatus;

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
     * Set listName
     *
     * @param string $listName
     * @return Lists
     */
    public function setListName($listName)
    {
        $this->listName = $listName;

        return $this;
    }

    /**
     * Get listName
     *
     * @return string 
     */
    public function getListName()
    {
        return $this->listName;
    }

    /**
     * Set listStatus
     *
     * @param integer $listStatus
     * @return Lists
     */
    public function setListStatus($listStatus)
    {
        $this->listStatus = $listStatus;

        return $this;
    }

    /**
     * Get listStatus
     *
     * @return integer 
     */
    public function getListStatus()
    {
        return $this->listStatus;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $item;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->item = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add item
     *
     * @param \Smartshore\SignUpBundle\Entity\Item $item
     * @return Lists
     */
    public function addItem(\Smartshore\SignUpBundle\Entity\Item $item)
    {
        $this->item[] = $item;

        return $this;
    }

    /**
     * Remove item
     *
     * @param \Smartshore\SignUpBundle\Entity\Item $item
     */
    public function removeItem(\Smartshore\SignUpBundle\Entity\Item $item)
    {
        $this->item->removeElement($item);
    }

    /**
     * Get item
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getItem()
    {
        return $this->item;
    }
}
