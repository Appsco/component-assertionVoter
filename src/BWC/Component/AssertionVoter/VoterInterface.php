<?php
namespace BWC\Component\AssertionVoter;

interface VoterInterface {

    function vote(array $assertions);

}