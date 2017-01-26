<?php
namespace Simonetti\IntegradorFinanceiro\Destination;

use Doctrine\ORM\EntityRepository;

/**
 * Class RequestRepository
 * @package Simonetti\IntegradorFinanceiro\Destination
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