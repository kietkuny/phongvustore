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
    $customers = Customer::where('status', 1)
      ->where(function ($query) {
        $query->whereExists(function ($subquery) {
          $subquery->selectRaw('1')
            ->from('messages')
            ->whereRaw('messages.sender = "admin"')
            ->whereRaw('messages.recipient = customers.id');
        })->orWhereExists(function ($subquery) {
          $subquery->selectRaw('1')
            ->from('messages')
            ->whereRaw('messages.sender = customers.id')
            ->whereRaw('messages.recipient = "admin"');
        });
      })
      ->get();
    return view('admin.contact.list', [
      'title' => 'Hỗ trợ khách hàng'
    ], compact('customers'));
  }

  public function getMessages($customerId)
  {
    // Lấy tin nhắn từ cơ sở dữ liệu cho cặp admin và customer hiện tại
    $messages = Message::where(function ($query) use ($customerId) {
      $query->where('sender', 'admin')->where('recipient', $customerId);
    })->orWhere(function ($query) use ($customerId) {
      $query->where('sender', $customerId)->where('recipient', 'admin');
    })->get();

    return response()->json(['messages' => $messages]);
  }
  public function adminSendMessage(Request $request)
  {
    $customerId = $request->input('customerId');
    $messageContent = $request->input('message');

    // Lưu tin nhắn vào cơ sở dữ liệu
    $message = new Message();
    $message->sender = 'admin';
    $message->recipient = $customerId;
    $message->message = $messageContent;
    $message->save();

    // Các mã khác để gửi tin nhắn cho customer

    return response()->json(['success' => true]);
  }
}
