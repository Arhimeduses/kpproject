<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id', // Идентификатор заказа
        'cost', // Стоимость заказа
        'service_type', // Тип услуги
        'status', // Статус заказа
        'begin_date', // Дата начала
        'end_date', // Дата окончания
     "employee":
     {
      "name", // Имя сотрудника
      "surname", // Фамилия сотрудника
      "role", // Роль сотрудника
      "grade" // Оценка сотрудника
     }
    ];

    // Дополнительная логика и отношения могут быть добавлены здесь

    /**
     * Get the employee associated with the order.
     */
    public function employee()
    {
        return $this->hasOne(Employee::class, 'id', 'employee_id');
    }
}
