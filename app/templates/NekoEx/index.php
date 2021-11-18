<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Neko[]|\Cake\Collection\CollectionInterface $nekos
 */
?>
<div class="nekos index content">
    <?= $this->Html->link(__('New Neko'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Nekos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('neko_val') ?></th>
                    <th><?= $this->Paginator->sort('neko_name') ?></th>
                    <th><?= $this->Paginator->sort('neko_date') ?></th>
                    <th><?= $this->Paginator->sort('neko_group') ?></th>
                    <th><?= $this->Paginator->sort('en_sp_id') ?></th>
                    <th><?= $this->Paginator->sort('neko_dt') ?></th>
                    <th><?= $this->Paginator->sort('neko_flg') ?></th>
                    <th><?= $this->Paginator->sort('img_fn') ?></th>
                    <th><?= $this->Paginator->sort('sort_no') ?></th>
                    <th><?= $this->Paginator->sort('delete_flg') ?></th>
                    <th><?= $this->Paginator->sort('update_user') ?></th>
                    <th><?= $this->Paginator->sort('ip_addr') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($nekos as $neko): ?>
                <tr>
                    <td><?= $this->Number->format($neko->id) ?></td>
                    <td><?= $this->Number->format($neko->neko_val) ?></td>
                    <td><?= h($neko->neko_name) ?></td>
                    <td><?= h($neko->neko_date) ?></td>
                    <td><?= $this->Number->format($neko->neko_group) ?></td>
                    <td><?= $neko->has('en_sp') ? $this->Html->link($neko->en_sp->id, ['controller' => 'EnSps', 'action' => 'view', $neko->en_sp->id]) : '' ?></td>
                    <td><?= h($neko->neko_dt) ?></td>
                    <td><?= $this->Number->format($neko->neko_flg) ?></td>
                    <td><?= h($neko->img_fn) ?></td>
                    <td><?= $this->Number->format($neko->sort_no) ?></td>
                    <td><?= h($neko->delete_flg) ?></td>
                    <td><?= h($neko->update_user) ?></td>
                    <td><?= h($neko->ip_addr) ?></td>
                    <td><?= h($neko->created) ?></td>
                    <td><?= h($neko->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $neko->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $neko->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $neko->id], ['confirm' => __('Are you sure you want to delete # {0}?', $neko->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
