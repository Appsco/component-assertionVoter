<?php
namespace BWC\Component\AssertionVoter;

class SimpleDecisionMaker implements DecisionMakerInterface
{
    /**
     * {@inheritDoc}
     */
    public function evaluate(array $assertions, $voters) {
        $result = [];
        foreach($voters as $voter){
            if($role = $voter->vote($assertions)){
                $result[] = $role;
            }
        }

        return array_unique($result);
    }
} 