<?php
$cakeDescription = 'Nazwa systemu - autor: leszek-klich.pl';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->Html->script('https://code.jquery.com/jquery-1.12.4.js') ?>
    <?= $this->Html->script('https://code.jquery.com/ui/1.12.1/jquery-ui.js') ?>
    <?= $this->Html->css('https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css') ?>
    <?= $this->Html->script('moment-with-locales') ?>
    <?= $this->Html->script('datepicker-pl') ?>
    <?= $this->Html->css('jquery.timepicker') ?>
    <?= $this->Html->css('fotter') ?>
    <?= $this->Html->script('jquery.timepicker.min') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <script>
      $.datepicker.setDefaults({
      dateFormat: "yy-mm-dd",
      regional: "pl"
      });

      moment.locale('pl');
    </script>

</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1>LK CallCenter</h1>
            </li>

        </ul>
        <div class="top-bar-section">
            <ul class="right">
              <?php if ($this->request->session()->read('Auth.User.id') != null) { ?>
                <li><?= 'Operator: ' . $this->request->session()->read('Auth.User.name') . ' ' . $this->request->session()->read('Auth.User.surname')?></li>
                <li><?php echo $this->Html->link(__('Wyloguj'),['controller'=>'Users','action'=>'logout']); }?></li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <div class="footer"><strong>LK CallCenter</strong> autor: Leszek Klich tel. 691050123 <?= $this->Html->link(__('informacje'), ['controller'=>'Info','action'=>'index']) ?></div>
</body>
</html>
