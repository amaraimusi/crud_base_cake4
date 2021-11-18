<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EnSp $enSp
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List En Sps'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="enSps form content">
            <?= $this->Form->create($enSp) ?>
            <fieldset>
                <legend><?= __('Add En Sp') ?></legend>
                <?php
                    echo $this->Form->control('bio_cls_id');
                    echo $this->Form->control('family_name');
                    echo $this->Form->control('wamei');
                    echo $this->Form->control('scien_name');
                    echo $this->Form->control('en_ctg_id');
                    echo $this->Form->control('endemic_sp_flg');
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
