<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserSession;
/**
 * @OA\Info(title="NeuroNation API", version="1.0")
 */

class SessionController extends Controller
{
     /**
     * Get session history for the user.
     *
     * @OA\Get(
     *     path="/api/users/{userId}/sessions/history",
     *     summary="Get session history for a user",
     *     tags={"User Sessions"},
     *     @OA\Parameter(
     *         name="userId",
     *         in="path",
     *         description="ID of the user",
     *         required=true,
     *         @OA\Schema(type="integer", default=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="history",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="score", type="integer", example=85),
     *                     @OA\Property(property="date", type="integer", example=1696963200)
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="User not found"
     *     )
     * )
     */
    public function getHistory($userId)
    {
        $history = UserSession::getSessionHistory($userId);
        return response()->json(['history' => $history]);
    }

     /**
     * Get categories for the user's last session.
     *
     * @OA\Get(
     *     path="/api/users/{userId}/sessions/lastest/categories",
     *     summary="Get categories for the user's last session",
     *     tags={"User Sessions"},
     *     @OA\Parameter(
     *         name="userId",
     *         in="path",
     *         description="ID of the user",
     *         required=false,
     *         @OA\Schema(type="integer", default=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful response",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="recently_trained",
     *                 type="string",
     *                 example="Recently trained: Memory, Concentration"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="User not found"
     *     )
     * )
     */
    public function getLastSessionCategories($userId = 1) // Default userId to 1
    {
        $categories = UserSession::getCategoriesForLastSession($userId);

        return response()->json([
            'recentlyTrained' => $categories
        ]);
    }
}
