<nav class="large-1 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Operacje') ?></li>
        <li><?= $this->Html->link(__('Dodaj'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Powrót'), ['controller' => 'Interviews', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users index large-11 medium-8 columns content">
    <h3><?= __('Użytkownicy systemu') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name',__('Imię i nazwisko')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('username',__('Użytkownik')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone',__('Telefon')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('email',__('E-mail')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('created',__('Utworzono')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('active',__('Aktywny')) ?></th>
                <th scope="col" class="actions"><?= __('Operacje') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= h($user->full_name) ?></td>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->phone) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->active) ? 'Tak':'Nie' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Podgląd'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edytuj'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Usuń'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('pierwszy')) ?>
            <?= $this->Paginator->prev('< ' . __('poprzedni')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('następny') . ' >') ?>
            <?= $this->Paginator->last(__('ostatni') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Strona {{page}} z {{pages}}, widać {{current}} rekord(ów) z {{count}} wszystkich')]) ?></p>
    </div>

</div>
