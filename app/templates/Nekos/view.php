<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Neko $neko
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Neko'), ['action' => 'edit', $neko->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Neko'), ['action' => 'delete', $neko->id], ['confirm' => __('Are you sure you want to delete # {0}?', $neko->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Nekos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Neko'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="nekos view content">
            <h3><?= h($neko->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Neko Name') ?></th>
                    <td><?= h($neko->neko_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('En Sp') ?></th>
                    <td><?= $neko->has('en_sp') ? $this->Html->link($neko->en_sp->id, ['controller' => 'EnSps', 'action' => 'view', $neko->en_sp->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Img Fn') ?></th>
                    <td><?= h($neko->img_fn) ?></td>
                </tr>
                <tr>
                    <th><?= __('Update User') ?></th>
                    <td><?= h($neko->update_user) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ip Addr') ?></th>
                    <td><?= h($neko->ip_addr) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($neko->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Neko Val') ?></th>
                    <td><?= $this->Number->format($neko->neko_val) ?></td>
                </tr>
                <tr>
                    <th><?= __('Neko Group') ?></th>
                    <td><?= $this->Number->format($neko->neko_group) ?></td>
                </tr>
                <tr>
                    <th><?= __('Neko Flg') ?></th>
                    <td><?= $this->Number->format($neko->neko_flg) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sort No') ?></th>
                    <td><?= $this->Number->format($neko->sort_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Neko Date') ?></th>
                    <td><?= h($neko->neko_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Neko Dt') ?></th>
                    <td><?= h($neko->neko_dt) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($neko->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($neko->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Delete Flg') ?></th>
                    <td><?= $neko->delete_flg ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Note') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($neko->note)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
