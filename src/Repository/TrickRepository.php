<?php

namespace App\Repository;

use App\Entity\Trick;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Trick|null find($id, $lockMode = null, $lockVersion = null)
 * @method Trick|null findOneBy(array $criteria, array $orderBy = null)
 * @method Trick[]    findAll()
 * @method Trick[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrickRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Trick::class);
    }

    public function findByIdWithComments($id) {
            return $this->createQueryBuilder('t')
                            ->leftJoin('t.comments', 'c') ->addSelect('c')
                            ->where('t.id = :id')->setParameter('id', $id)
                            ->getQuery()
                            ->getOneOrNullResult();
            }
    
    public function findByIdWithCommentsAndImagesAndVideos($id) {
            return $this->createQueryBuilder('t')
                            ->leftJoin('t.comments', 'c') ->addSelect('c')
                            ->leftJoin('t.videos', 'v') ->addSelect('v')
                            ->leftJoin('t.images', 'i') ->addSelect('i')
                            ->where('t.id = :id')->setParameter('id', $id)
                            ->getQuery()
                            ->getOneOrNullResult();
            }
}
