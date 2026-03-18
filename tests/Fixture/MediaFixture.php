<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MediaFixture
 */
class MediaFixture extends TestFixture
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
                'post_id' => 1,
                'file_url' => 'Lorem ipsum dolor sit amet',
                'file_type' => 'Lorem ipsum dolor ',
                'position' => 1,
                'created' => 1773835640,
                'modified' => 1773835640,
            ],
        ];
        parent::init();
    }
}
