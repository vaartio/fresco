<?php

namespace Layer\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Order
 */
class Order
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $ordererId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $entries;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->entries = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set ordererId
     *
     * @param integer $ordererId
     * @return Order
     */
    public function setOrdererId($ordererId)
    {
        $this->ordererId = $ordererId;

        return $this;
    }

    /**
     * Get ordererId
     *
     * @return integer
     */
    public function getOrdererId()
    {
        return $this->ordererId;
    }

    /**
     * Add entries
     *
     * @param \Layer\ShopBundle\Entity\orderEntry $entries
     * @return Order
     */
    public function addEntry(\Layer\ShopBundle\Entity\orderEntry $entries)
    {
        $this->entries[] = $entries;

        return $this;
    }

    /**
     * Remove entries
     *
     * @param \Layer\ShopBundle\Entity\orderEntry $entries
     */
    public function removeEntry(\Layer\ShopBundle\Entity\orderEntry $entries)
    {
        $this->entries->removeElement($entries);
    }

    /**
     * Get entries
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEntries()
    {
        return $this->entries;
    }
}
