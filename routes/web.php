<?php

use App\Livewire\VoteCast;
use App\Livewire\BallotList;
use App\Livewire\ElectionList;
use App\Livewire\CandidateList;
use App\Livewire\ElectionResult;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/elections', ElectionList::class);
Route::get('/elections/{electionId}/candidates', CandidateList::class);
Route::get('/elections/{electionId}/ballots', BallotList::class);
Route::get('/elections/{electionId}/vote', VoteCast::class);
Route::get('/elections/{electionId}/results', ElectionResult::class);
