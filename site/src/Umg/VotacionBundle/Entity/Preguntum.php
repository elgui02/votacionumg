<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-04-13 18:12:44.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace Umg\VotacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Umg\VotacionBundle\Entity\Preguntum
 *
 * @ORM\Entity()
 * @ORM\Table(name="Pregunta", indexes={@ORM\Index(name="fk_Pregunta_TipoPregunta1_idx", columns={"TipoPregunta_id"}), @ORM\Index(name="fk_Pregunta_Evaluacion1_idx", columns={"Evaluacion_id"})})
 */
class Preguntum
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
    protected $Pregunta;

    /**
     * @ORM\Column(type="integer")
     */
    protected $TipoPregunta_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $Evaluacion_id;

    /**
     * @ORM\OneToMany(targetEntity="OpcionPreguntum", mappedBy="preguntum")
     * @ORM\JoinColumn(name="id", referencedColumnName="Pregunta_id")
     */
    protected $opcionPregunta;

    /**
     * @ORM\OneToMany(targetEntity="Respuestum", mappedBy="preguntum")
     * @ORM\JoinColumn(name="id", referencedColumnName="Pregunta_id")
     */
    protected $respuesta;

    /**
     * @ORM\ManyToOne(targetEntity="TipoPreguntum", inversedBy="pregunta")
     * @ORM\JoinColumn(name="TipoPregunta_id", referencedColumnName="id")
     */
    protected $tipoPreguntum;

    /**
     * @ORM\ManyToOne(targetEntity="Evaluacion", inversedBy="pregunta")
     * @ORM\JoinColumn(name="Evaluacion_id", referencedColumnName="id")
     */
    protected $evaluacion;

    public function __construct()
    {
        $this->opcionPregunta = new ArrayCollection();
        $this->respuesta = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \Umg\VotacionBundle\Entity\Preguntum
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
     * Set the value of Pregunta.
     *
     * @param string $Pregunta
     * @return \Umg\VotacionBundle\Entity\Preguntum
     */
    public function setPregunta($Pregunta)
    {
        $this->Pregunta = $Pregunta;

        return $this;
    }

    /**
     * Get the value of Pregunta.
     *
     * @return string
     */
    public function getPregunta()
    {
        return $this->Pregunta;
    }

    /**
     * Set the value of TipoPregunta_id.
     *
     * @param integer $TipoPregunta_id
     * @return \Umg\VotacionBundle\Entity\Preguntum
     */
    public function setTipoPreguntaId($TipoPregunta_id)
    {
        $this->TipoPregunta_id = $TipoPregunta_id;

        return $this;
    }

    /**
     * Get the value of TipoPregunta_id.
     *
     * @return integer
     */
    public function getTipoPreguntaId()
    {
        return $this->TipoPregunta_id;
    }

    /**
     * Set the value of Evaluacion_id.
     *
     * @param integer $Evaluacion_id
     * @return \Umg\VotacionBundle\Entity\Preguntum
     */
    public function setEvaluacionId($Evaluacion_id)
    {
        $this->Evaluacion_id = $Evaluacion_id;

        return $this;
    }

    /**
     * Get the value of Evaluacion_id.
     *
     * @return integer
     */
    public function getEvaluacionId()
    {
        return $this->Evaluacion_id;
    }

    /**
     * Add OpcionPreguntum entity to collection (one to many).
     *
     * @param \Umg\VotacionBundle\Entity\OpcionPreguntum $opcionPreguntum
     * @return \Umg\VotacionBundle\Entity\Preguntum
     */
    public function addOpcionPreguntum(OpcionPreguntum $opcionPreguntum)
    {
        $this->opcionPregunta[] = $opcionPreguntum;

        return $this;
    }

    /**
     * Remove OpcionPreguntum entity from collection (one to many).
     *
     * @param \Umg\VotacionBundle\Entity\OpcionPreguntum $opcionPreguntum
     * @return \Umg\VotacionBundle\Entity\Preguntum
     */
    public function removeOpcionPreguntum(OpcionPreguntum $opcionPreguntum)
    {
        $this->opcionPregunta->removeElement($opcionPreguntum);

        return $this;
    }

    /**
     * Get OpcionPreguntum entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOpcionPregunta()
    {
        return $this->opcionPregunta;
    }

    /**
     * Add Respuestum entity to collection (one to many).
     *
     * @param \Umg\VotacionBundle\Entity\Respuestum $respuestum
     * @return \Umg\VotacionBundle\Entity\Preguntum
     */
    public function addRespuestum(Respuestum $respuestum)
    {
        $this->respuesta[] = $respuestum;

        return $this;
    }

    /**
     * Remove Respuestum entity from collection (one to many).
     *
     * @param \Umg\VotacionBundle\Entity\Respuestum $respuestum
     * @return \Umg\VotacionBundle\Entity\Preguntum
     */
    public function removeRespuestum(Respuestum $respuestum)
    {
        $this->respuesta->removeElement($respuestum);

        return $this;
    }

    /**
     * Get Respuestum entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRespuesta()
    {
        return $this->respuesta;
    }

    /**
     * Set TipoPreguntum entity (many to one).
     *
     * @param \Umg\VotacionBundle\Entity\TipoPreguntum $tipoPreguntum
     * @return \Umg\VotacionBundle\Entity\Preguntum
     */
    public function setTipoPreguntum(TipoPreguntum $tipoPreguntum = null)
    {
        $this->tipoPreguntum = $tipoPreguntum;

        return $this;
    }

    /**
     * Get TipoPreguntum entity (many to one).
     *
     * @return \Umg\VotacionBundle\Entity\TipoPreguntum
     */
    public function getTipoPreguntum()
    {
        return $this->tipoPreguntum;
    }

    /**
     * Set Evaluacion entity (many to one).
     *
     * @param \Umg\VotacionBundle\Entity\Evaluacion $evaluacion
     * @return \Umg\VotacionBundle\Entity\Preguntum
     */
    public function setEvaluacion(Evaluacion $evaluacion = null)
    {
        $this->evaluacion = $evaluacion;

        return $this;
    }

    /**
     * Get Evaluacion entity (many to one).
     *
     * @return \Umg\VotacionBundle\Entity\Evaluacion
     */
    public function getEvaluacion()
    {
        return $this->evaluacion;
    }

    public function __sleep()
    {
        return array('id', 'Pregunta', 'TipoPregunta_id', 'Evaluacion_id');
    }

    public function __toString()
    {
        return $this->Pregunta;
    }
}
