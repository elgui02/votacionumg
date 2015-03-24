<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-03-23 20:21:18.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace Umg\VotacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Umg\VotacionBundle\Entity\Respuestum
 *
 * @ORM\Entity()
 * @ORM\Table(name="Respuesta", indexes={@ORM\Index(name="fk_Respuesta_Pregunta1_idx", columns={"Pregunta_id"}), @ORM\Index(name="fk_Respuesta_AlumnoCurso1_idx", columns={"AlumnoCurso_id"}), @ORM\Index(name="fk_Respuesta_Catedratico1_idx", columns={"Catedratico_id"})})
 */
class Respuestum
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     */
    protected $Respuesta;

    /**
     * @ORM\Column(type="integer")
     */
    protected $Pregunta_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $AlumnoCurso_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $Catedratico_id;

    /**
     * @ORM\ManyToOne(targetEntity="Preguntum", inversedBy="respuesta")
     * @ORM\JoinColumn(name="Pregunta_id", referencedColumnName="id")
     */
    protected $preguntum;

    /**
     * @ORM\ManyToOne(targetEntity="AlumnoCurso", inversedBy="respuesta")
     * @ORM\JoinColumn(name="AlumnoCurso_id", referencedColumnName="id")
     */
    protected $alumnoCurso;

    /**
     * @ORM\ManyToOne(targetEntity="Catedratico", inversedBy="respuesta")
     * @ORM\JoinColumn(name="Catedratico_id", referencedColumnName="id")
     */
    protected $catedratico;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \Umg\VotacionBundle\Entity\Respuestum
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
     * Set the value of Respuesta.
     *
     * @param string $Respuesta
     * @return \Umg\VotacionBundle\Entity\Respuestum
     */
    public function setRespuesta($Respuesta)
    {
        $this->Respuesta = $Respuesta;

        return $this;
    }

    /**
     * Get the value of Respuesta.
     *
     * @return string
     */
    public function getRespuesta()
    {
        return $this->Respuesta;
    }

    /**
     * Set the value of Pregunta_id.
     *
     * @param integer $Pregunta_id
     * @return \Umg\VotacionBundle\Entity\Respuestum
     */
    public function setPreguntaId($Pregunta_id)
    {
        $this->Pregunta_id = $Pregunta_id;

        return $this;
    }

    /**
     * Get the value of Pregunta_id.
     *
     * @return integer
     */
    public function getPreguntaId()
    {
        return $this->Pregunta_id;
    }

    /**
     * Set the value of AlumnoCurso_id.
     *
     * @param integer $AlumnoCurso_id
     * @return \Umg\VotacionBundle\Entity\Respuestum
     */
    public function setAlumnoCursoId($AlumnoCurso_id)
    {
        $this->AlumnoCurso_id = $AlumnoCurso_id;

        return $this;
    }

    /**
     * Get the value of AlumnoCurso_id.
     *
     * @return integer
     */
    public function getAlumnoCursoId()
    {
        return $this->AlumnoCurso_id;
    }

    /**
     * Set the value of Catedratico_id.
     *
     * @param integer $Catedratico_id
     * @return \Umg\VotacionBundle\Entity\Respuestum
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
     * Set Preguntum entity (many to one).
     *
     * @param \Umg\VotacionBundle\Entity\Preguntum $preguntum
     * @return \Umg\VotacionBundle\Entity\Respuestum
     */
    public function setPreguntum(Preguntum $preguntum = null)
    {
        $this->preguntum = $preguntum;

        return $this;
    }

    /**
     * Get Preguntum entity (many to one).
     *
     * @return \Umg\VotacionBundle\Entity\Preguntum
     */
    public function getPreguntum()
    {
        return $this->preguntum;
    }

    /**
     * Set AlumnoCurso entity (many to one).
     *
     * @param \Umg\VotacionBundle\Entity\AlumnoCurso $alumnoCurso
     * @return \Umg\VotacionBundle\Entity\Respuestum
     */
    public function setAlumnoCurso(AlumnoCurso $alumnoCurso = null)
    {
        $this->alumnoCurso = $alumnoCurso;

        return $this;
    }

    /**
     * Get AlumnoCurso entity (many to one).
     *
     * @return \Umg\VotacionBundle\Entity\AlumnoCurso
     */
    public function getAlumnoCurso()
    {
        return $this->alumnoCurso;
    }

    /**
     * Set Catedratico entity (many to one).
     *
     * @param \Umg\VotacionBundle\Entity\Catedratico $catedratico
     * @return \Umg\VotacionBundle\Entity\Respuestum
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

    public function __sleep()
    {
        return array('id', 'Respuesta', 'Pregunta_id', 'AlumnoCurso_id', 'Catedratico_id');
    }
}