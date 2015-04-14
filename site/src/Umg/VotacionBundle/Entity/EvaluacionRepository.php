<?php
// src/AppBundle/Entity/ProductRepository.php
namespace Umg\VotacionBundle\Entity;

use Doctrine\ORM\EntityRepository;

class EvaluacionRepository extends EntityRepository
{
    public function findCarreraCoordinador()
    {
        $user = '8511';
        return $this->getEntityManager()
        ->createQueryBuilder()
        ->select('c')
        ->from('UmgVotacionBundle:CampusCarrera', 'c')
        ->innerJoin('c.catedratico','ca')
        ->where('ca.Codigo = :codigo')
        ->setParameter('codigo', $user);
    }
}
