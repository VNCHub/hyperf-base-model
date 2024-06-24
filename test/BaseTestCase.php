<?php

namespace HyperfTest;
use App\Model\Product;
use Hyperf\Context\ApplicationContext;
use Hyperf\Contract\ConfigInterface;
use Hyperf\Contract\StdoutLoggerInterface;
use PHPUnit\Framework\TestCase;
use Psr\Log\LogLevel;

abstract class BaseTestCase extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $container = ApplicationContext::getContainer();
        $config = $container->get(ConfigInterface::class);
        $config->set(StdoutLoggerInterface::class . '.log_level', [
            LogLevel::ALERT,
            LogLevel::CRITICAL,
            LogLevel::EMERGENCY,
            LogLevel::ERROR,
            LogLevel::INFO,
            LogLevel::NOTICE,
            LogLevel::WARNING
        ]);
    }

    protected function tearDown(): void
    {
        $container = ApplicationContext::getContainer();
        $config = $container->get(ConfigInterface::class);
        $config->set(StdoutLoggerInterface::class . '.log_level', [
            LogLevel::ALERT,
            LogLevel::CRITICAL,
            LogLevel::DEBUG,
            LogLevel::EMERGENCY,
            LogLevel::ERROR,
            LogLevel::INFO,
            LogLevel::NOTICE,
            LogLevel::WARNING
        ]);
        parent::tearDown();
    }

    protected function createTestProduct(): int
    {
        $product = $this->createEntity(Product::class, [
            'name' => 'Product Test',
            'description' => 'Product Test Description'
        ]);
        return $product->id;
    }

    protected function createEntity(string $class, array $attributes)
    {
        $entity = new $class($attributes);
        $entity->save();
        return $entity;
    }
}
