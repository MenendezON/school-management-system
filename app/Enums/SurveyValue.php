<?php
namespace App\Enums;

enum SurveyValue: String
{
    case Fait_seul = "3";
    case Fait_pas = "2";
    case Fait_avec = "1";
    case Non_eval = "0";
}