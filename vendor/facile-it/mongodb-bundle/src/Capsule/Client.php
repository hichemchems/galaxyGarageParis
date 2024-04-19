<?php

declare(strict_types=1);

namespace Facile\MongoDbBundle\Capsule;

use MongoDB\Client as MongoClient;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class Client.
 *
 * @internal
 */
final class Client extends MongoClient
{
    /** @var EventDispatcherInterface */
    private $eventDispatcher;

    /** @var string */
    private $clientName;

    /**
     * Client constructor.
     *
     * @param string $uri
     *
     * @internal param DataCollectorLoggerInterface $logger
     */
    public function __construct(
        $uri,
        array $uriOptions,
        array $driverOptions,
        string $clientName,
        EventDispatcherInterface $eventDispatcher
    ) {
        parent::__construct($uri, $uriOptions, $driverOptions);
        $this->eventDispatcher = $eventDispatcher;
        $this->clientName = $clientName;
    }

    /**
     * @inheritDoc
     */
    public function selectDatabase($databaseName, array $options = [])
    {
        $debug = $this->__debugInfo();
        $options += [
            'typeMap' => $debug['typeMap'],
        ];

        return new Database($debug['manager'], $this->clientName, $databaseName, $options, $this->eventDispatcher);
    }

    /**
     * @inheritDoc
     */
    public function selectCollection($databaseName, $collectionName, array $options = [])
    {
        $debug = $this->__debugInfo();
        $options += [
            'typeMap' => $debug['typeMap'],
        ];

        return new Collection($debug['manager'], $this->clientName, $databaseName, $collectionName, $options, $this->eventDispatcher);
    }
}
