<?php
use Cake\Cache\Cache;
$version = '0.4 data: 20.10.2017'
?>

<?= $this->Html->link(__('Powrót'), ['controller' => 'Interviews', 'action' => 'index'],['class'=>'button']) ?>

<div class="index large-12 medium-8 columns content">
<p>

<?php if($lang == 'pl_PL') {
 echo '<h2>Informacje o systemie LK CallCenter, prawa autorskie i licencja</h2>';
 echo 'Autorem i właścicielem praw autorskich systemu jest Leszek Klich.<br/>';
 echo 'Kontakt: tel. 691050123, <a href="http://leszek-klich.pl">http://www.leszek-klich.pl</a><br/>';
 echo '<br/>LK CallCenter to program ułatwiający rejestrację i planowanie kontaktów z kontrahentami dla firm CallCenter.';
 echo 'Funkcje: zarządzanie pracownikami, którzy wykonują rozmowy telefoniczne z kontrahentami.';
 echo 'Każdy pracownik może dodawać kontakty (firma, adres, telefon, przedstawiciel, data kontaktu, data i godzina kontaktu z kontrahentem w przyszłości oraz pole tekstowe do spisania notatek).';
 echo 'System wyświetla każdemu pracownikowi listę zadań do wykonania, czyli te, których planowana data kontaktu wypada na dziś.';
 echo 'Zaplanowany kontakt można oznaczyć jako sprawę załatwioną, a wówczas nie będzie się pojawiać na liście. Z poziomu administratora można przegladać wszystkie zapisy pracowników i filtrować je wg dat czy';
 echo 'wyświetlać poszczególnych pracowników.';
 echo '<br/><br/><h4><b>Aktualna wersja programu: ' . $version . '</b></h4><br/><h3>Licencja programu</h3>';
 echo '<ol>';
 echo '<li>Licencja na program <b>LK CallCenter</b> jest darmowa - także do użytku komercyjnego i nie może być przez nikogo sprzedawana.</li>';
 echo '<li>Oferuję wsparcie instalacji systemu oraz jego rozbudowę systemu o żądane funkcjonalności. </li>';
 echo '<li>W przypadku znalezienia błędu, proszę zgłosić go do mnie na adres E-mail.</li>';
 echo '<li>Nie można usuwać stopki systemu, ani jej w żaden sposób zakrywać!</li>';
 echo '<ol></br>';
 echo 'Wymagania programu: PHP w wersji > 5.6 (moduły: mbstring, intl, mysql), serwer: Apache lub IIS, baza danych: mySql.';
}

if($lang == 'en_US') {
echo '<h2>About LK CallCenter system, licence and copyright</h2>';
echo 'Author and copyright owner is Leszek Klich.<br/>';
echo 'Contact: mobile: +48 691050123, <a href="http://leszek-klich.pl">http://www.leszek-klich.pl</a><br/>';
echo '<br/>LK CallCenter is system for registering, planing and scheduling contacts for CallCenter companies. ';
echo 'Features: Managing employees who make phone calls to contractors. ';
echo 'Employee can add/edit/delete contacts (company, address, telephone, person representative, date of contact, date and time of contact with the contractor in the future, and a text field to description). ';
echo 'Displays a list of tasks today to do for logged employee whose planned contact date is today. ';
echo 'The scheduled contact can be marked as finished and will not show in the list. ';
echo 'From an administrator access you can view all employee tasks and filter them by date or by individual employees. ';
echo '<br/><br/><h4><b>System version: ' . $version . '</b></h4><br/><h3>License</h3>';
echo '<ol>';
echo '<li>System <b>LK CallCenter</b> is free software - also for commercial using can not be sold by anyone.</li>';
echo '<li>I can help you install and improve your system. </li>';
echo '<li>Please report errors to my email.</li>';
echo '<li>You can not delete fotter info or cover it!</li>';
echo '<ol></br>';
echo 'Requirenment: PHP version > 5.6 (modules: mbstring, intl, mysql), server: Apache or IIS, database: mySql.';
}

