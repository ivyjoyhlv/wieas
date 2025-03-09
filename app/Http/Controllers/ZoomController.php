<?php
// app/Http/Controllers/ZoomController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Meeting;

class ZoomController extends Controller
{
    public function createMeeting(Request $request)
    {
        // Create a new Guzzle client to send requests
        $client = new Client();
        
        // Request to Zoom API to create a meeting
        $response = $client->post('https://api.zoom.us/v2/users/me/meetings', [
            'headers' => [
                'Authorization' => 'wuO9U_BISleJUz-EqizwzAN', // Replace with your Zoom API access token
            ],
            'json' => [
                'topic' => $request->input('topic', 'Sample Meeting'),
                'type' => 2, // 2 means scheduled meeting
                'start_time' => $request->input('start_time', now()->toIso8601String()), // Example start time
                'duration' => 30, // Example duration (in minutes)
                'timezone' => 'America/New_York', // Replace with your timezone
                'password' => $request->input('password', 'secretpassword'),
            ]
        ]);

        // Decode the response body
        $meeting = json_decode($response->getBody()->getContents(), true);

        // Generate a unique meeting code
        $meetingCode = uniqid('meeting_', true);

        // Store the meeting info in the database
        $newMeeting = new Meeting();
        $newMeeting->meeting_code = $meetingCode;
        $newMeeting->zoom_meeting_id = $meeting['id']; // Store Zoom meeting ID
        $newMeeting->save();

        // Return meeting info (URL, password, meeting code)
        return response()->json([
            'join_url' => $meeting['join_url'],
            'password' => $meeting['password'],
            'meeting_code' => $meetingCode, // You can share this code with participants
        ]);
    }

    public function joinMeeting(Request $request)
    {
        $meetingCode = $request->input('meeting_code'); // Code entered by the user

        // Find the meeting by meeting code
        $meeting = Meeting::where('meeting_code', $meetingCode)->first();

        if (!$meeting) {
            return response()->json(['error' => 'Invalid meeting code']);
        }

        // Redirect the user to the Zoom meeting URL with the meeting ID and password
        return redirect('https://zoom.us/j/' . $meeting->zoom_meeting_id . '?pwd=' . $meetingCode);
    }
}
