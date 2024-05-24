@echo off

REM Lancement de XAMPP
start "" "C:\xampp\xampp-control.exe"

REM Attente de quelques secondes pour que XAMPP se lance complètement
timeout /t 10 /nobreak >nul

REM Ouvrir le dossier gscolaire dans une nouvelle fenêtre de l'explorateur de fichiers
start "" /d "C:\xampp\htdocs\gscolaire" 
REM Lancement de la commande "php artisan serve" pour le dossier précédent
start cmd /k "cd C:\xampp\htdocs\gscolaire && php artisan serve"

REM Ouvrir le dossier gscolaire dans une nouvelle fenêtre de l'explorateur de fichiers
start "" /d "C:\xampp\htdocs\gscolaire" 
REM Lancement de la commande "npm run dev" pour le dossier précédent
start cmd /k "cd C:\xampp\htdocs\gscolaire && git pull origin dev && npm run dev"

REM Attente de quelques secondes pour que les serveurs se lancent
timeout /t 10 /nobreak >nul

REM Lancement du navigateur avec le lien http://127.0.0.1:8000/
start http://127.0.0.1:8000/

exit
