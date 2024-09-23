<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{ env('APP_NAME') }}</title>
</head>

<body class="flex justify-center items-center">
    @props(['taskList', 'message'])

    <div class="flex flex-col mt-32">
        <h1 class="text-2xl font-bold mb-5">TO DO LIST APP</h1>
        <form action="{{ route('addTask') }}" method="post">
            @csrf
            <div class="flex space-x-1">
                <input name="task" class="border-2 w-96 px-2 py-2 border-[#6C63FF] rounded-sm"
                    placeholder="Add new task" type="text">
                <button type="submit" class="bg-[#6C63FF] px-4 py-2 rounded-sm text-white font-bold">ADD</button>
            </div>

            @error('task')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
            @if (session('success'))
                <div class="text-blue-500">{{ session('success') }}</div>
            @elseif (session('delete'))
                <div class="text-red-500">{{ session('delete') }}</div>
            @elseif (session('message'))
                <div class="text-blue-500">{{ session('message') }}</div>
            @endif
        </form>

        <div class=" mt-10 px-3 h-80 overflow-y-auto">
            @foreach ($taskList as $task)
                <div class="border-b-2 py-2 flex justify-between items-center">
                    <span class="text-[#6C63FF] font-semibold">{{ $loop->index + 1 }}.</span>
                    <p class="w-[300px] break-words text-[#6C63FF] font-medium">{{ $task->task }}</p>
                    <div class="flex font-semibold space-x-1 text-white">
                        <a href="{{ route('edit', ['taskId' => $task->id]) }}"
                            class="px-2 py-1 text-xs bg-blue-500 rounded-[4px]" href="">EDIT</a>
                        <a href="{{ route('remove', ['taskId' => $task->id]) }}"
                            class="px-2 py-1 text-xs bg-red-500 rounded-[4px]" href="">DELETE</a>
                    </div>
                </div>
            @endforeach
        </div>




    </div>
</body>

</html>
