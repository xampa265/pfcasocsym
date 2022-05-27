<?php

namespace App\Repository;

use App\Entity\Asociados;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Asociados>
 *
 * @method Asociados|null find($id, $lockMode = null, $lockVersion = null)
 * @method Asociados|null findOneBy(array $criteria, array $orderBy = null)
 * @method Asociados[]    findAll()
 * @method Asociados[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AsociadosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Asociados::class);
    }

    public function add(Asociados $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Asociados $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    public function crearAdmin(){

        $asociado=new Asociados();

        $asociado->setNombre("Admin");
        $asociado->setApellidos("Admin");
        $asociado->setDni("Admin");
        $asociado->setPoblacion("Admin");
        $asociado->setProvincia("Admin");
        $asociado->setCuenta("Admin");
        $asociado->setAnyoNac("1234");

        

         $this->getEntityManager()->persist($asociado);
         $this->getEntityManager()->flush();


        return $asociado;
    }

//    /**
//     * @return Asociados[] Returns an array of Asociados objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Asociados
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
