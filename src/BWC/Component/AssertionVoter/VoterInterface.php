<?php
namespace BWC\Component\AssertionVoter;

interface VoterInterface {

    /**
     * @param array $assertions
     * @return string|null
     */
    function vote(array $assertions);

}