<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EnSpsFixture
 */
class EnSpsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'bio_cls_id' => 1,
                'family_name' => 'Lorem ipsum dolor sit amet',
                'wamei' => 'Lorem ipsum dolor sit amet',
                'scien_name' => 'Lorem ipsum dolor sit amet',
                'en_ctg_id' => 1,
                'endemic_sp_flg' => 1,
                'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'sort_no' => 1,
                'delete_flg' => 1,
                'update_user' => 'Lorem ipsum dolor sit amet',
                'ip_addr' => 'Lorem ipsum dolor sit amet',
                'created' => '2021-11-18 12:38:25',
                'modified' => 1637239105,
            ],
        ];
        parent::init();
    }
}
