<?php

namespace App\Http\Controllers;

use App\Helper\PushNotificationHelper;
use App\Http\Resources\PushNotificationsResource;
use App\PushNotifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PushNotification extends Controller
{

    /**
     * @param $pushNotifications
     * @param $request
     * @return mixed
     */
    public function index(PushNotifications $pushNotifications, Request $request)
    {
        $perPage = $request->get('per_page', 15);
        $notifications = $pushNotifications->orderBy('status', 'asc')->orderBy('scheduled_at', 'desc')->paginate($perPage)->appends([
            'per_page' => $perPage
        ]);
        $topics = PushNotifications::getTopics();
        return view('notifications.index', compact('notifications', 'topics'));
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required|max:255|string',
            'body' => 'required|max:255|string',
            'scheduled_at' => 'nullable|max:255',
            'topics' => 'required|max:255|string'
        ]);

        if ($request->push_now == true){
            $topics = '/topics/' . $request->topics;
            PushNotificationHelper::sendTopicNotification($topics, $request->title, $request->body);
            return back()->with('status', 'Notification Push now Successfully');
        }

        PushNotifications::create([
            'title' => $request->title,
            'body' => $request->body,
            'scheduled_at' => $request->scheduled_at,
            'topics' => $request->topics,
            'created_by' => auth()->id(),
        ]);

        return back()->with('status', 'Notification Saved Successfully');
    }
}
