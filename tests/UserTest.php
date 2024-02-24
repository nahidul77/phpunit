<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testReturnsFullName()
    {
        $user = new User;

        $user->first_name = "Nahidul";
        $user->surname = "Islam";

        $this->assertEquals('Nahidul Islam', $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault()
    {
        $user = new User;

        $this->assertEquals('', $user->getFullName());
    }

    /**
     * @test
     */

    public function userHasFirstName()
    {
        $user = new User;

        $user->first_name = "Nahidul";

        $this->assertEquals('Nahidul', $user->getFullName());
    }

    public function testNotificationIsSent()
    {
        $user = new User;

        $mock_mailer = $this->createMock(Mailer::class);

        $mock_mailer->expects($this->once())
            ->method('sendMessage')
            ->with($this->equalTo('nahid@app.com'), $this->equalTo('Hello'))
            ->willReturn(true);

        $user->setMailer($mock_mailer);

        $user->email = "nahid@app.com";

        $this->assertTrue($user->notify("Hello"));
    }
}
