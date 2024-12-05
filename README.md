# projectfase3

Dit project omvat een webapplicatie waarin studenten kunnen inloggen en hun badges bekijken. Het project heeft functionaliteiten voor:

Login en registratie van gebruikers.
Dynamische weergave van badges op basis van de ingelogde student.
Een sidebar die dynamisch tussen "Login" en "Logout" schakelt afhankelijk van de sessiestatus.
Structuur en Functionaliteiten
Bestanden en Functionaliteiten
Frontend (HTML, CSS, JS):

login.html: Bevat de login- en registratieformulieren.
badgepage.html: Toont de badges van de ingelogde gebruiker.
voortgang.html: Extra pagina voor gebruikersvoortgang.
JavaScript: Dynamisch in- en uitloggen via API-aanroepen.
Backend (PHP):

login.php: Handelt het inloggen van gebruikers af.
register.php: Handelt de registratie van nieuwe gebruikers af.
logout.php: Beëindigt de sessie en logt de gebruiker uit.
session_status.php: Controleert of een gebruiker is ingelogd.
showbadge.php: Haalt de badges van de ingelogde gebruiker op uit de database.
Database (MySQL):

Tabel users: Opslag van gebruikersinformatie (student_name, email, password).
Tabel badge: Opslag van badges (id, student_name, description, explanation, date, path).

Functionaliteiten en Implementatie
1. Registratie
Frontend:
Formulier in login.html.
Input wordt via fetch doorgestuurd naar register.php.
Backend (register.php):
Ontvangt student_name, email en wachtwoord.
Versleutelt het wachtwoord met password_hash.
Voegt de gebruiker toe aan de users-tabel.
2. Login
Frontend:
Formulier in login.html.
Input wordt via fetch doorgestuurd naar login.php.
Backend (login.php):
Controleert of de student_name bestaat.
Verifieert het wachtwoord met password_verify.
Slaat de student_name op in de sessie bij een succesvolle login.
3. Dynamische Sidebar: Login/Logout
Frontend:
De auth-link in de sidebar schakelt tussen "Login" en "Logout" op basis van sessiestatus.
JavaScript (updateSidebar) haalt de sessiestatus op via session_status.php.
Backend:
session_status.php: Controleert of $_SESSION['student_name'] is ingesteld.
logout.php: Vernietigt de sessie en stuurt de gebruiker terug naar login.html.
4. Badges Weergeven
Frontend:
badgepage.html haalt badges op via een fetch-aanroep naar showbadge.php.
Alleen de badges van de ingelogde gebruiker worden weergegeven.
Backend (showbadge.php):
Selecteert badges uit de badge-tabel op basis van de student_name uit de sessie.
