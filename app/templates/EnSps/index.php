<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EnSp[]|\Cake\Collection\CollectionInterface $enSps
 */
?>
<div class="enSps index content">
    <?= $this->Html->link(__('New En Sp'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('En Sps') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('bio_cls_id') ?></th>
                    <th><?= $this->Paginator->sort('family_name') ?></th>
                    <th><?= $this->Paginator->sort('wamei') ?></th>
                    <th><?= $this->Paginator->sort('scien_name') ?></th>
                    <th><?= $this->Paginator->sort('en_ctg_id') ?></th>
                    <th><?= $this->Paginator->sort('endemic_sp_flg') ?></th>
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
                <?php foreach ($enSps as $enSp): ?>
                <tr>
                    <td><?= $this->Number->format($enSp->id) ?></td>
                    <td><?= $this->Number->format($enSp->bio_cls_id) ?></td>
                    <td><?= h($enSp->family_name) ?></td>
                    <td><?= h($enSp->wamei) ?></td>
                    <td><?= h($enSp->scien_name) ?></td>
                    <td><?= $this->Number->format($enSp->en_ctg_id) ?></td>
                    <td><?= $this->Number->format($enSp->endemic_sp_flg) ?></td>
                    <td><?= $this->Number->format($enSp->sort_no) ?></td>
                    <td><?= h($enSp->delete_flg) ?></td>
                    <td><?= h($enSp->update_user) ?></td>
                    <td><?= h($enSp->ip_addr) ?></td>
                    <td><?= h($enSp->created) ?></td>
                    <td><?= h($enSp->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $enSp->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $enSp->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $enSp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enSp->id)]) ?>
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
