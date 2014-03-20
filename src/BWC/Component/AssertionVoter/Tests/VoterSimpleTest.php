<?php
namespace BWC\Component\AssertionVoter\Tests;

use BWC\Component\AssertionVoter\VoterSimple;

class VoterSimpleTest extends \PHPUnit_Framework_TestCase{

    /**
     * @test
     */
    public function shouldBeConstructedWithArguments(){
        $this->selfMock('issuer', 'attribute', 22, 'role');
    }

    public function selfMock($issuer, $attribute, $value, $role){
        return $this->getMockBuilder('BWC\Component\AssertionVoter\VoterSimple')
            ->setMethods(array('__construct'))
            ->setConstructorArgs(array($issuer, $attribute, $value, $role))
            ->getMock();
    }

    /**
     * @test
     */
    public function shouldReturnNullAfterVoting(){
        $selfMock = $this->selfMock('issuer', 'attribute', 22, 'role');
        $this->assertNull($selfMock->vote($this->assertions()));
    }

    /**
     * @test
     */
    public function shouldReturnRoleStringAfterVoting(){
        $selfMock = $this->selfMock('appsco', 'guid', '1234567890', 'role');
        $result = $selfMock->vote($this->assertions());
        $this->assertInternalType('string', $result);
        $this->assertEquals('role', $result);
    }

    public function assertions(){
        return [
            'appsco' => [
                'guid'      => '1234567890',
                'email'     => 'info@appsco.com',
                'username'  => 'info@appsco.com',
                'name'      => 'John Doe'
            ],
            'mnet' => [
                'userId'        => '22',
                'club_owner'    => false,
                'club_id'       => 13,
                'first_name'    => 'John',
                'last_name'     => 'Doe'
            ]
        ];
    }
} 