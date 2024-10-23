<p style="padding: 10px;
    background: red;
    font-size: 15px;
    color: black;
    font-weight: 600;
    border-radius: 5px">Trial ends in {{ \Carbon\Carbon::now()->diffInDays(Auth::user()->trial_ends_at) }} days! <a style="text-decoration: underline;
    font-weight: 600;
    color: blue;
    font-size: 14px;" href="{{ url('add_a_card') }}">add a card</a></p>