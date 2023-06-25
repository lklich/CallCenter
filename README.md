# LKCallCenter
System do wspierania pracy CallCenter
Informacje o systemie LK CallCenter, prawa autorskie i licencja</h2>

LK CallCenter to program ułatwiający rejestrację i planowanie kontaktów z kontrahentami.
Funkcje: zarządzanie pracownikami, którzy wykonują rozmowy telefoniczne z kontrahentami.
Każdy pracownik może dodawać kontakty (firma, adres, telefon, przedstawiciel, data kontaktu, data i godzina kontaktu z kontrahentem w przyszłości oraz pole tekstowe do spisania notatek).
System wyświetla każdemu pracownikowi listę zadań do wykonania, czyli te, których planowana data kontaktu wypada na dziś.
Zaplanowany kontakt można oznaczyć jako sprawę załatwioną, a wówczas nie będzie się pojawiać na liście. Z poziomu administratora można przegladać wszystkie zapisy pracowników i filtrować je wg dat czy
wyświetlać poszczególnych pracowników.
<br/><br/>
US: LK CallCenter is system for registering, planing and scheduling contacts for CallCenter companies. Features: Managing employees who make phone calls to contractors. Employee can add/edit/delete contacts (company, address, telephone, person representative, date of contact, date and time of contact with the contractor in the future, and a text field to description). Displays a list of tasks today to do for logged employee whose planned contact date is today. The scheduled contact can be marked as finished and will not show in the list. From an administrator access you can view all employee tasks and filter them by date or by individual employees. 
<br><br/>
DE: LK CallCenter ist ein Programm, das die Registrierung und Planung von Kontakten mit CallCenter-Auftragnehmern erleichtert. Funktionen: Verwalten von Angestellten, die Anrufe tätigen. Jeder Mitarbeiter kann Kontakte (Firma, Anschrift, Telefon, Vertreter, Kontaktdatum, Datum und Uhrzeit des Kontakts mit dem Auftragnehmer in der Zukunft und ein Textfeld zum Schreiben von Notizen hinzufügen). Das System zeigt eine Liste der Aufgaben an, die für jeden Mitarbeiter ausgeführt werden müssen, dh diejenigen, deren geplantes Kontaktdatum heute ist. Geplanter Kontakt kann als erledigt markiert werden und erscheint nicht in der Liste. Administratoren können alle Mitarbeiterdatensätze anzeigen und nach Datum filtern. einzelne Mitarbeiter anzeigen 
<br/>
<br>
<br/><h3>Licencja programu</h3>
<ol>
 <li>Licencja na program <b>LK CallCenter</b> jest darmowa GNU GPL - także do użytku komercyjnego i nie może być przez nikogo sprzedawana.</li>
 <li>Oferuję wsparcie instalacji systemu oraz jego rozbudowę systemu o żądane funkcjonalności. </li>
 <li>W przypadku znalezienia błędu, proszę zgłosić go do mnie na adres E-mail.</li>
 <li>Nie można usuwać stopki systemu, ani jej w żaden sposób zakrywać!</li>
<ol>
</br>
Wymagania programu: PHP w wersji > 5.6 (moduły: mbstring, intl, mysql), CakePHP 3, serwer: Apache lub IIS, baza danych: mySql.
</br>
Instalacja:
<ol>
<li>Utwórz bazę danych za pomocą skryptu.</li>
<li>Zainstaluj CakePHP za pomocą composera: composer create-project --prefer-dist cakephp/app callcenter</li>
<li>Wrzuć pliki do src i config.</li>
<li>Skonfiguruj połączenie z bazą za pomocą pliku config/app.php oraz opcjonalnie podaj dane SMTP do wysyłania zapomnianych haseł.</li>
<li>Uruchom aplikację. Wstępne loginy: admin (h: LKCallCenter) zwykły użytkownik: mtarkowski (h: Mirek)</li>

<img src="http://leszek-klich.pl/callcenter/doc/1.png">
<img src="http://leszek-klich.pl/callcenter/doc/2.png">
<img src="http://leszek-klich.pl/callcenter/doc/3.png">

Miłego użytkowania
