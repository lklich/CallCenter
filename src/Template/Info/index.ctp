<?php
use Cake\Cache\Cache;
?>

<?= $this->Html->link(__('Powrót do głównego menu'), ['controller' => 'Interviews', 'action' => 'index'],['class'=>'button']) ?>

<div class="index large-12 medium-8 columns content">
<p>
<h2>Informacje o systemie LK CallCenter, prawa autorskie i licencja</h2>

Autorem i właścicielem praw autorskich systemu jest Leszek Klich.<br/>
Kontakt: tel. 691050123, <a href="http://leszek-klich.pl">http://www.leszek-klich.pl</a><br/>
<br/>
LK CallCenter to program ułatwiający rejestrację i planowanie kontaktów z kontrahentami.
Funkcje: zarządzanie pracownikami, którzy wykonują rozmowy telefoniczne z kontrahentami.
Każdy pracownik może dodawać kontakty (firma, adres, telefon, przedstawiciel, data kontaktu, data i godzina kontaktu z kontrahentem w przyszłości oraz pole tekstowe do spisania notatek).
System wyświetla każdemu pracownikowi listę zadań do wykonania, czyli te, których planowana data kontaktu wypada na dziś.
Zaplanowany kontakt można oznaczyć jako sprawę załatwioną, a wówczas nie będzie się pojawiać na liście. Z poziomu administratora można przegladać wszystkie zapisy pracowników i filtrować je wg dat czy
wyświetlać poszczególnych pracowników.
<br/>
<br/><h4><b>Aktualna wersja programu: 0.4 z dnia 19.10.2017</b></h4>
<br/><h3>Licencja programu</h3>
<ol>
 <li>Licencja na program <b>LK CallCenter</b> jest darmowa - także do użytku komercyjnego i nie może być przez nikogo sprzedawana.</li>
 <li>Oferuję wsparcie instalacji systemu oraz jego rozbudowę systemu o żądane funkcjonalności. </li>
 <li>W przypadku znalezienia błędu, proszę zgłosić go do mnie na adres E-mail.</li>
 <li>Nie można usuwać stopki systemu, ani jej w żaden sposób zakrywać!</li>
<ol>
</br>
Wymagania programu: PHP w wersji > 5.6 (moduły: mbstring, intl, mysql), serwer: Apache lub IIS, baza danych: mySql.

<br>
     <div class="row">
          <div class="col-12">
              <h4>Środowisko serwera</h4>
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
