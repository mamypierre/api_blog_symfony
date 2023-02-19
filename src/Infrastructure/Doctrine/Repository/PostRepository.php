<?php

namespace App\Infrastructure\Doctrine\Repository;

use App\Domain\Contract\Entity\Post\PostInterface;
use App\Domain\Contract\Repository\PostRepositoryInterface;
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
    public function getLastAdded(?int $limit = null): array
    {
        $limit = ($limit && $limit > 0) ? $limit : self::LIMIT;
        $qb = $this->createQueryBuilder('post');
        $query = $qb
            ->distinct()
            ->leftJoin('post.images', 'images')
            ->orderBy('post.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery();
        return $query->getResult();
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

    public function findById(int $postId): ?PostInterface
    {
        return $this->find($postId);
    }
}