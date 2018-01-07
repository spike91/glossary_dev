<!doctype html>
<html>
    <head>
        <metacharset="utf-8">
        <metaname="viewport"content="width=device-width, initial-scale=1">
        <title>Categories</title>
    </head>
    <body>
        <table>
            <thead>
                <tr><th>Category</th></tr>
            </thead>
            <tbody>
            @foreach ($categories as $c)
            <tr>
                <td>{{$c->english}}</td>
                <td>{{$c->estonian}}</td>
                <td>{{$c->russian}}</td>
            </tr>@endforeach</tbody>
            </table>
    </body>
</html>
