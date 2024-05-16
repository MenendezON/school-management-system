<?php
namespace App\Enums;

enum SurveyValue: String
{
    case Non_eval = "0";
    case Fait_avec = "1";
    case Fait_pas = "2";
    case Fait_seul = "3";
}