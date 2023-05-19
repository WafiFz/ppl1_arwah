<?php

namespace Modules\Order\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// Entities
use Modules\Order\Entities\Order;
use Modules\Order\Entities\Payment;
use Modules\Package\Entities\Package;
use Modules\Theme\Entities\Theme;
use Modules\Invitation\Entities\Invitation;
use App\Models\User;

class OrdersController extends Controller
{
    public function __construct()
    {
        // Page Title
        $this->module_title = 'Orders';

        // module name
        $this->module_name = 'orders';

        // directory path of the module
        $this->module_path = 'order::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\Order\Models\Order";
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // Get All Data From Table Order
        // dd(auth());
        $datas = Order::where('user_id', auth()->user()->id)->get();
        // $datas = Order::all();

        // dd($datas);
        // $module_title = $this->module_title;
        // $module_name = $this->module_name;
        // $module_path = $this->module_path;
        // $module_icon = $this->module_icon;
        // $module_model = $this->module_model;
        // $module_name_singular = Str::singular($module_name);

        // $module_action = 'List';

        // $$module_name = $module_model::latest()->paginate();

        // return view(
        //     "order::frontend.$module_path.index",
        //     compact('module_title', 'module_name', "$module_name", 'module_icon', 'module_action', 'module_name_singular')
        // );

        return view('client/orders', ['datas' => $datas]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    // public function show($id)
    // {
    //     $id = decode_id($id);

    //     $module_title = $this->module_title;
    //     $module_name = $this->module_name;
    //     $module_path = $this->module_path;
    //     $module_icon = $this->module_icon;
    //     $module_model = $this->module_model;
    //     $module_name_singular = Str::singular($module_name);

    //     $module_action = 'Show';

    //     $$module_name_singular = $module_model::findOrFail($id);

    //     return view(
    //         "order::frontend.$module_name.show",
    //         compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular', "$module_name_singular", 'posts')
    //     );
    // }

    /**
     * Select Package to Make Order
     *
     * @return 
     */
    public function makeOrderSelectPackage()
    {
        // Get all package
        $packages = Package::all();

        $data = [
            "packages" => $packages
        ];

        return view('user/order/index',  compact('data'));
    }

    /**
     * Select Theme to Make Order
     *
     * @return 
     */
    public function makeOrderSelectTheme($package_id)
    {

        // Get all theme by package id
        $package_id = decode_id($package_id);
        $themes = Theme::where('package_id', $package_id)->get();

        $data = [
            "themes" => $themes
        ];

        return view('user/order/theme',  compact('data'));
    }

    /**
     * Summary to Make Order
     *
     * @return 
     */
    public function makeOrderSummary($theme_id)
    {
        $theme_id = decode_id($theme_id);
        $theme = Theme::where('id', $theme_id)->first();

        $data = [
            "theme" => $theme
        ];

        return view('user/order/summary',  compact('data'));
    }

    /**
     * Checkout to Make Order
     *
     * @return 
     */
    public function makeOrder($theme_id)
    {
        try {

            if (!Auth::check()) {
                return view('auth.login');
            }

            $user = User::getByid(auth()->user()->id);
            $theme_id = decode_id($theme_id);
            $theme = Theme::where('id', $theme_id)->first();

            DB::beginTransaction();

            // Create Order
            $order = [
                "status" => "UNPAID",
                "user_id" => $user->id,
                "package_id" => $theme->package_id,
                "theme_id" => $theme->id,
            ];

            $order = Order::create($order);

            // Create Payment
            $payment = [
                "total_price" => $theme->price,
                "user_id" => auth()->user()->id,
                "order_id" => $order->id
            ];

            $payment = Payment::create($payment);

            $payment_midtrans = Payment::midtrans($user, $order, $payment);

            // HANYA UNTUK TESTING
            // Invitation::initWeddingInvitation($order);

            DB::commit();

            $data = [
                "theme" => $theme,
                "payment_midtrans" => $payment_midtrans,
            ];

            return view('user/order/checkout',  compact('data'));
        } catch (Exception $e) {
            DB::rollback();
            dd($e);
            return redirect()->back()->with("error", "Order failed");
        }
    }

    /**
     * Midtrans Callback
     *
     * @return 
     */
    public function makeOrderMidtransCallback(Request $request)
    {
        $server_key = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $server_key);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture') {
                $order = Order::find($request->order_id);
                $order->update(['status' => 'PAID']);

                DB::beginTransaction();
                
                // Create invitation
                Invitation::initWeddingInvitation($order);

                DB::commit();

                try {

                } catch (Exception $e) {
                    DB::rollback();
                    dd($e);
                    return redirect()->back()->with("error", "failed");
                }

            }
        }
    }
}
