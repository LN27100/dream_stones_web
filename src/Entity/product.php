<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="PRODUCT_ID", type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="PRODUCT_NAME", type="string", length=255)
     */
    private $productName;

    /**
     * @ORM\Column(name="PRODUCT_COLOR",type="string", length=255)
     */
    private $productColor;

    /**
     * @ORM\Column(name="PRODUCT_UNIT_PRICE",type="float")
     */
    private $productPrice;

    /**
     * @ORM\Column(name="TYPE_ID", type="int", length=255)
     */
    private $productType;

    // Getters and setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName(): ?string
    {
        return $this->productName;
    }

    public function setProductName(string $productName): self
    {
        $this->productName = $productName;

        return $this;
    }

    public function getProductColor(): ?string
    {
        return $this->productColor;
    }

    public function setProductColor(string $productColor): self
    {
        $this->productColor = $productColor;

        return $this;
    }

    public function getProductPrice(): ?float
    {
        return $this->productPrice;
    }

    public function setProductPrice(float $productPrice): self
    {
        $this->productPrice = $productPrice;

        return $this;
    }

    public function getProductType(): ?int
    {
        return $this->productType;
    }

    public function setProductType(int $productType): self
    {
        $this->productType = $productType;

        return $this;
    }
}
