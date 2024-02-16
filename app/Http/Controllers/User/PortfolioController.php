<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeletePortfolioRequest;
use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Нужно отдать фронту список ($portfolios) всех портфолио конкретного пользователя вместе с услугами из админки
        // (таблицы: users, user_services, users)

        $portfolios = Portfolio::where('user_id', request()->user()->id)->get();

        return Inertia::render('User/Portfolio/index', compact('portfolios'));// в метод render передать данные
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Нужно отдать фронту список услуг ($services) из админки
        // (таблица: services)

        $services = Service::all()->map(fn ($service) => $service->localized());

        return Inertia::render('User/Portfolio/EditPortfolio', compact('services')); // в метод render передать данные ($services)
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePortfolioRequest $request)
    {
        // Валидация нужных полей (смотреть в таблице portfolios) и запись в БД

        $photo = $request->file('photo');
        $name = uniqid() . '.' . $photo->getClientOriginalExtension();
        $photo->storeAs('public', $name);

        $data = $request->validated();
        Portfolio::create([
            'user_id' => $request->user()->id,
            'service_name' => Service::find($data['service_id'])->name,
            'photo' => asset('storage/' . $name)
        ] + $data);

        return Redirect::route('user.portfolio.index');
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
    public function edit(Portfolio $portfolio)
    {
        // Нужно отдать фронту список, отобранных по языку услуг ($services) из админки и портфолио пользователя, которое мы обновляем
        // (таблица: services, portfolios)

        $services = Service::all()->map(fn ($service) => $service->localized());

        return Inertia::render('User/Portfolio/EditPortfolio', compact('services', 'portfolio')); // в метод render передать данные ($services, $portfolio)
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
    {
        // Валидация нужных полей (смотреть в таблице portfolios) и запись в БД
        $portfolio->fill($request->except('photo'));

        if($request->hasFile('photo')) {
            $name = $this->savePhoto($request);
            $this->deletePhoto($portfolio);
            $portfolio->photo = asset('storage/' . $name);
        }

        $portfolio->save();

        return Redirect::route('user.portfolio.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeletePortfolioRequest $request, Portfolio $portfolio)
    {
        $portfolio->delete();
        $this->deletePhoto($portfolio);

        return Redirect::route('user.portfolio.index');
    }


    private function savePhoto(Request $request): string {
        $photo = $request->file('photo');
        $name = uniqid() . '.' . $photo->getClientOriginalExtension();
        $photo->storeAs('public', $name);

        return $name;
    }


    private function deletePhoto(Portfolio $portfolio) {
        $fileToDelete = str_replace(asset('storage/').'/', '', $portfolio->photo);
        Storage::disk('public')->delete($fileToDelete);
    }
}
