<?php

namespace Layer\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrderEntry
 */
class OrderEntry
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $product;

    /**
     * @var integer
     */
    private $order;

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
     * Set product
     *
     * @param \Layer\ShopBundle\Entity\Product $product
     * @return OrderEntry
     */
    public function setProduct(\Layer\ShopBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \Layer\ShopBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set order
     *
     * @param \Layer\ShopBundle\Entity\Order $order
     * @return OrderEntry
     */
    public function setOrder(\Layer\ShopBundle\Entity\Order $order = null)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return \Layer\ShopBundle\Entity\Order 
     */
    public function getOrder()
    {
        return $this->order;
    }
}
