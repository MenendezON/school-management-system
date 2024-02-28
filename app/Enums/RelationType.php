<?php
namespace App\Enums;

enum RelationType: String
{
    case FATHER = "Father";
    case MOTHER = "Mother";
    case SPOUSE = "Spouse";
    case UNCLE = "Uncle";
    case AUNT = "Aunty";
    case OTHER = "Other";
}