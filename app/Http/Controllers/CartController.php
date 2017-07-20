<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Meal;
use Illuminate\Http\Request;
use App\Notifications\OrderPlaced;

class CartController extends Controller
{
    /**
     * Cart entity object.
     *
     * @var string
     **/
    protected $cart;

    /**
     * Create a controller instance.
     *
     * @param \App\Cart $cart
     **/
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = \Auth::user()->student->cart;

        return view('cart.cart', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request, Meal $meal)
    {
        $student = \Auth::user()->student;
        if ($student->cart()->where('meal_id', $meal->id)->count() == 0) {
            $student->cart()->create(['meal_id' => $meal->id]);
            session()->flash('messages', ['type' => 'success', 'title' => 'Request Successful', 'message' => "$meal->name was added to your cart"]);
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Cart $cart
     *
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request, Meal $meal)
    {
        $student = \Auth::user()->student;
        if ($student->cart()->where('meal_id', $meal->id)->count() == 1) {
            $student->cart()->where('meal_id', $meal->id)->delete();
            session()->flash('messages', ['type' => 'info', 'title' => 'Request Successful', 'message' => "The item $meal->name was removed from the cart"]);
        }

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Cart $cart
     *
     * @return \Illuminate\Http\Response
     */
    public function placeOrder(Request $request)
    {
        $student = \Auth::user()->student;
        $v = \Validator::make($request->all(), ['item' => 'required|array']);
        if ($v->fails()) {
            session()->flash('messages', ['type' => 'danger', 'title' => 'Request Failed', 'message' => 'An error was encountered while submiting your order']);

            return back();
        }
        $total = 0;
        $order = $student->orders()->create(['order_number' => strtoupper(str_random(7)), 'status' => 'Pending']);
        foreach ($request->get('item') as $key => $value) {
            $meal = Meal::findOrFail($key);
            $amount = $meal->price * $value;
            $items = [
                'meal_id' => $key,
                'qty' => $value,
                'price' => $meal->price,
            ];
            $total += $amount;
            $order->items()->create($items);
        }
        if ($account = $student->account) {
            if ($account->current_amount >= $total && $account->active) {
                return \DB::transaction(function () use ($student, $total, $order) {
                    $current = $student->account->current_amount - $total;
                    $student->account()->update(['current_amount' => $current]);
                    $order->update(['amount' => $total]);
                    $student->cart()->delete();

                    session()->flash('messages', ['type' => 'success', 'title' => 'Request Successful', 'message' => 'The order has been placed Successfuly, The order number has been sent to you..']);
                    $student->notify(new OrderPlaced($order));
                    return redirect()->route('meals.index');
                });
            }
        }
        $order->delete();
        session()->flash('messages', ['type' => 'danger', 'title' => 'Request Failed', 'message' => 'Please make sure that you have enough money in your account or the account is active']);

        return back();
    }
}
