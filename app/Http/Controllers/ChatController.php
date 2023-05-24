<?php

namespace App\Http\Controllers;

use App\HTTP\Services\Contact\ContactService;
use Illuminate\Http\Request;

class ChatController extends Controller
{
  protected $contactService;
  /**
   * Display a listing of the resource.
   */
  public function __construct(ContactService $contactService)
  {
    $this->middleware('cus');
    $this->contactService = $contactService;
  }

  public function customerChat()
  {
    return view('chat', [
      'title' => 'Liên hệ'
    ]);
  }
}
