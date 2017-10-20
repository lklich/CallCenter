<div class="interviews index large-12 medium-8 columns content">
  <table>
    <tr>
  <td><?= $this->Html->link(__('Dodaj'), ['action' => 'add'],['class'=>'button button-danger']) ?></td>
  <?= $this->Form->create('search',['class'=>'navbar-form navbar-left']) ?>
  <td>
  <?= $this->Form->input('jakie',['options'=>['wszystkie'=>__('Wszystkie'),'koniec'=>__('Zakończone')],'empty'=>true,'empty'=> ['dzis' => __('Dzisiejsze (do wykonania)')],'label'=>__('Zakres wyświetlania')]);
  ?></td>
  <td><?= $this->Form->submit(__('Szukaj'), ['class'=>'button', 'title' => __('Szukaj')]); ?></td>
  <td><?= $this->Html->link(__('Resetuj filtr'), ['action' => 'index'],['class'=>'button']) ?></td>
    </tr>
  <?= $this->Form->end() ?>
  </table>


    <h3><?= __('Do wykonania na dziś' . ': ' . $prac->full_name) ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
              <th scope="col"><?= $this->Paginator->sort('nextcall',__('Kontakt na dzień')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('calldate',__('Data poprzedniej rozmowy')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('company',__('Nazwa firmy')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('person',__('Osoba')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone',__('Telefon')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('email',__('E-mail')) ?></th>
                <th scope="col"><?= $this->Paginator->sort('ended',__('Zakończona')) ?></th>
                <th scope="col" class="actions"><?= __('Operacje') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($interviews as $interview): ?>
              <?php  if($interview->ended == true) {
                $kolor = '#ccccff';
                echo '<tr title="' . __('Zakończona') . '">';
              } else { $kolor='#ffffff'; echo '<tr title="' . __('Do załatwienia') . '">'; } ?>
              <td bgcolor="<?= $kolor ?>"><?= h($interview->nextcall . ', ' . date("H:i",strtotime($interview->nexttime)) ) ?></td>
                <td bgcolor="<?= $kolor ?>"><?= h($interview->calldate . ', ' . date("H:i",strtotime($interview->calltime)) ) ?></td>
                <td bgcolor="<?= $kolor ?>"><?= h($interview->company) ?></td>
                <td bgcolor="<?= $kolor ?>"><?= h($interview->person) ?></td>
                <td bgcolor="<?= $kolor ?>"><?= h($interview->phone) ?></td>
                <td bgcolor="<?= $kolor ?>"><?= h($interview->email) ?></td>
                <td bgcolor="<?= $kolor ?>"><?= h($interview->ended) ? __('Tak'):__('Nie') ?></td>
                <td bgcolor="<?= $kolor ?>" class="actions">
                    <?= $this->Html->link(__('Podgląd'), ['action' => 'view', $interview->id]) ?>
                    <?= $this->Html->link(__('Edycja'), ['action' => 'edit', $interview->id]) ?>
                    <?= $this->Form->postLink(__('Usuń'), ['action' => 'delete', $interview->id], ['confirm' => __('Na pewno usunąć konwersację {0}?', $interview->company)]) ?>
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
