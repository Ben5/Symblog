<?php

namespace Blogger\BlogBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CommentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CommentRepository extends EntityRepository
{
    public function
    getCommentsForBlog(
        $blogId,
        $approved = true)
    {
        $queryBuilder = $this->createQueryBuilder('c')
                             ->select('c')
                             ->where('c.blog = :blog_id')
                             ->addOrderBy('c.created')
                             ->setParameter('blog_id', $blogId);

        if (!is_null($approved))
        {
            $queryBuilder->andWhere('c.approved = :approved')
                         ->setParameter('approved', $approved);
        }

        return $queryBuilder->getQuery()->getResult();
    }
}
