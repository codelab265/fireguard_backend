<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\LastMessage;
use App\Models\Message;
use App\Models\UploadImage;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        $login = Auth::attempt($request->only('email', 'password'));
        if ($login) {
            $user = Auth::user();
            return response()->json([
                'status' => 'success',
                'data' => $user,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'data' => "Invalid username or password",
            ]);
        }
    }

    public function register(Request $request)
    {
        $user = new User();
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->email = $request->email;
        $user->phone_number = $request->phoneNumber;
        $user->gender = $request->gender;
        $user->age = $request->age;
        $user->is_admin = false;
        $user->role = 3;

        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['status' => 'success', 'data' => $user]);
    }

    public function updateProfile(Request $request)
    {
        $user = User::find($request->id);
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->email = $request->email;
        $user->phone_number = $request->phoneNumber;
        $user->gender = $request->gender;
        $user->age = $request->age;

        if ($request->password != "") {

            $user->password = Hash::make($request->password);
        }
        $user->save();
        return response()->json($user);
    }

    public function getConversations($user_id)
    {
        $conversations = Conversation::query()->where('sender_id', $user_id)->orWhere('receiver_id', $user_id)->with('lastMessage', 'user')->orderBy('updated_at', 'desc')->get();
        return response()->json($conversations);
    }

    public function getMessages($conversation_id)
    {
        # code...
        $conversations = Conversation::find($conversation_id);
        $messages = Message::where('conversation_id', $conversations->id)->orderBy('id', 'desc')->get();

        return response()->json($messages);
    }

    public function createMessages(Request $request)
    {
        $conversations = Conversation::find($request->conversation);

        if (!$conversations == null) {
            Conversation::find($conversations->id)->update(['updated_at' => Carbon::now()]);
            LastMessage::where('conversation_id', $conversations->id)->update([
                'message' => $request->message,
                'sender_id' => $request->sender_id,
            ]);
            $message = Message::create([
                'conversation_id' => $conversations->id,
                'message' => $request->message,
                'sender_id' => $request->sender_id,
            ]);
        } else {
            $conversation_id = Conversation::create([
                'buyer_id' => $request->sender_id,
                'seller_id' => $request->receiver_id
            ])->id;
            LastMessage::create([
                'conversation_id' => $conversation_id,
                'message' => $request->message,
                'sender_id' => $request->sender_id,
            ]);
            $message = Message::create([
                'conversation_id' => $conversation_id,
                'message' => $request->message,
                'sender_id' => $request->sender_id,
            ]);
        }

        return response()->json($message);
    }

    public function uploadImages(Request $request)
    {
        $userId = $request->user_id;

        // Retrieve the uploaded files
        $files = $request->file('images');

        // Define the path where the images will be stored
        $path = public_path('uploads');

        // Iterate over each uploaded file
        foreach ($files as $file) {
            // Generate a unique filename for each image
            $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();

            // Move the uploaded file to the defined path
            $file->move($path, $filename);

            // Save the image URL to the database
            $imageUrl = url('uploads/' . $filename);
            // Use the $sellerId and $imageUrl to store the information in the 'seller_credentials' table
            // You can write your logic here to store the seller ID and image URL
            UploadImage::create([
                'user_id' => $userId,
                'uri' => $filename
            ]);
        }

        $data = UploadImage::query()->where('user_id', $userId)->orderBy('created_at', 'DESC')->get();
        return response()->json($data);
    }
}
