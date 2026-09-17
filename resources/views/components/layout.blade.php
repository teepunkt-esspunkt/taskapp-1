@props(['title' => 'TaskApp'])

<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - TaskApp</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-base-200 text-base-content antialiased">
    <x-nav />
    @auth
    <div style="width:50%;margin:10px auto;padding:10px;background-color:#b8e0c0;">    
       <h2 class="font-bold mb-4 text-lg">Benachrichtigungen</h2>
       @if(auth()->user()->unreadNotifications->count() > 0)
           <ul class="list-disc pl-10">
           @foreach(auth()->user()->unreadNotifications as $notification)
               {{--@dd($notification->id)--}}
               <li><a href="{{ $notification->data['url'] }}" class="underline hover:no-underline">
                {{$notification->data['message']}} - {{$notification->data['title']}} </a>
                <a href="/notifications/{{ $notification->id }}" class="underline text-red-800 ml-5">Entfernen</a> 
               </li>
           @endforeach
           </ul>
       @else
          <p>Keine Benachrichtigungen!</p>
       @endif
    </div>    
    @endauth
    <main class="mx-auto max-w-5xl px-4 py-8">
        @if(session('success'))
            <div class="alert alert-success mb-6">
                {{ session('success') }}
            </div>
        @endif
        {{ $slot }}
    </main>

</body>
</html>