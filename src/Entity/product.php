<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(name="product_name", type="string", length=100, nullable=true)
     */
    private $productName;

    /**
     * @ORM\Column(name="product_color", type="string", length=50, nullable=true)
     */
    private $productColor;

    /**
     * @ORM\Column(name="product_unit_price", type="decimal", precision=9, scale=2)
     */
    private $productPrice;

    /**
     * @ORM\Column(name="product_picture", type="string", length=50, nullable=true)
     */
    private $productPicture;

    /**
     * @ORM\Column(name="product_desc", type="string", length=750)
     */
    private $productDescription;

    /**
     * @ORM\Column(name="product_origin_country", type="string", length=50)
     */
    private $productOriginCountry;

    /**
     * @ORM\Column(name="product_ref", type="string", length=50, unique=true)
     */
    private $productReference;

    /**
     * @ORM\Column(name="product_stock", type="integer")
     */
    private $productStock;

    /**
     * @ORM\Column(name="spl_id", type="integer")
     */
    private $supplierId;

    /**
     * @ORM\Column(name="type_id", type="integer")
     */
    private $productType;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProductImage", mappedBy="product", cascade={"persist", "remove"})
     */
    private $images;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

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

    public function getProductPicture(): ?string
    {
        return $this->productPicture;
    }

    public function setProductPicture(string $productPicture): self
    {
        $this->productPicture = $productPicture;

        return $this;
    }

    public function getProductDescription(): ?string
    {
        return $this->productDescription;
    }

    public function setProductDescription(string $productDescription): self
    {
        $this->productDescription = $productDescription;

        return $this;
    }

    public function getProductOriginCountry(): ?string
    {
        return $this->productOriginCountry;
    }

    public function setProductOriginCountry(string $productOriginCountry): self
    {
        $this->productOriginCountry = $productOriginCountry;

        return $this;
    }

    public function getProductReference(): ?string
    {
        return $this->productReference;
    }

    public function setProductReference(string $productReference): self
    {
        $this->productReference = $productReference;

        return $this;
    }

    public function getProductStock(): ?int
    {
        return $this->productStock;
    }

    public function setProductStock(int $productStock): self
    {
        $this->productStock = $productStock;

        return $this;
    }

    public function getSupplierId(): ?int
    {
        return $this->supplierId;
    }

    public function setSupplierId(int $supplierId): self
    {
        $this->supplierId = $supplierId;

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

    /**
     * @return array
     */
    public function getImagePaths(): array
    {
        return $this->images->map(function (ProductImage $image) {
            return $image->getImagePath();
        })->toArray();
    }

    public function addImage(ProductImage $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setProduct($this);
        }

        return $this;
    }

    public function removeImage(ProductImage $image): self
    {
        if ($this->images->removeElement($image)) {
            if ($image->getProduct() === $this) {
                $image->setProduct(null);
            }
        }

        return $this;
    }
}
