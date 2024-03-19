<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="orders")
 */
class Orders
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="ORDERS_ID", type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="ORDERS_SHIPPING", type="string", length=50, nullable=true)
     */
    private $shipping;

    /**
     * @ORM\Column(name="ORDERS_PAYEMENT_MODE", type="string", length=50, nullable=true)
     */
    private $paymentMode;

    /**
     * @ORM\Column(name="ORDERS_DELETE_ARTICLE", type="string", length=50, nullable=true)
     */
    private $deleteArticle;

    /**
     * @ORM\Column(name="ORDERS_NEW_PRICE", type="decimal", precision=9, scale=2, nullable=true)
     */
    private $newPrice;

    /**
     * @ORM\Column(name="ORDER_STATUS", type="string", length=50, nullable=true)
     */
    private $status;

    /**
     * @ORM\Column(name="ORDERS_SHIPPING_FEES", type="decimal", precision=9, scale=2, nullable=true)
     */
    private $shippingFees;

    /**
     * @ORM\Column(name="ORDER_CANCELLATION", type="string", length=50, nullable=true)
     */
    private $cancellation;

    /**
     * @ORM\Column(name="ORDERS_TOTAL_PRICE", type="decimal", precision=9, scale=2, nullable=true)
     */
    private $totalPrice;

    /**
     * @ORM\Column(name="ORDERS_TOTAL_QUANTITY", type="integer", nullable=true)
     */
    private $totalQuantity;

    /**
     * @ORM\Column(name="ORDERS_REF", type="string", length=50, unique=true)
     */
    private $ref;

    /**
     * @ORM\Column(name="ORDERS_DATE", type="date")
     */
    private $date;

    /**
     * @ORM\Column(name="ORDERS_QUANTITY", type="integer", nullable=true)
     */
    private $quantity;

    /**
     * @ORM\Column(name="USERPROFIL_ID", type="integer")
     */
    private $userProfileId;


    // GETTERS ET SETTERS
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShipping(): ?string
    {
        return $this->shipping;
    }

    public function setShipping(string $shipping): self
    {
        $this->shipping = $shipping;
        return $this;
    }

    public function getPaymentMode(): ?string
    {
        return $this->paymentMode;
    }

    public function setPaymentMode(string $paymentMode): self
    {
        $this->paymentMode = $paymentMode;
        return $this;
    }

    public function getDeleteArticle(): ?string
    {
        return $this->deleteArticle;
    }

    public function setDeleteArticle(?string $deleteArticle): self
    {
        $this->deleteArticle = $deleteArticle;
        return $this;
    }

    public function getNewPrice(): ?float
    {
        return $this->newPrice;
    }

    public function setNewPrice(?float $newPrice): self
    {
        $this->newPrice = $newPrice;
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getShippingFees(): ?float
    {
        return $this->shippingFees;
    }

    public function setShippingFees(?float $shippingFees): self
    {
        $this->shippingFees = $shippingFees;
        return $this;
    }

    public function getCancellation(): ?string
    {
        return $this->cancellation;
    }

    public function setCancellation(?string $cancellation): self
    {
        $this->cancellation = $cancellation;
        return $this;
    }

    public function getTotalPrice(): ?float
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(?float $totalPrice): self
    {
        $this->totalPrice = $totalPrice;
        return $this;
    }

    public function getTotalQuantity(): ?int
    {
        return $this->totalQuantity;
    }

    public function setTotalQuantity(?int $totalQuantity): self
    {
        $this->totalQuantity = $totalQuantity;
        return $this;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(string $ref): self
    {
        $this->ref = $ref;
        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getUserProfileId(): ?int
    {
        return $this->userProfileId;
    }

    public function setUserProfileId(int $userProfileId): self
    {
        $this->userProfileId = $userProfileId;
        return $this;
    }
}
