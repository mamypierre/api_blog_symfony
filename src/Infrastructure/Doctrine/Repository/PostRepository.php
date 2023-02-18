<?php

namespace App\Infrastructure\Doctrine\Repository;

use App\Domain\Contract\Repository\PostRepositoryInterface;
use App\Infrastructure\Doctrine\Entity\Image;
use App\Infrastructure\Doctrine\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Post>
 *
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository implements PostRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    /**
     * @return array|PostRepositoryInterface[]
     * @todo buid with doctrine
     */
    public function getLastAdded(): array
    {
        $qb = $this->createQueryBuilder('post');
        $query = $qb
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
        ;

        return $query->getResult();
//        ;
        // @todo get this by data base
        $image = new Image();
        $image->setTitle('tilte image');
        $image->setType('type');
        $image->setDimension('dimension');
        //post
        $postPreview = new Post();
        $postPreview->setTitle('tilte post');
        $postPreview->setShortDescription("shortDescription post");
        $postPreview->addImage($image);

        return [$postPreview];
    }

    public function save(Post $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Post $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Test[] Returns an array of Test objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Test
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}