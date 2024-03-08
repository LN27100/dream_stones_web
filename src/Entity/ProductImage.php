<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_image")
 */
class ProductImage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="PRODUCT_ID", type="integer")
     */
    private $id;

    /**
 * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="images")
 * @ORM\JoinColumn(name="PRODUCT_ID", referencedColumnName="PRODUCT_ID", nullable=false)
 */
private $product;

    /**
     * @ORM\Column(name="image_path", type="string", length=255)
     */
    private $imagePath;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function setImagePath(string $imagePath): self
    {
        $this->imagePath = $imagePath;

        return $this;
    }
}
