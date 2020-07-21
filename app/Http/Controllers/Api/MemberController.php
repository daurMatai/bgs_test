<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\MemberRequest;
use App\Models\Member;
use App\Notifications\MemberCreate;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Member as MemberResource;
use App\Http\Filters\Member as MemberFilter;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MemberController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $members = (new MemberFilter(Member::query(), $request))->apply()->get();

        return MemberResource::collection($members);
    }

    public function store(MemberRequest $request)
    {
        $result = null;
        DB::beginTransaction();

        try {
            $member = Member::create($request->all());
            $member->memberEvents()->create($request->all());

            $member->notify((new MemberCreate())->delay(now()->addMinutes(1)));

            DB::commit();

            $result = new MemberResource($member);
        } catch (Exception $e) {
            DB::rollback();
        }

        return $result;
    }

    public function edit($id, Request $request)
    {
        $result = null;
        DB::beginTransaction();

        if ($id && $member = Member::where('id', '=', $id)->first()) {
            try {
                Member::where('id', '=', $id)->update($request->all());

                DB::commit();

                $result = new MemberResource(Member::where('id', '=', $id)->first());
            } catch (Exception $e) {
                DB::rollback();
            }
        }

        return $result;
    }

    public function delete($id)
    {
        return Member::where('id', '=', $id)->delete();
    }
}
