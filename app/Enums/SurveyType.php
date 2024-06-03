<?php
namespace App\Enums;

enum SurveyType: String
{
    case Habiletés_Comportementales   = "Habiletés comportementales";
    case Habiletés_d_Autonomie = "Habiletés d'autonomie";
    case Difficultés_Sensorielles  = "Difficultés sensorielles";
    case Habiletés_d_Attention = "Habiletés d'attention";
    case Habiletés_d_Imitation = "Habiletés d'imitation";
    case Habiletés_de_Communication_Réceptive = "Habiletés de communication-receptive";
    case Habiletés_de_Communication_Expressive = "Habiletés de communication-expressive";
    case Habiletés_cognitives = "Habiletés cognitives";
    case Habileté_academiques_sciences = "Habiletés académiques-sciences";
    case Habileté_academiques_lecture_pre_écriture = "Habiletés académiques-lecture-pré-écriture";
    case Habileté_sociales_développement_social_et_personnel = "Habiletés sociales-développement social et personnel";
    case Habiletés_de_Motricité_Fine = "Habiletés de motricité-fine";
    case Habiletés_de_Motricité_Globale = "Habiletés de motricité-globale";
    
    case Habiletés_Comportementales_consciens_de_soi   = "Habiletés comportementales-conscience de soi";
    
    case Habiletés_Comportementales_relation_sociales   = "Habiletés comportementales-relations sociales";
    case Habiletés_Comportementales_jeu_et_loisirs   = "Habiletés comportementales-jeu et loisirs";
    case Habiletés_Comportementales_vie_quotidienne   = "Habiletés comportementales-vie quotidienne";
}