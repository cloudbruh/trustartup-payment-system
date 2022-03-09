<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    /**
     * @OA\Get(
     *      path="/payment/sum",
     *      tags={"Payment"},
     *      summary="Get sum of payments",
     *   @OA\Parameter(
     *      name="user_id",
     *      in="query",
     *      description="User id",
     *   ),
     *   @OA\Parameter(
     *      name="startup_id",
     *      in="query",
     *      description="Startup id",
     *   ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/Payment"),
     *             )
     *          )
     *      )
     *  )
     */

    public function sum(Request $request)
    {
        $query = Payment::where('status', 'SUCCESS');
        if ($request->user_id)
            $query = $query->where('user_id', $request->user_id);
        if ($request->startup_id)
            $query = $query->where('startup_id', $request->startup_id);
        return response()->json($query->sum('amount'));
    }

    /**
     * @OA\Get(
     *      path="/payment",
     *      tags={"Payment"},
     *      summary="Get list of payments",
     *   @OA\Parameter(
     *      name="user_id",
     *      in="query",
     *      description="User id",
     *   ),
     *   @OA\Parameter(
     *      name="startup_id",
     *      in="query",
     *      description="Startup id",
     *   ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/Payment"),
     *             )
     *          )
     *      )
     *  )
     */

    public function show(Request $request)
    {
        $query = Payment::query();
        if ($request->user_id)
            $query = $query->where('user_id', $request->user_id);
        if ($request->startup_id)
            $query = $query->where('startup_id', $request->startup_id);
        return response()->json($query->get());
    }

    /**
     * @OA\Get(
     *      path="/payment/{id}",
     *      tags={"Payment"},
     *      summary="Get payment by ID",
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Payment id",
     *         required=true,
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(ref="#/components/schemas/Payment"),
     *      ),
     *      @OA\Response(response=404, description="Not Found")
     *  )
     */

    public function get($id, Request $request)
    {
        return response()->json(Payment::findOrFail($id));
    }

    /**
     * @OA\Post(
     *      path="/payment",
     *      tags={"Payment"},
     *      summary="Create payment",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Payment")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(ref="#/components/schemas/Payment"),
     *      )
     *  )
     */

    public function create(Request $request)
    {
        $payment = Payment::create($request->all());
        return response()->json($payment, 201);
    }

    /**
     * @OA\Put(
     *      path="/payment",
     *      tags={"Payment"},
     *      summary="Update payment",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Payment")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(ref="#/components/schemas/Payment"),
     *               ),
     *      @OA\Response(response=404, description="Not Found")
     *  )
     */

    public function update(Request $request)
    {
        $payment = Payment::findOrFail($request->id);
        $payment->update($request->all());
        return response()->json($payment, 200);
    }

    /**
     * @OA\Delete(
     *      path="/payment",
     *      tags={"Payment"},
     *      summary="Delete payment",
     *      @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="Payment id",
     *         required=true,
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *      ),
     *      @OA\Response(response=404, description="Not Found")
     *  )
     */

    public function delete($id, Request $request)
    {
        Payment::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Deleted Successfully',
        ], 200);
    }

    /**
     * @OA\Get(
     *      path="/payment/{id}/link",
     *      tags={"User"},
     *      summary="Get payment link",
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Payment id",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *         )
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(
     *              type="string",
     *          ),
     *      ),
     *      @OA\Response(response=404, description="Not Found")
     *  )
     */

    public function link(Request $request)
    {
        $link = 'example link';
        return response()->json($link, 200);
    }
}
