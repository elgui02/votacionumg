<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-04-11 09:41:27.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace Umg\VotacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Umg\VotacionBundle\Entity\CampusCarrera
 *
 * @ORM\Entity()
 * @ORM\Table(name="CampusCarrera", indexes={@ORM\Index(name="fk_CampusCarrera_Carrera1_idx", columns={"Carrera_id"}), @ORM\Index(name="fk_CampusCarrera_Campus1_idx", columns={"Campus_id"}), @ORM\Index(name="fk_CampusCarrera_Jornada1_idx", columns={"Jornada_id"})})
 */
class CampusCarrera
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $Codigo;

    /**
     * @ORM\Column(type="integer")
     */
    protected $Carrera_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $Campus_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $Jornada_id;

    /**
     * @ORM\OneToMany(targetEntity="CarreraCurso", mappedBy="campusCarrera")
     * @ORM\JoinColumn(name="id", referencedColumnName="CampusCarrera_id")
     */
    protected $carreraCursos;

    /**
     * @ORM\OneToMany(targetEntity="Evaluacion", mappedBy="campusCarrera")
     * @ORM\JoinColumn(name="id", referencedColumnName="CampusCarrera_id")
     */
    protected $evaluacions;

    /**
     * @ORM\ManyToOne(targetEntity="Carrera", inversedBy="campusCarreras")
     * @ORM\JoinColumn(name="Carrera_id", referencedColumnName="id")
     */
    protected $carrera;

    /**
     * @ORM\ManyToOne(targetEntity="Campus", inversedBy="campusCarreras")
     * @ORM\JoinColumn(name="Campus_id", referencedColumnName="id")
     */
    protected $campus;

    /**
     * @ORM\ManyToOne(targetEntity="Jornada", inversedBy="campusCarreras")
     * @ORM\JoinColumn(name="Jornada_id", referencedColumnName="id")
     */
    protected $jornada;

    public function __construct()
    {
        $this->carreraCursos = new ArrayCollection();
        $this->evaluacions = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \Umg\VotacionBundle\Entity\CampusCarrera
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
     * Set the value of Codigo.
     *
     * @param string $Codigo
     * @return \Umg\VotacionBundle\Entity\CampusCarrera
     */
    public function setCodigo($Codigo)
    {
        $this->Codigo = $Codigo;

        return $this;
    }

    /**
     * Get the value of Codigo.
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->Codigo;
    }

    /**
     * Set the value of Carrera_id.
     *
     * @param integer $Carrera_id
     * @return \Umg\VotacionBundle\Entity\CampusCarrera
     */
    public function setCarreraId($Carrera_id)
    {
        $this->Carrera_id = $Carrera_id;

        return $this;
    }

    /**
     * Get the value of Carrera_id.
     *
     * @return integer
     */
    public function getCarreraId()
    {
        return $this->Carrera_id;
    }

    /**
     * Set the value of Campus_id.
     *
     * @param integer $Campus_id
     * @return \Umg\VotacionBundle\Entity\CampusCarrera
     */
    public function setCampusId($Campus_id)
    {
        $this->Campus_id = $Campus_id;

        return $this;
    }

    /**
     * Get the value of Campus_id.
     *
     * @return integer
     */
    public function getCampusId()
    {
        return $this->Campus_id;
    }

    /**
     * Set the value of Jornada_id.
     *
     * @param integer $Jornada_id
     * @return \Umg\VotacionBundle\Entity\CampusCarrera
     */
    public function setJornadaId($Jornada_id)
    {
        $this->Jornada_id = $Jornada_id;

        return $this;
    }

    /**
     * Get the value of Jornada_id.
     *
     * @return integer
     */
    public function getJornadaId()
    {
        return $this->Jornada_id;
    }

    /**
     * Add CarreraCurso entity to collection (one to many).
     *
     * @param \Umg\VotacionBundle\Entity\CarreraCurso $carreraCurso
     * @return \Umg\VotacionBundle\Entity\CampusCarrera
     */
    public function addCarreraCurso(CarreraCurso $carreraCurso)
    {
        $this->carreraCursos[] = $carreraCurso;

        return $this;
    }

    /**
     * Remove CarreraCurso entity from collection (one to many).
     *
     * @param \Umg\VotacionBundle\Entity\CarreraCurso $carreraCurso
     * @return \Umg\VotacionBundle\Entity\CampusCarrera
     */
    public function removeCarreraCurso(CarreraCurso $carreraCurso)
    {
        $this->carreraCursos->removeElement($carreraCurso);

        return $this;
    }

    /**
     * Get CarreraCurso entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCarreraCursos()
    {
        return $this->carreraCursos;
    }

    /**
     * Add Evaluacion entity to collection (one to many).
     *
     * @param \Umg\VotacionBundle\Entity\Evaluacion $evaluacion
     * @return \Umg\VotacionBundle\Entity\CampusCarrera
     */
    public function addEvaluacion(Evaluacion $evaluacion)
    {
        $this->evaluacions[] = $evaluacion;

        return $this;
    }

    /**
     * Remove Evaluacion entity from collection (one to many).
     *
     * @param \Umg\VotacionBundle\Entity\Evaluacion $evaluacion
     * @return \Umg\VotacionBundle\Entity\CampusCarrera
     */
    public function removeEvaluacion(Evaluacion $evaluacion)
    {
        $this->evaluacions->removeElement($evaluacion);

        return $this;
    }

    /**
     * Get Evaluacion entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvaluacions()
    {
        return $this->evaluacions;
    }

    /**
     * Set Carrera entity (many to one).
     *
     * @param \Umg\VotacionBundle\Entity\Carrera $carrera
     * @return \Umg\VotacionBundle\Entity\CampusCarrera
     */
    public function setCarrera(Carrera $carrera = null)
    {
        $this->carrera = $carrera;

        return $this;
    }

    /**
     * Get Carrera entity (many to one).
     *
     * @return \Umg\VotacionBundle\Entity\Carrera
     */
    public function getCarrera()
    {
        return $this->carrera;
    }

    /**
     * Set Campus entity (many to one).
     *
     * @param \Umg\VotacionBundle\Entity\Campus $campus
     * @return \Umg\VotacionBundle\Entity\CampusCarrera
     */
    public function setCampus(Campus $campus = null)
    {
        $this->campus = $campus;

        return $this;
    }

    /**
     * Get Campus entity (many to one).
     *
     * @return \Umg\VotacionBundle\Entity\Campus
     */
    public function getCampus()
    {
        return $this->campus;
    }

    /**
     * Set Jornada entity (many to one).
     *
     * @param \Umg\VotacionBundle\Entity\Jornada $jornada
     * @return \Umg\VotacionBundle\Entity\CampusCarrera
     */
    public function setJornada(Jornada $jornada = null)
    {
        $this->jornada = $jornada;

        return $this;
    }

    /**
     * Get Jornada entity (many to one).
     *
     * @return \Umg\VotacionBundle\Entity\Jornada
     */
    public function getJornada()
    {
        return $this->jornada;
    }

    public function __sleep()
    {
        return array('id', 'Codigo', 'Carrera_id', 'Campus_id', 'Jornada_id');
    }

    public function __toString()
    {
        return $this->Codigo;
    }
}
