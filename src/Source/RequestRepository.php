<?php
namespace Simonetti\IntegradorFinanceiro\Source;

use Doctrine\ORM\EntityRepository;

class RequestRepository extends EntityRepository
{
    /**
     * @param Request $request
     * @return void
     */
    public function save(Request $request): void
    {
        $this->_em->persist($request);
        $this->_em->flush();
    }
}