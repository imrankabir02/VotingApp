<?php

use App\Livewire\Admin\CandidateManage;
use App\Livewire\Admin\ElectionManage;
use App\Livewire\BallotList;
use App\Livewire\CandidateList;
use App\Livewire\ElectionList;
use App\Livewire\ElectionResults;
use App\Livewire\VoteCast;
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::prefix('admin')->group(function () {
    Route::get('/elections', ElectionManage::class)->name('admin.elections');
    Route::get('/candidates', CandidateManage::class)->name('admin.candidates');
});
Route::get('/elections', ElectionList::class);
Route::get('/elections/{electionId}/candidates', CandidateList::class);
Route::get('/elections/{electionId}/ballots', BallotList::class);
Route::get('/elections/{electionId}/vote', VoteCast::class);
// Route::get('/elections/{electionId}/results', ElectionResult::class);
// Define a route for election results
Route::get('/elections/{electionId}/results', ElectionResults::class)
    ->name('election.results');

Route::middleware('auth')->group(function () {
    Route::get('/elections/{electionId}/vote', VoteCast::class)->name('elections.vote');
});




require __DIR__ . '/auth.php';
