<?php
namespace App\Enums;

enum SubjectType: String
{
    case Français_langue_enseignement = "Français, langue d'enseignement";
    case Anglais_langue_seconde = "Anglais, langue seconde";
    case Mathématique = "Mathématique";
    case Arts_Plastiques = "Arts Plastiques";
    case Éducation_physique_et_à_la_santé = "Éducation physique et à la santé";
}