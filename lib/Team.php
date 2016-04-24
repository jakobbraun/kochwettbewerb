<?php
use Doctrine\Common\Collections\Criteria;

/**
 * @Entity @Table(name="teams")
 **/
class Team
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;
	
    /** @Column(type="string") **/
    protected $email;
    
    /** @Column(type="boolean") **/
    protected $hasTeamMember;
    
   // /** @Column(type="Date") **/
   // protected $date;
    
    function __construct($email,$hasTeamMember) {
        $this->email = $email;
        $this->hasTeamMember = $hasTeamMember;
    }
}


 
