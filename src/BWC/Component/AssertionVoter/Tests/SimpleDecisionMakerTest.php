<?php
namespace BWC\Component\AssertionVoter\Tests;


use BWC\Component\AssertionVoter\SimpleDecisionMaker;

class DecisionManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function evaluateShouldReturnArray()
    {
        $self = new SimpleDecisionMaker();
        $voter = $this->createVoterInterfaceMock();
        $voter
            ->expects($this->any())
            ->method('vote')
            ->will($this->returnValue('ROLE_ADMIN'));

        $result = $self->evaluate(array(), [$voter]);
        $this->assertInternalType('array', $result);
        $this->assertContains('ROLE_ADMIN', $result);
    }

    /**
     * @test
     */
    public function evaluateShouldReturnEmptyArray(){
        $self = new SimpleDecisionMaker();
        $voter = $this->createVoterInterfaceMock();
        $voter
            ->expects($this->any())
            ->method('vote')
            ->will($this->returnValue(null));

        $result = $self->evaluate(array(), [$voter]);
        $this->assertInternalType('array', $result);
        $this->assertEmpty($result);
    }

    public function createVoterInterfaceMock(){
        return $this->getMockBuilder('BWC\Component\AssertionVoter\VoterInterface')
            ->getMock();
    }
}