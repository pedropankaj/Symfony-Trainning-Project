<?php

namespace Smartshore\SignUpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Item
 */
class Item
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $itemName;

    /**
     * @var integer
     */
    private $itemStatus;
    
    private $Lists;

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
     * Set itemName
     *
     * @param string $itemName
     * @return Item
     */
    public function setItemName($itemName)
    {
        $this->itemName = $itemName;

        return $this;
    }

    /**
     * Get itemName
     *
     * @return string 
     */
    public function getItemName()
    {
        return $this->itemName;
    }

    /**
     * Set itemStatus
     *
     * @param integer $itemStatus
     * @return Item
     */
    public function setItemStatus($itemStatus)
    {
        $this->itemStatus = $itemStatus;

        return $this;
    }

    /**
     * Get itemStatus
     *
     * @return integer 
     */
    public function getItemStatus()
    {
        return $this->itemStatus;
    }
    /**
     * @var \Smartshore\SignUpBundle\Entity\Lists
     */
    private $lists;


    /**
     * Set lists
     *
     * @param \Smartshore\SignUpBundle\Entity\Lists $lists
     * @return Item
     */
    public function setLists(\Smartshore\SignUpBundle\Entity\Lists $lists = null)
    {
        $this->lists = $lists;

        return $this;
    }

    /**
     * Get lists
     *
     * @return \Smartshore\SignUpBundle\Entity\Lists 
     */
    public function getLists()
    {
        return $this->lists;
    }
    /**
     * @var string
     */
    private $ListOrder;


    /**
     * Set listOrder
     *
     * @param string $listOrder
     * @return Item
     */
    public function setListOrder($listOrder)
    {
        $this->listOrder = $listOrder;

        return $this;
    }

    /**
     * Get listOrder
     *
     * @return string 
     */
    public function getListOrder()
    {
        return $this->listOrder;
    }
    /**
     * @var string
     */
    private $listOrder;


    /**
     * @var string
     */
    private $listColor;


    /**
     * Set listColor
     *
     * @param string $listColor
     * @return Item
     */
    public function setListColor($listColor)
    {
        $this->listColor = $listColor;

        return $this;
    }

    /**
     * Get listColor
     *
     * @return string 
     */
    public function getListColor()
    {
        return $this->listColor;
    }
    /**
     * @var string
     */
    private $itemColor;


    /**
     * Set itemColor
     *
     * @param string $itemColor
     * @return Item
     */
    public function setItemColor($itemColor)
    {
        $this->itemColor = $itemColor;

        return $this;
    }

    /**
     * Get itemColor
     *
     * @return string 
     */
    public function getItemColor()
    {
        return $this->itemColor;
    }
}
