<?php
namespace Agricola;

	 class Semaforo {

	
	private $key = 123321; //clave única	
	private $permissions =0666;
	private $autoRelease = 1; //en caso de fallo al adquirirlo
 	private $semaforo;					

	public function __construct($recursos){
		$this->semaforo = sem_get($this->key,$recursos,$this->$permissions,$this->$autoRelease);
	}

	public function Espera(){
		sem_acquire($this->semaphore);
	}

	public function Libera(){
		sem_release($this->semaphore);
	}
	/*
	$key = 123321;
	$recursos = 1;
	$permissions =0666;
	$autoRelease = 1; //en caso de fallo al adquirirl
 						
	$semaphore = sem_get($key,$recursos,$permissions,$autoRelease);
	sem_acquire($semaphore);  //bloquea
	//seccion critica
	sem_release($semaphore); //libera
	*/
}