<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $users = Http::get("https://test.conectadosweb.com.co/users/eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9eyJ0ZXN0IjozMjE0MTIsInVzZXIiOiJmM3IyIn0NcPLPRLSvfszQwtxZLyypsm3Y56ELRdppqYXDv2Hagk/")->json();

        // Ordenado descendiente
        usort($users, function ($a, $b) {
            return $a['created_at'] > $b['created_at'] ? -1 : 1;
        });

        return view("home", compact("users"));
    }
    
    public function show($client_id)
    {
        $transactions = Http::get("https://test.conectadosweb.com.co/users/eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9eyJ0ZXN0IjozMjE0MTIsInVzZXIiOiJmM3IyIn0NcPLPRLSvfszQwtxZLyypsm3Y56ELRdppqYXDv2Hagk/transaction/{$client_id}")->json();
        
        // Ordenado descendiente
        usort($transactions, function ($a, $b) {
            return $a['created_at'] > $b['created_at'] ? -1 : 1;
        });
        
        return view("transactions", compact("transactions"));
    }
}
