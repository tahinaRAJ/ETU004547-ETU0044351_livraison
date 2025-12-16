<?php
class FormulaireController
{
    public function afficherFormulaire()
    {
        
        // Charger les listes (colis, livreurs, véhicules, zones)
        // Afficher la vue du formulaire
    }

    public function creerLivraison()
    {
        // Récupérer $_POST
        // Valider
        // Insérer via LivraisonModele et AffectationModele
        // Rediriger ou afficher message
    }

    public function changerStatut()
    {
        // Récupérer l’ID et le nouveau statut
        // Mettre à jour via LivraisonModele
    }
}