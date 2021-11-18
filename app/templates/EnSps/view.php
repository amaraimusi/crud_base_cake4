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
            <?= $this->Html->link(__('Edit En Sp'), ['action' => 'edit', $enSp->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete En Sp'), ['action' => 'delete', $enSp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enSp->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List En Sps'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New En Sp'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="enSps view content">
            <h3><?= h($enSp->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Family Name') ?></th>
                    <td><?= h($enSp->family_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Wamei') ?></th>
                    <td><?= h($enSp->wamei) ?></td>
                </tr>
                <tr>
                    <th><?= __('Scien Name') ?></th>
                    <td><?= h($enSp->scien_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Update User') ?></th>
                    <td><?= h($enSp->update_user) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ip Addr') ?></th>
                    <td><?= h($enSp->ip_addr) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($enSp->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Bio Cls Id') ?></th>
                    <td><?= $this->Number->format($enSp->bio_cls_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('En Ctg Id') ?></th>
                    <td><?= $this->Number->format($enSp->en_ctg_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Endemic Sp Flg') ?></th>
                    <td><?= $this->Number->format($enSp->endemic_sp_flg) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sort No') ?></th>
                    <td><?= $this->Number->format($enSp->sort_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($enSp->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($enSp->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Delete Flg') ?></th>
                    <td><?= $enSp->delete_flg ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Note') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($enSp->note)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Nekos') ?></h4>
                <?php if (!empty($enSp->nekos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Neko Val') ?></th>
                            <th><?= __('Neko Name') ?></th>
                            <th><?= __('Neko Date') ?></th>
                            <th><?= __('Neko Group') ?></th>
                            <th><?= __('En Sp Id') ?></th>
                            <th><?= __('Neko Dt') ?></th>
                            <th><?= __('Neko Flg') ?></th>
                            <th><?= __('Img Fn') ?></th>
                            <th><?= __('Note') ?></th>
                            <th><?= __('Sort No') ?></th>
                            <th><?= __('Delete Flg') ?></th>
                            <th><?= __('Update User') ?></th>
                            <th><?= __('Ip Addr') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($enSp->nekos as $nekos) : ?>
                        <tr>
                            <td><?= h($nekos->id) ?></td>
                            <td><?= h($nekos->neko_val) ?></td>
                            <td><?= h($nekos->neko_name) ?></td>
                            <td><?= h($nekos->neko_date) ?></td>
                            <td><?= h($nekos->neko_group) ?></td>
                            <td><?= h($nekos->en_sp_id) ?></td>
                            <td><?= h($nekos->neko_dt) ?></td>
                            <td><?= h($nekos->neko_flg) ?></td>
                            <td><?= h($nekos->img_fn) ?></td>
                            <td><?= h($nekos->note) ?></td>
                            <td><?= h($nekos->sort_no) ?></td>
                            <td><?= h($nekos->delete_flg) ?></td>
                            <td><?= h($nekos->update_user) ?></td>
                            <td><?= h($nekos->ip_addr) ?></td>
                            <td><?= h($nekos->created) ?></td>
                            <td><?= h($nekos->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Nekos', 'action' => 'view', $nekos->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Nekos', 'action' => 'edit', $nekos->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Nekos', 'action' => 'delete', $nekos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nekos->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
