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
 * Umg\VotacionBundle\Entity\Pensum
 *
 * @ORM\Entity()
 * @ORM\Table(name="Pensum")
 */
class Pensum
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
    protected $Anio;

    /**
     * @ORM\OneToMany(targetEntity="PensumAnio", mappedBy="pensum")
     * @ORM\JoinColumn(name="id", referencedColumnName="Pensum_id")
     */
    protected $pensumAnios;

    public function __construct()
    {
        $this->pensumAnios = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \Umg\VotacionBundle\Entity\Pensum
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
     * Set the value of Anio.
     *
     * @param integer $Anio
     * @return \Umg\VotacionBundle\Entity\Pensum
     */
    public function setAnio($Anio)
    {
        $this->Anio = $Anio;

        return $this;
    }

    /**
     * Get the value of Anio.
     *
     * @return integer
     */
    public function getAnio()
    {
        return $this->Anio;
    }

    /**
     * Add PensumAnio entity to collection (one to many).
     *
     * @param \Umg\VotacionBundle\Entity\PensumAnio $pensumAnio
     * @return \Umg\VotacionBundle\Entity\Pensum
     */
    public function addPensumAnio(PensumAnio $pensumAnio)
    {
        $this->pensumAnios[] = $pensumAnio;

        return $this;
    }

    /**
     * Remove PensumAnio entity from collection (one to many).
     *
     * @param \Umg\VotacionBundle\Entity\PensumAnio $pensumAnio
     * @return \Umg\VotacionBundle\Entity\Pensum
     */
    public function removePensumAnio(PensumAnio $pensumAnio)
    {
        $this->pensumAnios->removeElement($pensumAnio);

        return $this;
    }

    /**
     * Get PensumAnio entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPensumAnios()
    {
        return $this->pensumAnios;
    }

    public function __sleep()
    {
        return array('id', 'Anio');
    }
}