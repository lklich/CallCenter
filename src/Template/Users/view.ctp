<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Operacje') ?></li>
        <li><?= $this->Html->link(__('Powrót'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Lista zadań'), ['controller' => 'Interviews', 'action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="users view large-10 medium-8 columns content">
    <h3><?= 'Pracownik: ' . h($user->full_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Telefon') ?></th>
            <td><?= h($user->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('E-mail') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Utworzony') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Aktywny') ?></th>
            <td><?= $user->active ? __('Tak') : __('Nie'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Kontakty pracownika') ?></h4>
        <?php if (!empty($user->interviews)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Data kontaktu') ?></th>
                <th scope="col"><?= __('Czas kontaktu') ?></th>
                <th scope="col"><?= __('Firma') ?></th>
                <th scope="col"><?= __('Przedstawiciel') ?></th>
                <th scope="col"><?= __('Adres') ?></th>
                <th scope="col"><?= __('Telefon') ?></th>
                <th scope="col"><?= __('E-mail') ?></th>
                <th scope="col"><?= __('Następny kontakt') ?></th>
                <th scope="col" class="actions"><?= __('Operacje') ?></th>
            </tr>
            <?php foreach ($user->interviews as $interviews): ?>
            <tr>
                <td><?= h($interviews->calldate) ?></td>
                <td><?= h($interviews->calltime) ?></td>
                <td><?= h($interviews->company) ?></td>
                <td><?= h($interviews->person) ?></td>
                <td><?= h($interviews->address) ?></td>
                <td><?= h($interviews->phone) ?></td>
                <td><?= h($interviews->email) ?></td>
                <td><?= h($interviews->nextcall) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Podgląd'), ['controller' => 'Interviews', 'action' => 'view', $interviews->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
