<?php
namespace App\Enums;

enum RoleType: String
{
    case Admin = "admin";
    case Supervisor = "supervisor";
    case Editor = "editor";
}