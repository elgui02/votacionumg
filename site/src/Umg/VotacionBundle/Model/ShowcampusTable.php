<?php

namespace Umg\VotacionBundle\Model;

use Brown298\DataTablesBundle\MetaData as DataTable;
use Brown298\DataTablesBundle\Model\DataTable\QueryBuilderDataTableInterface;
use Brown298\DataTablesBundle\Test\DataTable\QueryBuilderDataTable;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Templating\EngineInterface;


/**
 * Class ShowshowcampusTable
 *
 * @package Umg\VotacionBundle\Model
 *
 * @DataTable\Table(id="showcampusTable", displayLength=10)
 */
class ShowcampusTable extends QueryBuilderDataTable implements QueryBuilderDataTableInterface
{
    /**
     * @var string
     * @DataTable\Column(source="q.id", name="Código")
     * @DataTable\Format(dataFields={"id":"q.id","codigo":"carrera.Codigo"}, template="UmgVotacionBundle:Pensum:shownombre.html.twig")
     * @DataTable\DefaultSort()
     */
    public $id;
      
     /**
     * @var string
     * @DataTable\Column(source="q.carrera.Carrera", name="Carrera")
     * @DataTable\DefaultSort()
     */
    public $carrera;
    
     /**
     * @var string
     * @DataTable\Column(source="p.jornada.Jornada", name="Jornada")
     * @DataTable\DefaultSort()
     */
    public $jornada;
    /**
     * @var int
     * @DataTable\Column(source="q.Codigo", name="Acciones")
     * @DataTable\Format(dataFields={"id":"q.id"}, template="UmgVotacionBundle:Pensum:showaccionesindex.html.twig")
     */
    public $acciones;
    
    /**
     * @var bool hydrate results to doctrine objects
     */
    public $hydrateObjects = true;
    
    /**
     * getQueryBuilder
     *
     * @param Request $request
     *
     * @return null
     */
    public function getQueryBuilder(Request $request = null)
    {
        $id = $request->request->get('id');
        $userRepository = $this->container->get('doctrine.orm.entity_manager')
            ->getRepository('UmgVotacionBundle:CampusCarrera');
        $qb = $userRepository->createQueryBuilder('q')
                ->andWhere('q.Campus_id = :id')
                ->setParameter('id', $id)
            ;

        return $qb;
    }
     
}
/*

{% block body -%}
    <h1> Lista de carreras </h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Código</th>
                <th>Carrera</th>
                <th>Jornada</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        {% for carrera in entity.getCampusCarreras %}
            <tr>
                <td>{{ carrera.Codigo }}</td>
                <td>{{ carrera.Carrera }}</td>
                <td>{{ carrera.Jornada }}</td>
                <td>
                    <ul>
                        <li><a href="{{ path('campuscarrera_show', { 'id': carrera.id }) }}">ver</a></li>
                        <li><a href="{{ path('campuscarrera_edit', { 'id': carrera.id }) }}">editar</a></li>
                    </ul>
                </td>
            </tr>
        {% endfor %}
        </tbody>
    </table>
    <a href={{ path('campuscarrera_new', {'id': entity.id}) }} class="btn btn-primary">Asiganar carrera al campus</a>
    <br />
        <ul class="record_actions">
    <li>
        <a href="{{ path('campus') }}">
            Regresar a la lista
        </a>
    </li>
    <li><a href="{{ path('campus_edit', { 'id': entity.id }) }}">Editar</a></li>
</ul>
{% endblock %}

 *  */