<?php

class UserTest extends \PHPUnit\Framework\TestCase {
    protected $user;
    public function setUp(){
        $this->user = new \App\Models\User; 
        $this->user->setFirstName('Billy  ');
        $this->user->setLastName(' Garrett ');
        $this->user->setEmail('tyler@gmail.com');
    }

    public function testThatWeCanGetTheFirstName(){
        $this->assertEquals($this->user->getFirstName(), 'Billy');
    }

    public function testThatWeCanGetTheLastName(){
        $this->assertEquals($this->user->getLastName(), 'Garrett');
    }

    public function testFullNameIsReturned() {
        $this->assertEquals($this->user->getFullName(), 'Billy Garrett');
    }

    public function testFirstAndLastNameAreTrimmed() {
        $this->assertEquals($this->user->getFirstName(), 'Billy');
        $this->assertEquals($this->user->getLastName(), 'Garrett');
    }

    public function testEmailAddressCanBeSent() {
        $this->assertEquals($this->user->getEmail(), 'tyler@gmail.com');
    }

    public function testEmailVariableContainCorrectValues() {
        $emailVariables = $this->user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);
        $this->assertEquals($emailVariables['full_name'], 'Billy Garrett');
        $this->assertEquals($emailVariables['email'], 'tyler@gmail.com');
    }
}