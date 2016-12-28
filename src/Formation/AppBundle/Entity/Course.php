<?php

namespace Formation\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Formation\AppBundle\Entity\Categorie;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Course
 *
 * @ORM\Table(name="course")
 * @ORM\Entity(repositoryClass="Formation\AppBundle\Repository\CourseRepository")
 */
class Course
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="simpleDescription", type="string", length=255)
     */
    private $simpleDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="learningObjectives", type="string", length=255)
     */
    private $learningObjectives;

    /**
     * @var string
     *
     * @ORM\Column(name="businessSkills", type="string", length=255)
     */
    private $businessSkills;

    /**
     * @var string
     *
     * @ORM\Column(name="program", type="string", length=255)
     */
    private $program;

    /**
     * @var string
     *
     * @ORM\Column(name="concernedPublic", type="string", length=255)
     */
    private $concernedPublic;

    /**
     * @var string
     *
     * @ORM\Column(name="prerequisites", type="string", length=255)
     */
    private $prerequisites;

    /**
     * @var string
     *
     * @ORM\Column(name="duration", type="integer")
     */
    private $duration;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="code", type="bigint")
     */
    private $code;

    /**
     * @var int
     *
     * @ORM\Column(name="repa", type="bigint")
     */
    private $repa;

    /**
     * @var int
     *
     * @ORM\Column(name="forfaitIntra", type="bigint")
     */
    private $forfaitIntra;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumn(name="categorie_id", referencedColumnName="id")
     * 
     */
    protected $idCategorie;


    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the product brochure as a PDF file.")
     * @Assert\File(mimeTypes={ "image/png" , "image/bmp" , "image/jpeg"})
     */
    private $brochure;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", cascade={"persist"})
     */
    protected $tags;

    public function addTag(Tag $tag)
    {
        $tag->addCourse($this);
        $this->tags->add($tag);
    }

    public function removeTag(Tag $tag)
    {
        $this->tags->removeElement($tag);
    }


    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function getBrochure()
    {
        return $this->brochure;
    }

    public function setBrochure($brochure)
    {
        $this->brochure = $brochure;

        return $this;
    }


    public function getidCategorie()
    {
        return $this->idCategorie;
    }

    public function setidCategorie(Categorie $idCategorie)
    {
        $this->idCategorie = $idCategorie;
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
     * Set title
     *
     * @param string $title
     * @return Course
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set simpleDescription
     *
     * @param string $simpleDescription
     * @return Course
     */
    public function setSimpleDescription($simpleDescription)
    {
        $this->simpleDescription = $simpleDescription;

        return $this;
    }

    /**
     * Get simpleDescription
     *
     * @return string 
     */
    public function getSimpleDescription()
    {
        return $this->simpleDescription;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Course
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return Course
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
     * Set learningObjectives
     *
     * @param string $learningObjectives
     * @return Course
     */
    public function setLearningObjectives($learningObjectives)
    {
        $this->learningObjectives = $learningObjectives;

        return $this;
    }

    /**
     * Get learningObjectives
     *
     * @return string 
     */
    public function getLearningObjectives()
    {
        return $this->learningObjectives;
    }

    /**
     * Set businessSkills
     *
     * @param string $businessSkills
     * @return Course
     */
    public function setBusinessSkills($businessSkills)
    {
        $this->businessSkills = $businessSkills;

        return $this;
    }

    /**
     * Get businessSkills
     *
     * @return string 
     */
    public function getBusinessSkills()
    {
        return $this->businessSkills;
    }

    /**
     * Set program
     *
     * @param string $program
     * @return Course
     */
    public function setProgram($program)
    {
        $this->program = $program;

        return $this;
    }

    /**
     * Get program
     *
     * @return string 
     */
    public function getProgram()
    {
        return $this->program;
    }

    /**
     * Set concernedPublic
     *
     * @param string $concernedPublic
     * @return Course
     */
    public function setConcernedPublic($concernedPublic)
    {
        $this->concernedPublic = $concernedPublic;

        return $this;
    }

    /**
     * Get concernedPublic
     *
     * @return string 
     */
    public function getConcernedPublic()
    {
        return $this->concernedPublic;
    }

    /**
     * Set prerequisites
     *
     * @param string $prerequisites
     * @return Course
     */
    public function setPrerequisites($prerequisites)
    {
        $this->prerequisites = $prerequisites;

        return $this;
    }

    /**
     * Get prerequisites
     *
     * @return string 
     */
    public function getPrerequisites()
    {
        return $this->prerequisites;
    }

    /**
     * Set duration
     *
     * @param string $duration
     * @return Course
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return string 
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Course
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
     * Set code
     *
     * @param integer $code
     * @return Course
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return integer 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return int
     */
    public function getRepa()
    {
        return $this->repa;
    }

    /**
     * @param int $repa
     */
    public function setRepa($repa)
    {
        $this->repa = $repa;
    }

    /**
     * @return int
     */
    public function getForfaitIntra()
    {
        return $this->forfaitIntra;
    }

    /**
     * @param int $forfaitIntra
     */
    public function setForfaitIntra($forfaitIntra)
    {
        $this->forfaitIntra = $forfaitIntra;
    }

    
}
