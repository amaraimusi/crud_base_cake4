<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * NekosFixture
 */
class NekosFixture extends TestFixture
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
                'neko_val' => 1,
                'neko_name' => 'Lorem ipsum dolor sit amet',
                'neko_date' => '2021-11-18',
                'neko_group' => 1,
                'en_sp_id' => 1,
                'neko_dt' => '2021-11-18 12:33:32',
                'neko_flg' => 1,
                'img_fn' => 'Lorem ipsum dolor sit amet',
                'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'sort_no' => 1,
                'delete_flg' => 1,
                'update_user' => 'Lorem ipsum dolor sit amet',
                'ip_addr' => 'Lorem ipsum dolor sit amet',
                'created' => '2021-11-18 12:33:32',
                'modified' => 1637238812,
            ],
        ];
        parent::init();
    }
}
