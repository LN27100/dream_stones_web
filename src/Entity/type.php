<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="type")
 */
class Type
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="TYPE_ID")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, name="TYPE_CATEGORY")
     */
    private $typeCategory;

    // GETTER ET SETTER

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeCategory(): ?string
    {
        return $this->typeCategory;
    }

    public function setTypeCategory(string $typeCategory): self
    {
        $this->typeCategory = $typeCategory;

        return $this;
    }
}
