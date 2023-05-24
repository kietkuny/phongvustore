<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
  public function adminChat()
  {
    $customers = Customer::where('status', 1)->get();
    return view('admin.contact.list', [
      'title' => 'Hỗ trợ khách hàng'
    ], compact('customers'));
  }

  public function customerChat()
  {
    return view('chat', [
      'title' => 'Liên hệ'
    ]);
  }

  public function loadMessages(Request $request)
  {
    $customerId = $request->input('customerId');
    $messages = Message::where(function ($query) use ($customerId) {
      $query->where('customer_id', $customerId)
        ->orWhere('admin_id', $customerId);
    })
      ->orderBy('created_at', 'asc')
      ->get();

    return response()->json($messages);
  }

  public function sendMessage(Request $request)
  {
    $customerId = $request->input('customerId');
    $message = $request->input('message');

    $newMessage = new Message();
    $newMessage->customer_id = $customerId;
    $newMessage->admin_id = null; // Set admin_id to null for customer messages
    $newMessage->message = $message;
    $newMessage->save();

    return response()->json(['success' => true]);
  }
}
