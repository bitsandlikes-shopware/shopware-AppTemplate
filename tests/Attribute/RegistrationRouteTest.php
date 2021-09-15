<?php declare(strict_types=1);

namespace App\Test\Attribute;

use App\Attribute\RegistrationRoute;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class RegistrationRouteTest extends TestCase
{
    #[RegistrationRoute('/register', name: 'shopware_app.register', methods: ['GET'])]
    public function testRegistrationRouteAttribute(): void
    {
        $reflectionClass = new ReflectionClass($this);
        $reflectionMethod = $reflectionClass->getMethod('testRegistrationRouteAttribute');

        $reflectionAttribute = $reflectionMethod->getAttributes(RegistrationRoute::class);

        static::assertEquals($reflectionAttribute[0]->getArguments(), [
            '0' => '/register',
            'name' => 'shopware_app.register',
            'methods' => [
                'GET'
            ]
        ]);
    }
}