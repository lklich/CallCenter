
<nav class="large-1 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Operacje') ?></li>
        <li><?= $this->Html->link(__('Edytuj'), ['action' => 'edit', $interview->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Usuń'), ['action' => 'delete', $interview->id], ['confirm' => __('Na pewno usunąc rozmowę # {0}?', $interview->company)]) ?> </li>
        <li><?= $this->Html->link(__('Powrót'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="interviews view large-11 medium-8 columns content">
    <h3><?= h('Data ' . $interview->calldate . ' godz. ' . $interview->calltime . ', ' . $interview->company) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Rozmowę wykonał pracownik') ?></th>
            <td><?= h($interview->user->full_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Czas kontaktu') ?></th>
            <td><?= h($interview->calldate . ', ' . $interview->calltime) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Firma') ?></th>
            <td><?= h($interview->company . ' ' . $interview->address ) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Osoba kontaktowa') ?></th>
            <td><?= h($interview->person) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefon') ?></th>
            <td><?= h($interview->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('E-mail') ?></th>
            <td><?= h($interview->email) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Następny kontakt') ?></th>
            <td><?= h($interview->nextcall . ', '. $interview->nexttime) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Notatki do kontaktu') ?></h4>
        <?= $interview->description ?>
    </div>
</div>
