
<x-layout>
    <x-slot:heading>
        Product List
    </x-slot>
    <x-table>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product</th>
                <th scope="col">Category</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product['id'] }}</th>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['category'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
</x-layout>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Try</title>
</head>
<body>
    <p>Products:</p>
    <table>
        <thead>
            <tr>
                @foreach (['id', 'name', 'category'] as $column)
                <td>{{$column}}</td>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product['id'] }}</td>
                <td>{{ $product['name'] }}</td>
                <td>{{ $product['category'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p>Tasks:</p>
    <ul>
        @foreach ($tasks as $task)
        <li>{{ $task }}</li>
        @endforeach
    </ul>

    <p>Global Variables:</p>
    <p>{{ $sharedVariable }}</p>

    <p>Product Key: {{ $productKey }}</p>
</body>
</html> -->