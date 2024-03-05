<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="userprofil")
 */
class Userprofil implements UserInterface
{
    public function getUserIdentifier(): string
{
    return $this->pseudo;
}

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="USERPROFIL_ID")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, name="USERPROFIL_PHONE")
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=50, name="USERPROFIL_STREET_NAME")
     */
    private $streetName;

    /**
     * @ORM\Column(type="string", length=50, unique=true, name="USERPROFIL_MAIL")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=50, unique=true, name="USERPROFIL_PSEUDO")
     */
    private $pseudo;

    /**
     * @ORM\Column(type="string", length=50, name="USERPROFIL_ADITTIONAL_ADRESS")
     */
    private $additionalAddress;

    /**
     * @ORM\Column(type="string", length=50, name="USERPROFIL_ZIPCODE")
     */
    private $zipcode;

    /**
     * @ORM\Column(type="string", length=255, name="USERPROFIL_PASSWORD")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=50, name="USERPROFIL_CITY")
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=50, name="USERPROFIL_FIRSTNAME")
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=50, name="USERPROFIL_NAME")
     */
    private $name;
    
    // Ajoutez vos getters et setters ici

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        var_dump($this->name);

        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getStreetName(): ?string
    {
        return $this->streetName;
    }

    public function setStreetName(string $streetName): self
    {
        $this->streetName = $streetName;

        return $this;
    }

    public function getAdditionalAddress(): ?string
    {
        return $this->additionalAddress;
    }

    public function setAdditionalAddress(?string $additionalAddress): self
    {
        $this->additionalAddress = $additionalAddress;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    // Implémentation des méthodes de UserInterface
    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    public function getSalt()
    {
        // Vous pouvez ignorer cette méthode si vous utilisez un encodeur de mot de passe moderne qui gère le sel lui-même
    }

    public function eraseCredentials()
    {
        // Vous pouvez ignorer cette méthode si vous ne supprimez pas les données sensibles de l'utilisateur
    }

    public function getUsername()
    {
        return $this->pseudo;
    }
}
