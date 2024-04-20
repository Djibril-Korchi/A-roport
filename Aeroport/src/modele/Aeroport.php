<?php

namespace modele;

class Aeroport{
    private $id_aeroport;
    private $libelle;

    /**
     * @return mixed
     */
    public function getIdAeroport()
    {
        return $this->id_aeroport;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
    
}