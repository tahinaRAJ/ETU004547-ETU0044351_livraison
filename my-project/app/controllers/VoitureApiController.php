<?php

namespace app\controllers;

use flight\Engine;
use app\models\VoitureModele;
use Flight;

class VoitureApiController {
    public function getBeneficeParVehicule($vehicule_id){
        $VoitureModel = new VoitureModele(Flight::db());
        $voitures = $VoitureModel->getBeneficeParVehicule($vehicule_id);
        Flight::render('Benefice_vehicule', ['voitures' => $voitures]);
    }

    public function getDisponibles(){
        $VoitureModel = new VoitureModele(Flight::db());
        $date = Flight::request()->query->date ?? null;
        $voitures = $VoitureModel->getDisponibles($date);
        Flight::render('Voitures_Disponibles', ['voitures' => $voitures, 'date' => $date]);
    }
}