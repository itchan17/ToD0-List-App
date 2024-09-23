<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
</head>

<body class="flex justify-center items-center">

    <div class="flex flex-col mt-32 ">
        <div class="flex space-x-2 items-center mb-5">
            <a href="{{ route('displayTask') }}" class="">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 12h14M5 12l4-4m-4 4 4 4" />
                </svg>

            </a>
            <h1 class="text-2xl font-bold">EDIT TASK</h1>
        </div>
        <form action="{{ route('update', ['taskId' => $task->id]) }}" method="post">
            @csrf
            <div class="flex space-x-1">
                <input value="{{ $task->task }}" name="task"
                    class="border-2 w-96 px-2 py-2 border-[#6C63FF] rounded-sm" placeholder="Add new task"
                    type="text">
                <button type="submit" class="bg-[#6C63FF] px-4 py-2 rounded-sm text-white font-bold">UPDATE</button>
            </div>

            @error('task')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </form>





    </div>
</body>

</html>
