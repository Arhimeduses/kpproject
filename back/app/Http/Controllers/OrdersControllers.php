<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    /**
     * Получение списка всех заказов в формате JSON.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $orders = Order::all();

        return response()->json($orders, 200);
    }

    /**
     * Получение информации о конкретном заказе в формате JSON.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['error' => 'Заказ не найден.'], 404);
        }

        return response()->json($order, 200);
    }

    /**
     * Создание нового заказа.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        // Ваша логика для создания нового заказа на основе данных из $request

        return response()->json(['message' => 'Заказ успешно создан.'], 201);
    }

    /**
     * Обновление информации о заказе.
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     */
    public function update($id, Request $request)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['error' => 'Заказ не найден.'], 404);
        }

        // Ваша логика для обновления информации о заказе на основе данных из $request

        return response()->json(['message' => 'Заказ успешно обновлен.'], 200);
    }

    /**
     * Удаление заказа.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['error' => 'Заказ не найден.'], 404);
        }

        // Ваша логика для удаления заказа

        return response()->json(['message' => 'Заказ успешно удален.'], 200);
    }
}
