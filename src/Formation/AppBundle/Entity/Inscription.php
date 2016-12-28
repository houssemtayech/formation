<?php

namespace Formation\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscription
 *
 * @ORM\Table(name="inscription")
 * @ORM\Entity(repositoryClass="Formation\AppBundle\Repository\InscriptionRepository")
 */
class Inscription
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titleFormation", type="string", length=255)
     */
    private $titleFormation;

    /**
     * @var int
     *
     * @ORM\Column(name="codeFormation", type="bigint")
     */
    private $codeFormation;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="codePromo", type="bigint", nullable=true)
     */
    private $codePromo;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=255, nullable=true)
     */
    private $comment;

    /**
     * @var string
     *
     * @ORM\Column(name="inscriptionSource", type="string", length=255)
     */
    private $inscriptionSource;

    /**
     * @var string
     *
     * @ORM\Column(name="civility", type="string", length=255)
     */
    private $civility;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="fonction", type="string", length=255, nullable=true)
     */
    private $fonction;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="responsibleFirstName", type="string", length=255)
     */
    private $responsibleFirstName;

    /**
     * @var string
     *
     * @ORM\Column(name="responsibleLastName", type="string", length=255)
     */
    private $responsibleLastName;

    /**
     * @var string
     *
     * @ORM\Column(name="responsibleEmail", type="string", length=255)
     */
    private $responsibleEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="iResponsibleCivility", type="string", length=255)
     */
    private $iResponsibleCivility;

    /**
     * @var string
     *
     * @ORM\Column(name="iResponsibleFirstName", type="string", length=255)
     */
    private $iResponsibleFirstName;

    /**
     * @var string
     *
     * @ORM\Column(name="iResponsibleLastName", type="string", length=255)
     */
    private $iResponsibleLastName;

    /**
     * @var string
     *
     * @ORM\Column(name="iResponsibleFonction", type="string", length=255, nullable=true)
     */
    private $iResponsibleFonction;

    /**
     * @var string
     *
     * @ORM\Column(name="iResposiblePhone", type="string", length=255)
     */
    private $iResposiblePhone;

    /**
     * @var string
     *
     * @ORM\Column(name="iResponsibleEmail", type="string", length=255)
     */
    private $iResponsibleEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=255)
     */
    private $company;

    /**
     * @var string
     *
     * @ORM\Column(name="companyService", type="string", length=255, nullable=true)
     */
    private $companyService;

    /**
     * @var string
     *
     * @ORM\Column(name="companyAddress", type="string", length=255)
     */
    private $companyAddress;

    /**
     * @var int
     *
     * @ORM\Column(name="companyPostalCode", type="integer")
     */
    private $companyPostalCode;

    /**
     * @var string
     *
     * @ORM\Column(name="companySupplimentTrack", type="string", length=255, nullable=true)
     */
    private $companySupplimentTrack;

    /**
     * @var string
     *
     * @ORM\Column(name="companyPostBox", type="string", length=255, nullable=true)
     */
    private $companyPostBox;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="codeA", type="string", length=255, nullable=true)
     */
    private $codeA;

    /**
     * @var string
     *
     * @ORM\Column(name="numberSiret", type="string", length=255)
     */
    private $numberSiret;

    /**
     * @var bool
     *
     * @ORM\Column(name="purchaseOrder", type="boolean", nullable=true)
     */
    private $purchaseOrder;


    /**
     * @var string
     *
     * @ORM\Column(name="ifYesNumber", type="string", length=255, nullable=true)
     */
    private $ifYesNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="billingAddress", type="string", length=255, nullable=true)
     */
    private $billingAddress;


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
     * Set titleFormation
     *
     * @param string $titleFormation
     * @return Inscription
     */
    public function setTitleFormation($titleFormation)
    {
        $this->titleFormation = $titleFormation;

        return $this;
    }

    /**
     * Get titleFormation
     *
     * @return string
     */
    public function getTitleFormation()
    {
        return $this->titleFormation;
    }

    /**
     * Set codeFormation
     *
     * @param integer $codeFormation
     * @return Inscription
     */
    public function setCodeFormation($codeFormation)
    {
        $this->codeFormation = $codeFormation;

        return $this;
    }

    /**
     * Get codeFormation
     *
     * @return integer
     */
    public function getCodeFormation()
    {
        return $this->codeFormation;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return Inscription
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Inscription
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set codePromo
     *
     * @param integer $codePromo
     * @return Inscription
     */
    public function setCodePromo($codePromo)
    {
        $this->codePromo = $codePromo;

        return $this;
    }

    /**
     * Get codePromo
     *
     * @return integer
     */
    public function getCodePromo()
    {
        return $this->codePromo;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Inscription
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set inscriptionSource
     *
     * @param string $inscriptionSource
     * @return Inscription
     */
    public function setInscriptionSource($inscriptionSource)
    {
        $this->inscriptionSource = $inscriptionSource;

        return $this;
    }

    /**
     * Get inscriptionSource
     *
     * @return string
     */
    public function getInscriptionSource()
    {
        return $this->inscriptionSource;
    }

    /**
     * Set civility
     *
     * @param string $civility
     * @return Inscription
     */
    public function setCivility($civility)
    {
        $this->civility = $civility;

        return $this;
    }

    /**
     * Get civility
     *
     * @return string
     */
    public function getCivility()
    {
        return $this->civility;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Inscription
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Inscription
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set fonction
     *
     * @param string $fonction
     * @return Inscription
     */
    public function setFonction($fonction)
    {
        $this->fonction = $fonction;

        return $this;
    }

    /**
     * Get fonction
     *
     * @return string
     */
    public function getFonction()
    {
        return $this->fonction;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Inscription
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Inscription
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set responsibleFirstName
     *
     * @param string $responsibleFirstName
     * @return Inscription
     */
    public function setResponsibleFirstName($responsibleFirstName)
    {
        $this->responsibleFirstName = $responsibleFirstName;

        return $this;
    }

    /**
     * Get responsibleFirstName
     *
     * @return string
     */
    public function getResponsibleFirstName()
    {
        return $this->responsibleFirstName;
    }

    /**
     * Set responsibleLastName
     *
     * @param string $responsibleLastName
     * @return Inscription
     */
    public function setResponsibleLastName($responsibleLastName)
    {
        $this->responsibleLastName = $responsibleLastName;

        return $this;
    }

    /**
     * Get responsibleLastName
     *
     * @return string
     */
    public function getResponsibleLastName()
    {
        return $this->responsibleLastName;
    }

    /**
     * Set responsibleEmail
     *
     * @param string $responsibleEmail
     * @return Inscription
     */
    public function setResponsibleEmail($responsibleEmail)
    {
        $this->responsibleEmail = $responsibleEmail;

        return $this;
    }

    /**
     * Get responsibleEmail
     *
     * @return string
     */
    public function getResponsibleEmail()
    {
        return $this->responsibleEmail;
    }

    /**
     * Set iResponsibleCivility
     *
     * @param string $iResponsibleCivility
     * @return Inscription
     */
    public function setIResponsibleCivility($iResponsibleCivility)
    {
        $this->iResponsibleCivility = $iResponsibleCivility;

        return $this;
    }

    /**
     * Get iResponsibleCivility
     *
     * @return string
     */
    public function getIResponsibleCivility()
    {
        return $this->iResponsibleCivility;
    }

    /**
     * Set iResponsibleFirstName
     *
     * @param string $iResponsibleFirstName
     * @return Inscription
     */
    public function setIResponsibleFirstName($iResponsibleFirstName)
    {
        $this->iResponsibleFirstName = $iResponsibleFirstName;

        return $this;
    }

    /**
     * Get iResponsibleFirstName
     *
     * @return string
     */
    public function getIResponsibleFirstName()
    {
        return $this->iResponsibleFirstName;
    }

    /**
     * Set iResponsibleLastName
     *
     * @param string $iResponsibleLastName
     * @return Inscription
     */
    public function setIResponsibleLastName($iResponsibleLastName)
    {
        $this->iResponsibleLastName = $iResponsibleLastName;

        return $this;
    }

    /**
     * Get iResponsibleLastName
     *
     * @return string
     */
    public function getIResponsibleLastName()
    {
        return $this->iResponsibleLastName;
    }

    /**
     * Set iResponsibleFonction
     *
     * @param string $iResponsibleFonction
     * @return Inscription
     */
    public function setIResponsibleFonction($iResponsibleFonction)
    {
        $this->iResponsibleFonction = $iResponsibleFonction;

        return $this;
    }

    /**
     * Get iResponsibleFonction
     *
     * @return string
     */
    public function getIResponsibleFonction()
    {
        return $this->iResponsibleFonction;
    }

    /**
     * Set iResposiblePhone
     *
     * @param string $iResposiblePhone
     * @return Inscription
     */
    public function setIResposiblePhone($iResposiblePhone)
    {
        $this->iResposiblePhone = $iResposiblePhone;

        return $this;
    }

    /**
     * Get iResposiblePhone
     *
     * @return string
     */
    public function getIResposiblePhone()
    {
        return $this->iResposiblePhone;
    }

    /**
     * Set iResponsibleEmail
     *
     * @param string $iResponsibleEmail
     * @return Inscription
     */
    public function setIResponsibleEmail($iResponsibleEmail)
    {
        $this->iResponsibleEmail = $iResponsibleEmail;

        return $this;
    }

    /**
     * Get iResponsibleEmail
     *
     * @return string
     */
    public function getIResponsibleEmail()
    {
        return $this->iResponsibleEmail;
    }

    /**
     * Set company
     *
     * @param string $company
     * @return Inscription
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set companyService
     *
     * @param string $companyService
     * @return Inscription
     */
    public function setCompanyService($companyService)
    {
        $this->companyService = $companyService;

        return $this;
    }

    /**
     * Get companyService
     *
     * @return string
     */
    public function getCompanyService()
    {
        return $this->companyService;
    }

    /**
     * Set companyAddress
     *
     * @param string $companyAddress
     * @return Inscription
     */
    public function setCompanyAddress($companyAddress)
    {
        $this->companyAddress = $companyAddress;

        return $this;
    }

    /**
     * Get companyAddress
     *
     * @return string
     */
    public function getCompanyAddress()
    {
        return $this->companyAddress;
    }

    /**
     * Set companyPostalCode
     *
     * @param integer $companyPostalCode
     * @return Inscription
     */
    public function setCompanyPostalCode($companyPostalCode)
    {
        $this->companyPostalCode = $companyPostalCode;

        return $this;
    }

    /**
     * Get companyPostalCode
     *
     * @return integer
     */
    public function getCompanyPostalCode()
    {
        return $this->companyPostalCode;
    }
    /**
     * Set companySupplimentTrack
     *
     * @param string $companySupplimentTrack
     * @return Inscription
     */
    public function setCompanySupplimentTrack($companySupplimentTrack)
    {
        $this->companySupplimentTrack = $companySupplimentTrack;

        return $this;
    }

    /**
     * Get companySupplimentTrack
     *
     * @return string
     */
    public function getCompanySupplimentTrack()
    {
        return $this->companySupplimentTrack;
    }

    /**
     * Set companyPostBox
     *
     * @param string $companyPostBox
     * @return Inscription
     */
    public function setCompanyPostBox($companyPostBox)
    {
        $this->companyPostBox = $companyPostBox;

        return $this;
    }

    /**
     * Get companyPostBox
     *
     * @return string
     */
    public function getCompanyPostBox()
    {
        return $this->companyPostBox;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Inscription
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Inscription
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set codeA
     *
     * @param string $codeA
     * @return Inscription
     */
    public function setCodeA($codeA)
    {
        $this->codeA = $codeA;

        return $this;
    }

    /**
     * Get codeA
     *
     * @return string
     */
    public function getCodeA()
    {
        return $this->codeA;
    }

    /**
     * Set numberSiret
     *
     * @param string $numberSiret
     * @return Inscription
     */
    public function setNumberSiret($numberSiret)
    {
        $this->numberSiret = $numberSiret;

        return $this;
    }

    /**
     * Get numberSiret
     *
     * @return string
     */
    public function getNumberSiret()
    {
        return $this->numberSiret;
    }

    /**
     * Set purchaseOrder
     *
     * @param boolean $purchaseOrder
     * @return Inscription
     */
    public function setPurchaseOrder($purchaseOrder)
    {
        $this->purchaseOrder = $purchaseOrder;

        return $this;
    }

    /**
     * Get purchaseOrder
     *
     * @return boolean
     */
    public function getPurchaseOrder()
    {
        return $this->purchaseOrder;
    }
    /**
     * Set ifYesNumber
     *
     * @param string $ifYesNumber
     * @return Inscription
     */
    public function setIfYesNumber($ifYesNumber)
    {
        $this->ifYesNumber = $ifYesNumber;

        return $this;
    }

    /**
     * Get ifYesNumber
     *
     * @return string
     */
    public function getIfYesNumber()
    {
        return $this->ifYesNumber;
    }

    /**
     * Set billingAddress
     *
     * @param string $billingAddress
     * @return Inscription
     */
    public function setBillingAddress($billingAddress)
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    /**
     * Get billingAddress
     *
     * @return string
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }
}
