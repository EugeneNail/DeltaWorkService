<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserServiceRequest;
use App\Models\Service;
use App\Models\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UserServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Нужно отдать фронту список ($userServices) услуг конкретного пользователя вместе с услугами из админки
        // (таблицы: users, user_services, users)

        return Inertia::render('User/Services'); // в метод render передать данные
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Нужно отдать фронту список, отобранных по языку услуг ($services) из админки
        // (таблица: services)

        $services = Service::all()->map(fn ($service) => $service->localized());
        return Inertia::render('User/EditService', compact('services')); // в метод render передать данные ($services)
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserServiceRequest $request)
    {
        // Валидация нужных полей (смотреть в таблице user_services) и запись в БД

        UserService::query()->create($request->validated() + [
            'user_id' => $request->user()->id
        ]);

        return Redirect::route('user.services')->with([
            'message' => trans('service.created'),
        ]);;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // не трогать!
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Нужно отдать фронту список, отобранных по языку услуг ($services) из админки и услугу пользователя, которую мы обновляем
        // (таблица: services, user_services)
        return Inertia::render('User/EditService'); // в метод render передать данные ($services, $userServices)

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserService $service)
    {
        // Валидация нужных полей (смотреть в таблице user_services) и запись в БД

        return Redirect::route('user.services.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        // Удаляем запись в бд
    }
}
