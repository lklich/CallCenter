# LKCallCenter
System do wspierania pracy CallCenter
Informacje o systemie LK CallCenter, prawa autorskie i licencja</h2>

Autorem i właścicielem praw autorskich systemu jest Leszek Klich.<br/>
Kontakt: tel. 691050123, <a href="http://leszek-klich.pl">http://www.leszek-klich.pl</a><br/>

LK CallCenter to program ułatwiający rejestrację i planowanie kontaktów z kontrahentami.
Funkcje: zarządzanie pracownikami, którzy wykonują rozmowy telefoniczne z kontrahentami.
Każdy pracownik może dodawać kontakty (firma, adres, telefon, przedstawiciel, data kontaktu, data i godzina kontaktu z kontrahentem w przyszłości oraz pole tekstowe do spisania notatek).
System wyświetla każdemu pracownikowi listę zadań do wykonania, czyli te, których planowana data kontaktu wypada na dziś.
Zaplanowany kontakt można oznaczyć jako sprawę załatwioną, a wówczas nie będzie się pojawiać na liście. Z poziomu administratora można przegladać wszystkie zapisy pracowników i filtrować je wg dat czy
wyświetlać poszczególnych pracowników.
<br/>
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
<li>Uruchom aplikację. Wstępne loginy: admin (h: LKCallCallCenter) zwykły użytkownik: mtarkowski (h: Mirek)</li>

Miłego użytkowania
