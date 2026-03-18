<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FollowsFixture
 */
class FollowsFixture extends TestFixture
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
                'follower_id' => 1,
                'followed_id' => 1,
                'status' => 'Lorem ipsum dolor ',
                'created' => 1773835588,
                'modified' => 1773835588,
            ],
        ];
        parent::init();
    }
}
