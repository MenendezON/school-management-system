@echo off

REM Lancement de XAMPP
start "" "C:\xampp\xampp-control.exe"

REM Attente de quelques secondes pour que XAMPP se lance complètement
timeout /t 10 /nobreak >nul

REM Ouvrir le dossier gscolaire dans une nouvelle fenêtre de l'explorateur de fichiers
start "" /d "C:\xampp\htdocs"  
REM Lancement de la commande "php artisan serve" pour le dossier précédent
start cmd /k "cd C:\xampp\htdocs && rmdir /S /Q .\gscolaire"

REM Attente de quelques secondes pour que les serveurs se lancent
timeout /t 10 /nobreak >nul

exit
