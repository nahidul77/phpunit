<?php

use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{
    public function testMock()
    {
        // $mailer = new Mailer;

        $mock = $this->createMock(Mailer::class);

        $mock->method('sendMessage')
            ->willReturn(true);

        $result = $mock->sendMessage('nahid@example.com', 'location description');

        $this->assertTrue($result);
    }
}
