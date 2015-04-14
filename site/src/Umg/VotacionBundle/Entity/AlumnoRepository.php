<?php
// src/AppBundle/Entity/ProductRepository.php
namespace Umg\VotacionBundle\Entity;

use Doctrine\ORM\EntityRepository;

class AlumnoRepository extends EntityRepository
{
    public function findEvaluaciones($user)
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('e')
            ->from('UmgVotacionBundle:Evaluacion', 'e')
            ->innerJoin('e.campusCarrera','c')
            ->innerJoin('c.carreraCursos','cc')
            ->innerJoin('cc.alumnoCursos','ac')
            ->innerJoin('ac.alumno','a')
            ->groupBy('e.id')
            ->where('a.Carne = :codigo')
            ->andWhere('e.Activa = true')
            ->andWhere('e.FechaHora >= :now')
            ->andWhere('e.FechaHoraFinal < :now')
            ->setParameter('codigo', $user)
            ->setParameter('now', new \DateTime('now'))
            ->getQuery()
            ->getResult()
            ;
    }
}