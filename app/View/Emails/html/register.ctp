<strong>
    Bienvenue, <?php echo $username; ?>
</strong>
<p>
    Pour activer votre compte suivez ce lien :
</p>
<p>
    <?php echo $this->Html->url(__('Activation'),$this->Html->url($link,true)); ?>
</p>