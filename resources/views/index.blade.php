<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>To Do List - Laravel</title>
        @vite('resources/css/app.css')

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        
    </head>
    <body class="antialiased bg-gray-100">
        <!-- component -->
        <form action="{{ route('addTask') }}" method="POST">
            @csrf
            <div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans">
                <div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
                    <div class="mb-4 ng">
                        <div>
                            <p class="text-grey-darkest text-3xl text-center">To Do List</p>
                            <p class="text-center text-gray-500 text-md">by <a class="text-blue-500" target="_blank" href="https://www.instagram.com/_mikaer/">@_mikaer</a></p>
                        </div>
                        <div class="flex mt-4">
                            <input name="taskname" class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker" placeholder="Add Todo">
                            <button type="submit"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add</button>
                        </div>
                    </div>
                    <div>
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th>Task</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($taskList as $task)
                                    <tr>
                                        <td class="w-[350px] md:w-[530px] lg:w-[330px]">
                                            <p class="w-full text-grey-darkest {{ $task->status === 'done' ? 'line-through text-green-500' : '' }}">{{ $task->task_name }}</p>
                                        </td>
                                        <td class="p-2">
                                            @if ($task->status === 'done')
                                            <a href="{{ route('undoTask', $task->id) }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-1 px-3 rounded"><i class="fa fa-times text-xs" aria-hidden="true" title="Undo"></i></a>
                                            @else
                                                <a href="{{ route('doneTask', $task->id) }}" class="bg-green-400 hover:bg-green-500 text-white font-bold py-1 px-3 rounded"><i class="fa fa-check text-xs" aria-hidden="true" title="Done"></i></a>
                                            @endif
                                            
                                            <a href="{{ route('updateTask', $task->id) }}"  class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-1 px-3 rounded {{ $task->status === 'done' ? 'opacity-50 cursor-not-allowed pointer-events-none' : '' }}" title="Update"><i class="fa fa-pen text-xs" aria-hidden="true"></i></a>
                                            <a href="{{ route('deleteTask', $task->id) }}"  class="bg-red-400 hover:bg-red-500 text-white font-bold py-1 px-3 rounded" title="Delete"><i class="fa fa-trash text-xs" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
