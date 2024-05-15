<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="w-96 h-96 px-96 py-52 bg-neutral-50 justify-center items-center inline-flex">
        <div class="self-stretch flex-col justify-start items-center gap-12 inline-flex">
            <div class="w-44 relative">
                <div class="w-10 h-10 p-1 left-0 top-0 absolute justify-center items-center inline-flex"></div>
            </div>
            <div class="h-96 bg-white rounded-xl flex-col justify-start items-start flex">
                <div class="self-stretch h-96 p-10 flex-col justify-start items-start gap-10 flex">
                    <div class="self-stretch h-20 flex-col justify-start items-start gap-2 flex">
                        <div class="self-stretch text-zinc-800 text-3xl font-bold font-['Instrument Sans'] leading-10">Login</div>
                        <div class="self-stretch text-neutral-500 text-base font-normal font-['Instrument Sans'] leading-normal">Add your details below to register</div>
                    </div>
                    <form method="POST" action="{{ route('login') }}" class="self-stretch h-72 flex-col justify-start items-start gap-6 flex">
                        @csrf
                        <div class="flex-col justify-start items-start gap-1 flex">
                            <label for="email" class="w-96 text-zinc-800 text-xs font-normal font-['Instrument Sans'] leading-none">Email address</label>
                            <input type="email" name="email" id="email" class="w-96 px-4 py-3 bg-white rounded-lg border border-zinc-300 justify-start items-center gap-3 inline-flex" placeholder="e.g. alex@email.com">
                        </div>
                        <div class="flex-col justify-start items-start gap-1 flex">
                            <label for="password" class="w-96 text-zinc-800 text-xs font-normal font-['Instrument Sans'] leading-none">Password</label>
                            <input type="password" name="password" id="password" class="w-96 px-4 py-3 bg-white rounded-lg border border-zinc-300 justify-start items-center gap-3 inline-flex" placeholder="Enter your password">
                        </div>
                        <button type="submit" class="self-stretch h-11 px-7 py-2.5 bg-violet-600 rounded-lg flex-col justify-center items-center gap-2 flex">
                            <span class="text-white text-base font-semibold font-['Instrument Sans'] leading-normal">Register</span>
                        </button>
                    </form>
                    <div class="self-stretch text-center"><span class="text-neutral-500 text-base font-normal font-['Instrument Sans'] leading-normal">Already have an account? </span><a href="{{ route('login') }}" class="text-violet-600 text-base font-normal font-['Instrument Sans'] leading-normal">Login</a></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>