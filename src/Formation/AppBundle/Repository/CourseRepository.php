<?php

namespace Formation\AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CourseRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CourseRepository extends EntityRepository
{
    public function findCoursesByParametres($data)

    {

        $query = $this->createQueryBuilder('a');

        $query->where($query->expr()->like('a.title', ':title'))
            
            ->setParameters(array(

                'title' => $data['title']
            ));
        return $query->getQuery()->getResult();

    }
}