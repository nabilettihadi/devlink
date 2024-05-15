<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
  <h1 class="text-3xl font-bold mb-4">Links</h1>

  @if (count($links) > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
      @foreach ($links as $link)
        <div class="bg-white rounded shadow-md p-4">
          <h3 class="text-xl font-bold mb-2">{{ $link->title }}</h3>
          <a href="{{ $link->url }}" target="_blank" class="text-blue-500 hover:underline">{{ $link->url }}</a>
        </div>
      @endforeach
    </div>
  @else
    <p class="text-gray-500">No links found</p>
  @endif

</body>
</html>

