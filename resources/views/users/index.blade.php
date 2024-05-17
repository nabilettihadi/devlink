<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkShare</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex justify-between items-center">

            <a href="#" class="text-white font-semibold text-lg">LinkShare</a>

            <div class="md:hidden">
                <button id="burgerBtn" class="text-white focus:outline-none">
                    <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M2 5a1 1 0 0 1 1-1h18a1 1 0 1 1 0 2H3a1 1 0 0 1-1-1zm0 8a1 1 0 1 1 0-2h18a1 1 0 1 1 0 2H3a1 1 0 0 1 0-2zm0 8a1 1 0 1 1 0-2h18a1 1 0 1 1 0 2H3a1 1 0 0 1 0-2z" />
                    </svg>
                </button>
            </div>

            <ul id="navLinks" class="hidden md:flex space-x-4">
                @if (Auth::check())
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="bg-white-500">Déconnexion</a>
                @else
                    <a href="{{ route('login') }}" class="btn bg-green-500 hover:bg-green-600">Login</a>
                    <a href="{{ route('register') }}" class="btn bg-green-500 hover:bg-green-600 ml-4">Register</a>
                @endif
            </ul>
        </div>
    </nav>


    <div class="container mx-auto px-4 py-8 grid grid-cols-1 md:grid-cols-2 gap-8">

        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">User Information</h2>
            <div class="mb-4">
                <p class="text-lg font-semibold">Username:</p>
                <p class="text-lg text-blue-500">{{ $user->name }}</p>
                <p class="text-lg font-semibold">Email:</p>
                <p class="text-lg text-blue-500">{{ $user->email }}</p>
            </div>
            <h2 class="text-xl font-semibold mb-4">User's Links</h2>
            <div id="userLinks">
                @foreach ($links as $link)
                    <div class="bg-gray-200 rounded-lg p-3 mb-2">
                        <p class="text-lg font-semibold">{{ $link->platform->name }}</p>
                        <a href="{{ $link->url }}" target="_blank"
                            class="text-sm text-blue-500 hover:underline">{{ $link->url }}</a>

                        <a href="#"
                            onclick="editLink('{{ $link->id }}', '{{ $link->platform_id }}', '{{ $link->url }}')"
                            class="text-sm text-green-500 hover:underline ml-2">Edit</a>

                        <form action="{{ route('links.destroy', $link) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm text-red-500 hover:underline ml-2">Delete</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
        
        <!-- Right Section -->
        <div id="formSection" class="bg-white rounded-lg shadow-md p-6" style="display: none;">
            <div id="addLinkFormContainer">
                <h2 class="text-xl font-semibold mb-4">Add New Link</h2>
                <form id="addLinkForm" action="{{ route('links.store') }}" method="POST" class="mb-4">
                    @csrf
                    <div class="mb-4">
                        <label for="platform_id" class="block text-sm font-medium text-gray-700">Platform</label>
                        <select name="platform_id" id="platform_id"
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                            required>
                            @foreach ($platforms as $platform)
                                <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
                        <input type="url" name="url" id="url"
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                            required>
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-500 text-white font-bold rounded-lg py-2 hover:bg-blue-600">Add
                        Link</button>
                </form>
            </div>

            <div id="editLinkFormContainer" style="display: none;">
                <h2 class="text-xl font-semibold mb-4">Edit Link</h2>
                <form id="editLinkForm{{ $link->id }}" action="{{ route('links.update', ['link' => $link->id]) }}"
                    method="POST" class="mb-4">
                    @csrf


                    <div class="mb-4">
                        <label for="edit_platform_id" class="block text-sm font-medium text-gray-700">Platform</label>
                        <select name="platform_id" id="edit_platform_id"
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                            required>
                            @foreach ($platforms as $platform)
                                <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="edit_url" class="block text-sm font-medium text-gray-700">
                            <input type="url" name="url" id="edit_url"
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                            required>
                    </div>
                    
                    <button type="submit"
                        class="w-full bg-blue-500 text-white font-bold rounded-lg py-2 hover:bg-blue-600">Save
                        Changes</button>
                </form>
            </div>


        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const formSection = document.getElementById('formSection');
            const addLinkFormContainer = document.getElementById('addLinkFormContainer');
            const editLinkFormContainer = document.getElementById('editLinkFormContainer');
            const editLinkForm = document.getElementById('editLinkForm');
            const editPlatformId = document.getElementById('edit_platform_id');
            const editUrl = document.getElementById('edit_url');
            let currentLinkId = null;

            window.editLink = function(id, platform, url) {
                currentLinkId = id;
                editPlatformId.value = platform;
                editUrl.value = url;
                formSection.style.display = 'block';
                addLinkFormContainer.style.display = 'none';
                editLinkFormContainer.style.display = 'block';

                
                const platformOption = editLinkForm.querySelector(`option[value="${platform}"]`);
                platformOption.selected = true;
            };


            function submitEditForm(linkId) {
                const form = document.getElementById(`editLinkForm${linkId}`);
                const formData = new FormData(form);
                formData.append('link_id', linkId);

                fetch(`/links/${linkId}/update`, {
                    method: 'POST',
                    body: formData
                }).then(response => {
                    if (response.ok) {
                        window.location.reload();
                    }
                });
            }

        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const formSection = document.getElementById('formSection');
            const addLinkFormContainer = document.getElementById('addLinkFormContainer');
            const editLinkFormContainer = document.getElementById('editLinkFormContainer');

            function switchToAddForm() {
                formSection.style.display = 'block';
                addLinkFormContainer.style.display = 'block';
                editLinkFormContainer.style.display = 'none';
            }

            switchToAddForm();

            const addLinkBtn = document.getElementById('addLinkBtn');
            addLinkBtn.addEventListener('click', function(event) {
                event.preventDefault();
                switchToAddForm();
            });

            
            const burgerBtn = document.getElementById('burgerBtn');
            const navLinks = document.getElementById('navLinks');

            burgerBtn.addEventListener('click', function() {
                navLinks.classList.toggle('hidden');
            });
        });
    </script>

</body>

</html>
