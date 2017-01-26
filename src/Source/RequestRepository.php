<?php
namespace Simonetti\IntegradorFinanceiro\Source;

use Doctrine\ORM\EntityRepository;

/**
 * Class RequestRepository
 * @package Simonetti\IntegradorFinanceiro\Source
 */
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