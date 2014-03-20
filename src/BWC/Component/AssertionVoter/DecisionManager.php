<?php
namespace BWC\Component\AssertionVoter;

class DecisionManager {

    /**
     * @var VoterInterface[]
     */
    private $_voters = [];

    /**
     * @param array $assertions
     * @return array
     */
    public function evaluate(array $assertions){
        $result = [];
        foreach($this->getVoters() as $voter){
            if($role = $voter->vote($assertions)){
                $result[] = $role;
            }
        }

        return array_unique($result);
    }

    /**
     * @return \BWC\Component\AssertionVoter\VoterInterface[]
     */
    public function getVoters()
    {
        return $this->_voters;
    }

    /**
     * @param VoterInterface $i
     * @return $this
     */
    public function addVoter(VoterInterface $i){
        $this->_voters[] = $i;

        return $this;
    }
} 