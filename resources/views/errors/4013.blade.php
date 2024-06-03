<!DOCTYPE html>
<html>

<head>
    <title>403 Forbidden</title>
</head>

<body>
    <div class="ms-3 relative">
                <div class="w-64">
                    @foreach (Auth::user()->allTeams() as $team)
                    <x-switchable-team :team="$team" />
                    @endforeach
                </div>
    </div>
</body>

</html>