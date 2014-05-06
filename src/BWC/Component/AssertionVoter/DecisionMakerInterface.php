<?php

namespace BWC\Component\AssertionVoter;

interface DecisionMakerInterface
{
    /**
     * @param array $assertions
     * @param \Traversable|VoterInterface[] $voters
     *
     * @return array
     */
    public function evaluate(array $assertions, $voters);
}