<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;
use App\Meeting;
class MeetingController extends VoyagerBaseController
{

    public function store(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->addRows)->validate();

        $user = \Zoom::user()->first();



        $meeting = \Zoom::meeting()->make([
            'topic' => $request->topic ,
            'duration' => $request->duration,
            'password' => $request->password ,
            'start_time' => $request->start_time,
            'timezone'=> 'Africa/Cairo'
        ]);

        // dd($meeting);

        $meeting->settings()->make([

            'join_before_host' => false ,
            'host_video' => false,
            'participant_video' => false,
            'mute_upon_entry' =>true ,
            'waiting_room' => true,
            'approval_type' => config('zoom.approval_type'),
            'audio' => config('zoom.audio'),
            'audio_recording' => config('zoom.audio_recording')

        ]);


        $user->meetings()->save($meeting);



        $data = Meeting::create([
            'user_id' => auth()->id(),
            'duration'=> $request->duration,
            'start_at' => $meeting->start_time,
            'join_url' => $meeting->join_url,
            'start_url' => $meeting->start_url ,
            'password' => $meeting->password,
            'lesson_id' => $request->lesson_id,
            'group_id' => $request->group_id,
            'topic' => $request->topic

        ]);


        // $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());



        // dd($data);

        event(new BreadDataAdded($dataType, $data));







        if (!$request->has('_tagging')) {
            if (auth()->user()->can('browse', $data)) {
                $redirect = redirect()->route("voyager.{$dataType->slug}.index");
            } else {
                $redirect = redirect()->back();
            }

            return $redirect->with([
                'message'    => __('voyager::generic.successfully_added_new') . " {$dataType->getTranslatedAttribute('display_name_singular')}",
                'alert-type' => 'success',
            ]);
        } else {
            return response()->json(['success' => true, 'data' => $data]);
        }
    }




    public function destroy(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Init array of IDs
        $ids = [];
        if (empty($id)) {
            // Bulk delete, get IDs from POST
            $ids = explode(',', $request->ids);
        } else {
            // Single item delete, get ID from URL
            $ids[] = $id;
        }


        foreach ($ids as $id) {
            $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);

            $last = explode("/", $data->join_url, 3);
            $url  = $last[2];
            $meeting_id =  explode("/", $url, 3);

            $meeting =  \Zoom::meeting()->find($meeting_id[2]);


                if($meeting){
                    $meeting->delete();
                }


            // Check permission
            $this->authorize('delete', $data);

            $model = app($dataType->model_name);
            if (!($model && in_array(SoftDeletes::class, class_uses_recursive($model)))) {
                $this->cleanup($dataType, $data);
            }
        }

        $displayName = count($ids) > 1 ? $dataType->getTranslatedAttribute('display_name_plural') : $dataType->getTranslatedAttribute('display_name_singular');

        $res = $data->destroy($ids);
        $data = $res
            ? [
                'message'    => __('voyager::generic.successfully_deleted')." {$displayName}",
                'alert-type' => 'success',
            ]
            : [
                'message'    => __('voyager::generic.error_deleting')." {$displayName}",
                'alert-type' => 'error',
            ];

        if ($res) {
            event(new BreadDataDeleted($dataType, $data));
        }

        return redirect()->route("voyager.{$dataType->slug}.index")->with($data);
    }



}