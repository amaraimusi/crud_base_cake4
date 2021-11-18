<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Neko Entity
 *
 * @property int $id
 * @property int|null $neko_val
 * @property string|null $neko_name
 * @property \Cake\I18n\FrozenDate|null $neko_date
 * @property int|null $neko_group
 * @property int|null $en_sp_id
 * @property \Cake\I18n\FrozenTime|null $neko_dt
 * @property int|null $neko_flg
 * @property string|null $img_fn
 * @property string|null $note
 * @property int|null $sort_no
 * @property bool|null $delete_flg
 * @property string|null $update_user
 * @property string|null $ip_addr
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\EnSp $en_sp
 */
class Neko extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'neko_val' => true,
        'neko_name' => true,
        'neko_date' => true,
        'neko_group' => true,
        'en_sp_id' => true,
        'neko_dt' => true,
        'neko_flg' => true,
        'img_fn' => true,
        'note' => true,
        'sort_no' => true,
        'delete_flg' => true,
        'update_user' => true,
        'ip_addr' => true,
        'created' => true,
        'modified' => true,
        'en_sp' => true,
    ];
}
