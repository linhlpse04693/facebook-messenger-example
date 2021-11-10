<?php

namespace App\Http\Controllers;

use App\Services\Conversation\ConversationServiceInterface;

class HomeController extends Controller
{
    protected ConversationServiceInterface $conversationService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ConversationServiceInterface $conversationService)
    {
        $this->middleware('auth');
        $this->conversationService = $conversationService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $conversations = $this->conversationService->paginate(20);

        return view('home', compact('conversations'));
    }
}
