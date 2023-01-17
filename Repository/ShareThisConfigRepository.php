<?php

namespace Plugin\ShareThis\Repository;

use Doctrine\Persistence\ManagerRegistry;
use Eccube\Repository\AbstractRepository;
use Plugin\ShareThis\Entity\ShareThisConfig;

class ShareThisConfigRepository extends AbstractRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ShareThisConfig::class);
    }

    /**
     * @param $id
     * @return ShareThisConfig
     */
    public function get($id = 1)
    {
        return $this->find($id);
    }
}