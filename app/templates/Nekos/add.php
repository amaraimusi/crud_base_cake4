<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Neko $neko
 * @var \Cake\Collection\CollectionInterface|string[] $enSps
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Nekos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="nekos form content">
            <?= $this->Form->create($neko) ?>
            <fieldset>
                <legend><?= __('Add Neko') ?></legend>
                <?php
                    echo $this->Form->control('neko_val');
                    echo $this->Form->control('neko_name');
                    echo $this->Form->control('neko_date', ['empty' => true]);
                    echo $this->Form->control('neko_group');
                    echo $this->Form->control('en_sp_id', ['options' => $enSps, 'empty' => true]);
                    echo $this->Form->control('neko_dt', ['empty' => true]);
                    echo $this->Form->control('neko_flg');
                    echo $this->Form->control('img_fn');
                    echo $this->Form->control('note');
                    echo $this->Form->control('sort_no');
                    echo $this->Form->control('delete_flg');
                    echo $this->Form->control('update_user');
                    echo $this->Form->control('ip_addr');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
