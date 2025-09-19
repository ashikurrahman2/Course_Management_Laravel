<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    protected $toastr;

    public function __construct(ToastrInterface $toastr)
    {
        $this->toastr = $toastr;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $orders = Order::with('user')->latest()->get();

            return DataTables::of($orders)
                ->addIndexColumn()
                ->addColumn('user_name', function ($row) {
                    return $row->user ? $row->user->name : 'Unknown';
                })
                ->addColumn('status_badge', function ($row) {
                    if ($row->status == 'Processing') {
                        return '<span class="badge bg-secondary">Processing</span>';
                    } elseif ($row->status == 'Success') {
                        return '<span class="badge bg-success">Success</span>';
                    } elseif ($row->status == 'Hold') {
                        return '<span class="badge bg-danger">Hold</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm me-1 edit" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="fa fa-edit"></i>
                                  </a>
                                  <button class="btn btn-danger btn-sm delete" data-id="' . $row->id . '">
                                      <i class="fa fa-trash"></i>
                                  </button>
                                  <form id="delete-form-' . $row->id . '" action="' . route('orders.destroy', $row->id) . '" method="POST" style="display: none;">
                                      ' . csrf_field() . '
                                      ' . method_field('DELETE') . '
                                  </form>';
                    return $actionbtn;
                })
                ->rawColumns(['status_badge', 'action'])
                ->make(true);
        }

        return view('admin.pages.orders.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'status' => 'nullable|string',
        ]);

        Order::create([
            'user_id' => auth()->id(), // Present login user
            'order_id' => '#' . rand(1000, 9999),
            'course_name' => $request->course_name,
            'order_date' => now(),
            'price' => $request->price,
            'status' => $request->status ?? 'Processing',
        ]);

        $this->toastr->success('Order created successfully!');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.pages.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'course_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'status' => 'required|string',
        ]);

        $order = Order::findOrFail($id);
        $order->update([
            'course_name' => $request->course_name,
            'price' => $request->price,
            'status' => $request->status,
        ]);

        $this->toastr->success('Order updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        $this->toastr->success('Order deleted successfully!');
        return back();
    }
}
