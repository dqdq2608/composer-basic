<?php

namespace Test;

use PHPUnit\Framework\TestCase;

abstract class BaseTestCase extends TestCase {
    protected function setUp(): void{
        parent::setUp();
    }
}
