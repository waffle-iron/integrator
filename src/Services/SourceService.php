<?php
namespace Simonetti\IntegradorFinanceiro\Services;

use Simonetti\IntegradorFinanceiro\Source\Source;
use Simonetti\IntegradorFinanceiro\Source\SourceRepository;

/**
 * Class SourceService
 * @package Simonetti\IntegradorFinanceiro\Services
 */
class SourceService
{
    /**
     * @var SourceRepository Repository class for Source
     */
    protected $sourceRepository;

    /**
     * SourceService constructor.
     * @param SourceRepository $sourceRepository
     */
    public function __construct(SourceRepository $sourceRepository)
    {
        $this->sourceRepository = $sourceRepository;
    }

    /**
     * Method responsible for searching origin by identifier
     * @param string $identifier
     * @return Source
     */
    public function findByIdentifier(string $identifier): Source
    {
        return $this->sourceRepository->findOneBy(['identifier' => $identifier]);
    }
}