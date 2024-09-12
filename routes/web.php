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


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['role:admin', 'auth', 'verified'])->prefix('admin')->as('admin.')->group(function () {
    Route::view('dashboard', 'dashboard')
        ->name('dashboard');
    Route::get('/elections', ElectionManage::class)->name('elections');
    Route::get('/candidates', CandidateManage::class)->name('candidates');
    Route::get('/elections/{electionId}/ballots', BallotList::class)->name('elections.ballots');
});

Route::middleware(['role:voter'])->prefix('voter')->as('voter.')->group(function () {
    Route::get('/dashboard', function () {
        return view('voterdashboard');
    })->name('voterdashboard');

    Route::get('/elections', ElectionList::class)->name('elections');
    Route::get('/vote/{electionId}', VoteCast::class)->name('vote');
    // Route::get('/elections', ElectionList::class);
    Route::get('/elections/{electionId}/candidates', CandidateList::class)->name('elections.candidates');
    // Route::get('/elections/{electionId}/vote', VoteCast::class);
    Route::get('/elections/{electionId}/results', ElectionResults::class)
        ->name('election.results');
});

// Route::get('/elections/{electionId}/results', ElectionResult::class);
// Define a route for election results

Route::middleware('auth')->group(function () {
    Route::get('/elections/{electionId}/vote', VoteCast::class)->name('elections.vote');
});




require __DIR__ . '/auth.php';
