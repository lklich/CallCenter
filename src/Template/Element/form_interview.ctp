<?= $this->Html->script('trumbowyg.min') ?>
<?= $this->Html->css('trum/trumbowyg.min') ?>
<?php
  if ($this->request->session()->read('Auth.User.role') == 'admin'){
    echo $this->Form->control('user_id', ['required'=>true,'options' => $users,'label'=>__('Pracownik')]);
} else {
 echo $this->Form->control('user_id', ['disabled'=>'disabled','options' => $this->request->session()->read('Auth.Userid'),'label'=>__('Pracownik')]);
}
    echo $this->Form->control('calldate',['required'=>true,'id'=>'datarozmowy','type'=>'text','label'=>__('Data rozmowy'),'style' => 'width:150px;']);
    echo $this->Form->control('calltime',['date-format'=>'HH:mm','required'=>true,'id'=>'czasrozmowy','type'=>'text','label'=>__('Godz. rozpoczęcia'),'data-format'=>'HH:mm','style' => 'width:100px;']);
    echo $this->Form->control('company',['required'=>true,'label'=>__('Nazwa firmy')]);
    echo $this->Form->control('address',['label'=>__('Adres')]);
    echo $this->Form->control('person',['label'=>__('Osoba kontaktowa')]);
    echo $this->Form->control('phone',['required'=>true,'label'=>__('Telefon')]);
    echo $this->Form->control('email',['label'=>__('E-mail')]);
    echo $this->Form->control('nextcall', ['required'=>true,'id'=>'datakontakt','type'=>'text','label'=>__('Następny kontakt w dniu'),'empty' => true,'style' => 'width:150px;']);
    echo $this->Form->control('nexttime',['required'=>true,'id'=>'nexttime','type'=>'text','label'=>__('Następny kontakt o godzinie'),'data-format'=>'HH:mm','style' => 'width:100px;']);
    echo $this->Form->control('description',['class'=>'editor','type'=>'textarea','lines'=>5,'label'=>__('Opis dotyczący kontaktu')]);
    echo $this->Form->control('ended',['label'=>__('Sprawa zakończona')]);
?>
<script>
    jQuery(function($){ //on document.ready
      $("#datarozmowy").datepicker({dateFormat:"yy-mm-dd"}).datepicker("setDate",new Date());
      $('#czasrozmowy').timepicker({timeFormat:'HH:mm'});
      $('#nexttime').timepicker({timeFormat:'HH:mm'});
      if($('#czasrozmowy').val() == '') {  $('#czasrozmowy').val(moment().format('LT')); }
      $("#datakontakt").datepicker({dateFormat:"yy-mm-dd",
      minDate: new Date($("#datarozmowy").val())});
      $.trumbowyg.svgPath = '/css/trum/icons.svg';
      $('.editor').trumbowyg({
    lang: 'pl'
});
    })
</script>
