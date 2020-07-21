<?php

namespace App\Http\Filters;

use App\Models\MemberEvent;

class Member extends QueryFilter
{
    /**
     * @param $value
     * @return void
     */
    public function event($value): void
    {
        $events = MemberEvent::where('event_id', '=', $value);
        $this->builder->whereIn('id', $events->pluck('member_id'));
    }
}
