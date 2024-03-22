<?php
namespace App\Enums;

enum SurveyType: String
{
    case Habiletés_Comportementales   = "Habiletés Comportementales";
    case Habiletés_d_Autonomie = "Habiletés d'Autonomie";
    case Difficultés_Sensorielles  = "Difficultés - Sensorielles";
    case Habiletés_d_Attention = "Habiletés d'Attention";
    case Habiletés_d_Imitation = "Habiletés d'Imitation";
    case Habiletés_de_Communication_Réceptive = "Habiletés de Communication - Réceptive";
    case Habiletés_de_Communication_Expressive = "Habiletés de Communication - Expressive";
    case Développement_social_et_personnel_Habiletés_Sociales = "Développement social et personnel - Habiletés Sociales";
    case Habiletés_de_Motricité_Fine = "Habiletés de Motricité - Fine";
    case Habiletés_de_Motricité_Globale = "Habiletés de Motricité - Globale";
    case Français_Lecture_Écriture = "Français - Lecture - Écriture";
    case Français_Écriture = "Français - Écriture";
}