<?php

namespace App\Repository;

use App\Entity\Guitar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Guitar|null find($id, $lockMode = null, $lockVersion = null)
 * @method Guitar|null findOneBy(array $criteria, array $orderBy = null)
 * @method Guitar[]    findAll()
 * @method Guitar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GuitarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Guitar::class);
    }

    public function myFindAll() {
        return $this->createQueryBuilder('g')
            ->getQuery()
            ->getResult();

       ## $queryBuilder = $this->createQueryBuilder('g');
       ## #// Méthode équivalente, mais plus longue :
        #$queryBuilder = $this->_em->createQueryBuilder()
       #     ->select('g')
       #     ->from($this->_entityName, 'g');
        #// Dans un repository, $this->_entityName est le namespace de l'entité gérée
        #// Ici, il vaut donc App\Entity\Guitar
        #// On a fini de construire notre requête
       # // On récupère la Query à partir du QueryBuilder
       ## $query = $queryBuilder->getQuery();
       ## // On récupère les résultats à partir de la Query
       ## $resultats = $query->getResult();
       ## // On retourne ces résultats
       ## return $resultats;
    }

    public function getAll() {
        $qb = $this->createQueryBuilder('a')
            ->leftJoin('a.model', 'm')->addSelect('m')
            ->leftJoin('a.category', 'c');
        return $qb->getQuery()->getResult();
    }

    public function getElec() {
        $qb = $this->createQueryBuilder('a')
            ->where('a.category = 1');
        return $qb->getQuery()->getResult();
    }

    public function getAcoust() {
        $qb = $this->createQueryBuilder('a')
            ->where('a.category = 2');
        return $qb->getQuery()->getResult();
    }

    public function getBass() {
        $qb = $this->createQueryBuilder('a')
            ->where('a.category = 3');
        return $qb->getQuery()->getResult();
    }

    // /**
    //  * @return Guitar[] Returns an array of Guitar objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Guitar
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
