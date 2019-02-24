<?php

namespace App\Repository;

use App\Entity\Article;
use App\Entity\Tag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Article::class);
    }

    public function findAllOrderByDateCreated(): array
    {
        $qb = $this->createQueryBuilder('a')
            ->orderBy('a.createdAt', 'DESC')
            ->getQuery();

        return $qb->execute();
    }

    public function findByTagOrderByDateCreated(Tag $tag): array
    {
        $qb = $this->createQueryBuilder('a')
            ->join('a.tags', 't')
            ->andWhere('t.id = :tag')
            ->setParameter('tag', $tag->getId())
            ->orderBy('a.createdAt', 'DESC')
            ->getQuery();

        return $qb->execute();
    }

    /**
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findNextByDateCreated(Article $article)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.createdAt > :article_created')
            ->setParameter('article_created', $article->getCreatedAt())
            ->orderBy('a.createdAt', 'ASC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findPreviousByDateCreated(Article $article)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.createdAt < :article_created')
            ->setParameter('article_created', $article->getCreatedAt())
            ->orderBy('a.createdAt', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
