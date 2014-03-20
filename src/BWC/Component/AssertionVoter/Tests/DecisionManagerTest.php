<?php
namespace BWC\Component\AssertionVoter\Tests;


use BWC\Component\AssertionVoter\DecisionManager;

class DecisionManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function evaluateShouldReturnArray()
    {
        $self = new DecisionManager();
        $voter = $this->createVoterInterfaceMock();
        $voter
            ->expects($this->any())
            ->method('vote')
            ->will($this->returnValue('ROLE_ADMIN'));
        $self->addVoter($voter);

        $result = $self->evaluate(array());
        $this->assertInternalType('array', $result);
        $this->assertContains('ROLE_ADMIN', $result);
    }

    /**
     * @test
     */
    public function evaluateShouldReturnEmptyArray(){
        $self = new DecisionManager();
        $voter = $this->createVoterInterfaceMock();
        $voter
            ->expects($this->any())
            ->method('vote')
            ->will($this->returnValue(null));
        $self->addVoter($voter);

        $result = $self->evaluate(array());
        $this->assertInternalType('array', $result);
        $this->assertEmpty($result);
    }

    public function createVoterInterfaceMock(){
        return $this->getMockBuilder('BWC\Component\AssertionVoter\VoterInterface')
            ->getMock();
    }
}