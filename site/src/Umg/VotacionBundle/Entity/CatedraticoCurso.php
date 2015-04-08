<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-03-23 20:21:18.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace Umg\VotacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Umg\VotacionBundle\Entity\CatedraticoCurso
 *
 * @ORM\Entity()
 * @ORM\Table(name="CatedraticoCurso", indexes={@ORM\Index(name="fk_CatedraticoCurso_Catedratico1_idx", columns={"Catedratico_id"}), @ORM\Index(name="fk_CatedraticoCurso_CampusCurso1_idx", columns={"CampusCurso_id"})})
 */
class CatedraticoCurso
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $Catedratico_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $CampusCurso_id;

    /**
     * @ORM\OneToMany(targetEntity="AlumnoCurso", mappedBy="catedraticoCurso")
     * @ORM\JoinColumn(name="id", referencedColumnName="CatedraticoCurso_id")
     */
    protected $alumnoCursos;

    /**
     * @ORM\ManyToOne(targetEntity="Catedratico", inversedBy="catedraticoCursos")
     * @ORM\JoinColumn(name="Catedratico_id", referencedColumnName="id")
     */
    protected $catedratico;

    /**
     * @ORM\ManyToOne(targetEntity="CarreraCurso", inversedBy="catedraticoCursos")
     * @ORM\JoinColumn(name="CampusCurso_id", referencedColumnName="id")
     */
    protected $carreraCurso;

    public function __construct()
    {
        $this->alumnoCursos = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \Umg\VotacionBundle\Entity\CatedraticoCurso
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Catedratico_id.
     *
     * @param integer $Catedratico_id
     * @return \Umg\VotacionBundle\Entity\CatedraticoCurso
     */
    public function setCatedraticoId($Catedratico_id)
    {
        $this->Catedratico_id = $Catedratico_id;

        return $this;
    }

    /**
     * Get the value of Catedratico_id.
     *
     * @return integer
     */
    public function getCatedraticoId()
    {
        return $this->Catedratico_id;
    }

    /**
     * Set the value of CampusCurso_id.
     *
     * @param integer $CampusCurso_id
     * @return \Umg\VotacionBundle\Entity\CatedraticoCurso
     */
    public function setCampusCursoId($CampusCurso_id)
    {
        $this->CampusCurso_id = $CampusCurso_id;

        return $this;
    }

    /**
     * Get the value of CampusCurso_id.
     *
     * @return integer
     */
    public function getCampusCursoId()
    {
        return $this->CampusCurso_id;
    }

    /**
     * Add AlumnoCurso entity to collection (one to many).
     *
     * @param \Umg\VotacionBundle\Entity\AlumnoCurso $alumnoCurso
     * @return \Umg\VotacionBundle\Entity\CatedraticoCurso
     */
    public function addAlumnoCurso(AlumnoCurso $alumnoCurso)
    {
        $this->alumnoCursos[] = $alumnoCurso;

        return $this;
    }

    /**
     * Remove AlumnoCurso entity from collection (one to many).
     *
     * @param \Umg\VotacionBundle\Entity\AlumnoCurso $alumnoCurso
     * @return \Umg\VotacionBundle\Entity\CatedraticoCurso
     */
    public function removeAlumnoCurso(AlumnoCurso $alumnoCurso)
    {
        $this->alumnoCursos->removeElement($alumnoCurso);

        return $this;
    }

    /**
     * Get AlumnoCurso entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAlumnoCursos()
    {
        return $this->alumnoCursos;
    }

    /**
     * Set Catedratico entity (many to one).
     *
     * @param \Umg\VotacionBundle\Entity\Catedratico $catedratico
     * @return \Umg\VotacionBundle\Entity\CatedraticoCurso
     */
    public function setCatedratico(Catedratico $catedratico = null)
    {
        $this->catedratico = $catedratico;

        return $this;
    }

    /**
     * Get Catedratico entity (many to one).
     *
     * @return \Umg\VotacionBundle\Entity\Catedratico
     */
    public function getCatedratico()
    {
        return $this->catedratico;
    }

    /**
     * Set CarreraCurso entity (many to one).
     *
     * @param \Umg\VotacionBundle\Entity\CarreraCurso $carreraCurso
     * @return \Umg\VotacionBundle\Entity\CatedraticoCurso
     */
    public function setCarreraCurso(CarreraCurso $carreraCurso = null)
    {
        $this->carreraCurso = $carreraCurso;

        return $this;
    }

    /**
     * Get CarreraCurso entity (many to one).
     *
     * @return \Umg\VotacionBundle\Entity\CarreraCurso
     */
    public function getCarreraCurso()
    {
        return $this->carreraCurso;
    }

    public function __sleep()
    {
        return array('id', 'Catedratico_id', 'CampusCurso_id');
    }
    
    public function __toString() {
        
        return $this->catedratico.', '.$this->carreraCurso;
        
    }
}