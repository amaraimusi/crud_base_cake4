<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EnSp Entity
 *
 * @property int $id
 * @property int|null $bio_cls_id
 * @property string|null $family_name
 * @property string|null $wamei
 * @property string|null $scien_name
 * @property int|null $en_ctg_id
 * @property int|null $endemic_sp_flg
 * @property string $note
 * @property int|null $sort_no
 * @property bool|null $delete_flg
 * @property string|null $update_user
 * @property string|null $ip_addr
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\BioCl $bio_cl
 * @property \App\Model\Entity\EnCtg $en_ctg
 * @property \App\Model\Entity\Neko[] $nekos
 */
class EnSp extends Entity
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
        'bio_cls_id' => true,
        'family_name' => true,
        'wamei' => true,
        'scien_name' => true,
        'en_ctg_id' => true,
        'endemic_sp_flg' => true,
        'note' => true,
        'sort_no' => true,
        'delete_flg' => true,
        'update_user' => true,
        'ip_addr' => true,
        'created' => true,
        'modified' => true,
        'bio_cl' => true,
        'en_ctg' => true,
        'nekos' => true,
    ];
}
