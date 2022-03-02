<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Payment",
 *     description="Payment model",
 *     @OA\Xml(
 *         name="Payment"
 *     )
 * )
 */
class Payment extends Model
{

    /**
     * @OA\Property(
     *     title="id",
     *     description="id",
     *     example=1
     * )
     * @var integer
     */

    private $id;

    /**
     * @OA\Property(
     *     title="user_id",
     *     description="user_id",
     *     example=1
     * )
     * @var integer
     */

    private $user_id;

    /**
     * @OA\Property(
     *     title="startup_id",
     *     description="startup_id",
     *     example=1
     * )
     * @var integer
     */

    private $startup_id;

    /**
     * @OA\Property(
     *     title="amount",
     *     description="amount",
     *     example=1.5
     * )
     * @var float
     */

    private $amount;

    /**
     * @OA\Property(
     *     title="status",
     *     description="status",
     *     example="CREATED"
     * )
     * @var string
     */

    private $status;

    /**
     * @OA\Property(
     *     title="created_at",
     *     description="created_at",
     *     example="2022-01-22T21:34:30.000000",
     *     format="datetime",
     *     type="string"
     * )
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="updated_at",
     *     description="updated_at",
     *     example="2022-01-22T21:34:30.000000",
     *     format="datetime",
     *     type="string"
     * )
     */
    private $updated_at;

    protected $fillable = [
        'user_id', 'startup_id', 'amount', 'status'
    ];
}
