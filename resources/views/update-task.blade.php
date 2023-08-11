<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite('resources/css/app.css')
        
    </head>
    <body class="antialiased">
        <!-- component -->
        <form action="{{ route('saveTask') }}" method="POST">
            @csrf
            <div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
                <div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
                    <div class="mb-4 ng">
                        <div>
                            <p class="text-grey-darkest text-3xl text-center">To Do List</p>
                            <p class="text-center text-gray-500 text-md">by <a class="text-blue-500" target="_blank" href="https://www.instagram.com/_mikaer/">@_mikaer</a></p>
                        </div>
                        <div class="flex mt-4">
                            <input type="hidden" name="id" value="{{ $task->id }}">
                            <input name="updatetask" class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker" value="{{ $task->task_name }}" placeholder="Update Task">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
