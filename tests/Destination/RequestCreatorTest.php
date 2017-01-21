<?php
namespace Simonetti\IntegradorFinanceiro\Tests\Destination;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Connection AS DBALConnection;
use Simonetti\IntegradorFinanceiro\ConnectionManager;
use Simonetti\IntegradorFinanceiro\Destination\RequestCreator;
use Simonetti\IntegradorFinanceiro\Source;
use Simonetti\IntegradorFinanceiro\Destination;

/**
 * Class RequestCreatorTest
 * @package Simonetti\IntegradorFinanceiro\Tests\Destination
 */
class RequestCreatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|ConnectionManager
     */
    protected $connectionManager;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|Source\Request
     */
    protected $sourceRequest;

    public function setUp()
    {
        $this->connectionManager = $this->getMockBuilder(ConnectionManager::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->sourceRequest = $this->getMockBuilder(Source\Request::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Nenhum registro encontrado na base de dados para compor a requisição
     */
    public function testCreateMustThrowExceptionIfNotFoundData()
    {
        $requestCreator = new RequestCreator($this->connectionManager);
        $requestCreator->create($this->sourceRequest);
    }

    public function testCreateMustReturnOnlyInstanceOfDestinationRequest()
    {
        $this->connectionManager->method('getConnection')
            ->willReturn($this->getDbalConnection());

        $this->sourceRequest->method('getDestinations')
            ->willReturn(new ArrayCollection([$this->getDestination()]));

        $requestCreator = new RequestCreator($this->connectionManager);
        $requests = $requestCreator->create($this->sourceRequest);

        $this->assertContainsOnlyInstancesOf(Destination\Request::class, $requests);
    }

    public function testCreateMustReturnTwoDestinationRequests()
    {
        $this->connectionManager->method('getConnection')
            ->willReturn($this->getDbalConnection());

        $this->sourceRequest->method('getDestinations')
            ->willReturn(new ArrayCollection([$this->getDestination(), $this->getDestination()]));

        $requestCreator = new RequestCreator($this->connectionManager);
        $requests = $requestCreator->create($this->sourceRequest);

        $this->assertCount(2, $requests);
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|DBALConnection
     */
    protected function getDbalConnection()
    {
        $dbalConnection = $this->getMockBuilder(DBALConnection::class)
            ->disableOriginalConstructor()
            ->getMock();

        $dbalConnection->method('fetchAll')
            ->willReturn([
                [
                    'column1' => 'value1',
                    'column2' => 'value2',
                    'column3' => 'value3',
                ]
            ]);

        return $dbalConnection;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|Source\Destination
     */
    protected function getDestination()
    {
        return $this->getMockBuilder(Source\Destination::class)
            ->disableOriginalConstructor()
            ->getMock();
    }
}
