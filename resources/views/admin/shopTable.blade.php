<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('user Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <x-auth-session-status class="mb-4" :status="session('message')" />
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                            <th scope="col">SI.NO</th>
                            <th scope="col">Shop Name</th>
                            <th scope="col">Location</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shops as $shop)
                            <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$shop->shop_name}}</td>
                            <td>{{$shop->location}}</td>
                            <td>{{$shop->contact}}</td>
                            <td>{{$shop->status}}</td>
                            <td>
                                <a class="btn btn-warning" href="{{route('updateStatus',$shop->id)}}" role="button">Update status</a>
                                @if($shop-> status == 'Approved')
                                <a class="btn btn-success"  href="{{route('saveBtn',$shop->id)}}" role="button">Save</a>
                                @else
                                <a class="btn btn-success"  href="{{route('saveBtn',$shop->id)}}" role="button" hidden>Save</a>
                                @endif
                                <a class="btn btn-danger" href="{{route('deleteShop',$shop->id)}}" role="button">Delete Shop</a>
                            </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    
</body>
</html>