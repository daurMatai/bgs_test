<?php

namespace Tests\Unit;

use App\Models\Member;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MemberTest extends TestCase
{
    use RefreshDatabase;

    private const COUNT = 5;

    /**
     * Create articles
     *
     * @return void
     */
    public function testCreate() : void
    {
        $articles = factory(Member::class, self::COUNT)->create();

        $this->assertSame(self::COUNT, $articles->count());
    }
}

