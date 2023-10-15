<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shop Table status checker') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('updated')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="shopid" name="id"value="{{$shops->id}}">
                            <label for="shopname" class="form-label">Shop Name</label>
                            <input type="text" class="form-control" id="shopname" name="shopname"value="{{$shops->shop_name}}" disabled readonly/>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location"value="{{$shops->location}}" disabled readonly/>

                        </div>
                        <div class="mb-3">
                            <label for="ownername" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="owner" name="number"value="{{$shops->contact}}" disabled readonly/>
                        </div>
                        <div class="mb-3">
                        <label for="ownername" class="form-label">Status</label>
                            <input type="text" class="form-control" id="owner" name="status"value="{{$shops->status}}">
                        </div>
                        <div>
                        <button type="submit" class="btn btn-primary mb-3">Change the status</button>
                        </div>
                    </form>
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
