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
    
    // Implémentation des méthodes de l'interface UserInterface

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getStreetName(): ?string
    {
        return $this->streetName;
    }

    public function setStreetName(string $streetName): void
    {
        $this->streetName = $streetName;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    public function getAdditionalAddress(): ?string
    {
        return $this->additionalAddress;
    }

    public function setAdditionalAddress(string $additionalAddress): void
    {
        $this->additionalAddress = $additionalAddress;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): void
    {
        $this->zipcode = $zipcode;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
    
    // Implémentation des méthodes de l'interface UserInterface
    
    public function getRoles(): array
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

    public function getUsername(): string
    {
        return $this->pseudo;
    }

    public function getUserIdentifier(): string
    {
        return $this->email;
    }
}
