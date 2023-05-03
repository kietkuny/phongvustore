<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CustomerRequest;
use App\HTTP\Services\Customer\CustomerService;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;

class CustomerController extends Controller
{
  protected $customerService;
  /**
   * Display a listing of the resource.
   */
  public function __construct(CustomerService $customerService)
  {
    $this->customerService = $customerService;
  }
  public function index(Request $request)
  {
    $search = $request->get('search');
    $customers = Customer::where('name', 'like', '%' . $search . '%')
      ->orWhere('phone', 'like', '%' . $search . '%')
      ->orWhere('housenumber', 'like', '%' . $search . '%')
      // ->orWhere('city', 'like', '%' . $search . '%')
      // ->orWhere('province', 'like', '%' . $search . '%')
      ->orWhere('email', 'like', '%' . $search . '%')
      ->orderBy('id', 'desc')
      ->paginate(5);
    $customers->appends(['search' => $search]);
    return view('admin.customer.list', [
      'title' => 'Danh Sách khách hàng',
      'customers' => $customers
    ]);
  }
  public function search(Request $request)
  {
    $search = $request->get('query');
    $customers = Customer::where('name', 'like', '%' . $search . '%')
      ->orWhere('phone', 'like', '%' . $search . '%')
      ->orWhere('housenumber', 'like', '%' . $search . '%')
      // ->orWhere('city', 'like', '%' . $search . '%')
      // ->orWhere('province', 'like', '%' . $search . '%')
      ->orWhere('email', 'like', '%' . $search . '%')
      ->orderBy('id', 'desc')
      ->get()
      ->pluck('name');

    return response()->json($customers);
  }

  /**
   * Show the form for creating a new resource.
   */
  // public function create()
  // {
  //   return view('admin.customer.add', [
  //     'title' => 'Đăng kí khách hàng mới',
  //   ]);
  // }

  // public function store(CustomerRequest $request)
  // {
  //   $this->customerService->create($request);

  //   return redirect()->back();
  // }

  public function show(Customer $customer)
  {
    return view('admin.customer.edit',[
      'title' => 'Chỉnh sửa khách hàng ' . $customer->name,
      'customer' => $customer,
    ]);
  }

  public function update(Customer $customer,CustomerRequest $request)
  {
    $this->customerService->update($request, $customer);
    return redirect('/admin/customers/list');
  }

  public function destroy(Request $request): JsonResponse
  {
    $result = $this->customerService->destroy($request);
    if ($result) {
      return response()->json([
        'error' => false,
        'message' => 'Xóa thành công khách hàng'
      ]);
    }

    return response()->json([
      'error' => true
    ]);
  }
}