if($lang == 'de_DE') {
  echo '<h2> LK CallCenter System Informationen, Copyright und Lizenz </h2>';
  echo 'Der Urheber und Copyright-Inhaber des Systems ist Leszek Klich. <br/>';
  echo 'Kontakt: Tel. 691050123, <a href="http://leszek-klich.pl"> http://www.leszek-klich.pl </a> <br/>';
  echo '<br/> LK CallCenter ist ein Programm, das die Registrierung und Planung von Kontakten mit CallCenter-Auftragnehmern erleichtert. ';
  echo 'Funktionen: Verwalten von Angestellten, die Anrufe tätigen. ';
  echo 'Jeder Mitarbeiter kann Kontakte (Firma, Anschrift, Telefon, Vertreter, Kontaktdatum, Datum und Uhrzeit des Kontakts mit dem Auftragnehmer in der Zukunft und ein Textfeld zum Schreiben von Notizen hinzufügen). ';
  echo 'Das System zeigt eine Liste der Aufgaben an, die für jeden Mitarbeiter ausgeführt werden müssen, dh diejenigen, deren geplantes Kontaktdatum heute ist. ';
  echo 'Geplanter Kontakt kann als erledigt markiert werden und erscheint nicht in der Liste. Administratoren können alle Mitarbeiterdatensätze anzeigen und nach Datum filtern. ';
  Echo 'einzelne Mitarbeiter anzeigen ';
  echo '<br/> <br/> <h4> <b> Aktuelle Version:' . $version. '</ h2> <h3> Programmlizenz </ h3>';
  echo '<ol>';
  echo '<li> LK CallCenter </ b> ist kostenlos - es ist auch kommerziell einsetzbar und kann von niemandem verkauft werden. </li>';
  echo '<li> Ich unterstütze die Installation des Systems und dessen Entwicklung mit der erforderlichen Funktionalität. </Li>';
  echo '<li> Wenn Sie einen Fehler finden, melden Sie diesen bitte per E-Mail. </li>';
  echo '<li> Der Systemfuß kann nicht entfernt oder auf irgendeine Weise abgedeckt werden! </li>';
  echo '<ol> </br>';
  echo 'Programmvoraussetzungen: PHP-Version> 5.6 (Module: mbstring, intl, mysql), Server: Apache oder IIS, Datenbank: mySql.';

} ?>

<br>
     <div class="row">
          <div class="col-12">
              <h4><?= __('Środowisko serwera') ?></h4>
            <ul class="list-group">
              <?php if (version_compare(PHP_VERSION, '5.6.0', '>=')): ?>
                  <li class="list-group-item list-group-item-success">Wykryto poprawną wersję PHP <?= PHP_VERSION ?>.</li>
              <?php else: ?>
                  <li class="list-group-item list-group-item-danger">Błąd: Wersja PHP jest zbyt niska! Minimalna wersja to PHP 5.6.0 lub wyższa. Wykryto: <?= PHP_VERSION ?>.</li>
              <?php endif; ?>

              <?php if (extension_loaded('mbstring')): ?>
                  <li class="list-group-item list-group-item-success">Poprawnie załadowano moduł mbstring.</li>
              <?php else: ?>
                  <li class="list-group-item list-group-item-danger">Błąd: Musisz zainstalować moduł PHP mbstring!</li>;
              <?php endif; ?>

              <?php if (extension_loaded('openssl')): ?>
                  <li class="list-group-item list-group-item-success">Poprawnie wykryto moduł openssl.</li>
              <?php elseif (extension_loaded('mcrypt')): ?>
                  <li class="list-group-item list-group-item-success">PHP na serwerze posiada moduł kryptograficzny mcrypt!</li>
              <?php else: ?>
                  <li class="list-group-item list-group-item-danger">Błąd! Na serwerze nie wykryto modułu openssl lub mcrypt dla PHP.</li>
              <?php endif; ?>

              <?php if (extension_loaded('intl')): ?>
                  <li class="list-group-item list-group-item-success">Poprawnie wykryto moduł PHP intl.</li>
              <?php else: ?>
                  <li class="list-group-item list-group-item-danger">Błąd! Serwer PHP nie posiada rozszerzenia intl.</li>
              <?php endif; ?>
              </ul>
          </div>

              <div class="col-6">
              <h4>System plików</h4>
              <ul class="list-group">
              <?php if (is_writable(TMP)): ?>
                  <li class="list-group-item list-group-item-success">Katalog <i>tmp</i> jest zapisywalny.</li>
              <?php else: ?>
                  <li class="list-group-item list-group-item-danger">Błąd: Katalog tmp nie jest zapisywalny - wprowadź uprawnienia!</li>
              <?php endif; ?>

              <?php if (is_writable(LOGS)): ?>
                  <li class="list-group-item list-group-item-success">Katalog <i>logs</i> jest zapisywalny.</li>
              <?php else: ?>
                  <li class="list-group-item list-group-item-danger">Błąd! System musi mieć prawa do zapisu w katalogu logs!</li>
              <?php endif; ?>

              <?php $settings = Cache::config('_cake_core_'); ?>
              <?php if (!empty($settings)): ?>
 <li class="list-group-item list-group-item-success">Silnik pamięci podręcznej systemu: <em><?= $settings['className'] ?></em>.</li>
              <?php else: ?>
<li class="list-group-item list-group-item-danger">Błąd! Proszę sprawdzić ustawienia systemu. Pamięć podręczna nie działa poprawnie!</li>
              <?php endif; ?>
              </ul>
          </div>
        </div>
</ul>
</p>


</div>
