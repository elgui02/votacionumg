<?php
namespace Umg\VotacionBundle\Model;

use Brown298\DataTablesBundle\MetaData as DataTable;
use Brown298\DataTablesBundle\Model\DataTable\QueryBuilderDataTableInterface;
use Brown298\DataTablesBundle\Test\DataTable\QueryBuilderDataTable;
use Symfony\Component\HttpFoundation\Request;


/**
 * Class AnnotationTable
 *
 * @package Umg\VotacionBundle\Model
 *
 * @DataTable\Table(id="CarreraTable")
 */
class carreraTable extends QueryBuilderDataTable implements QueryBuilderDataTableInterface
{
    /**
     * @var int
     * @DataTable\Column(source="carrera.id", name="Id")
     */
    public $id;

    /**
     * @var string
     * @DataTable\Column(source="carrera.Carrera", name="Carrera")
     * @DataTable\DefaultSort()
     */
    public $Carrera;

    /**
     * getQueryBuilder
     *
     * @param Request $request
     *
     * @return null
     */
    public function getQueryBuilder(Request $request = null)
    {
        $userRepository = $this->container->get('doctrine.orm.entity_manager')
            ->getRepository('Umg\Votacion\Entity\Carrera');
        $qb = $userRepository->createQueryBuilder('faq')
            ->innerJoin('carrera.createdBy', 'Carrera')
            ->andWhere('carrera.Carrera = false');

        return $qb;
    }
}