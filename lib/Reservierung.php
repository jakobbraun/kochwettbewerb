<?php
use Doctrine\Common\Collections\Criteria;

/**
 * @Entity @Table(name="reservierungen")
 **/
class Reservierung
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;
	
    /** @Column(type="string") **/
    protected $email;

    /** @Column(type="integer") **/
    protected $number;
    
   // /** @Column(type="Date") **/
   // protected $date;
    
    function __construct($email, $number) {
        $this->email = $email;
        $this->number = $number;
    }
}


 
