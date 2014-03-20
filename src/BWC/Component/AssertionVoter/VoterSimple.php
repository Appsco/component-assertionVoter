<?php
namespace BWC\Component\AssertionVoter;

class VoterSimple implements VoterInterface{

    /**
     * @var string
     */
    private $_issuer;

    /**
     * @var string
     */
    private $_attribute;

    /**
     * @var string
     */
    private $_value;

    /**
     * @var string
     */
    private $_role;

    function __construct($issuer, $attribute, $value, $role)
    {
        $this->_issuer = $issuer;
        $this->_attribute = $attribute;
        $this->_value = $value;
        $this->_role = $role;
    }


    function vote(array $assertions)
    {
        foreach($assertions as $issuer => $attributes){
            foreach($attributes as $name => $value){
                if(
                    $this->getIssuer() == $issuer
                    && $this->getAttribute() == $name
                    && $this->getValue() == $value
                ){
                  return $this->getRole();
                }
            }
        }
        return null;
    }

    /**
     * @return mixed
     */
    public function getAttribute()
    {
        return $this->_attribute;
    }

    /**
     * @return mixed
     */
    public function getIssuer()
    {
        return $this->_issuer;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->_role;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->_value;
    }

} 