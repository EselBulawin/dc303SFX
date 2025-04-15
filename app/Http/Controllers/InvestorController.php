<?php

namespace App\Http\Controllers;

use App\Models\Investor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InvestorController extends Controller
{
    public function index()
    {
        $investors = Investor::orderBy('last_name')
            ->paginate(10)
            ->withQueryString();

        return inertia('Investor/Index', [
            'investors' => $investors,
        ]);
    }

    public function create()
    {
        $investmentTypes = ['micro', 'sponsor', 'benefactor'];
        return inertia('Investor/Create', [
            'investmentTypes' => $investmentTypes,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'investment_type' => ['required', Rule::in(['micro', 'sponsor', 'benefactor'])],
        ]);

        Investor::create($validated);

        return redirect()->route('investors.index')->with('success', 'Investor created successfully.');
    }
}
