<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <table style="height: fit-content;width: fit-content;border: 1px solid black;">
        <tr>
          <th style="font-size: 25px">Name</th>
          <th style="font-size: 25px">author_name</th>
          <th style="font-size: 25px">description</th>
        </tr>
           
        <tr>
            <td>{{ $book->name }}</td>
            <td>{{ $book->author->name }}</td>
            <td>{{ $book->description }}</td>
        </tr>

      </table>
</body>
</html>