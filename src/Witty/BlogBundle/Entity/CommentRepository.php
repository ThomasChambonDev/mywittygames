<?php

namespace Witty\BlogBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CommentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CommentRepository extends EntityRepository
{    
	public function findAllOrderedByCreationDate($postId)
    {
        return $this->getEntityManager()
            ->createQuery('SELECT c FROM WittyBlogBundle:Comment c WHERE c.post = '.$postId.' ORDER BY c.creationDate DESC')
            ->getResult();
    }
}
