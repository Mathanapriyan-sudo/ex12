<!DOCTYPE html>
<html>

<head>
    <title>Library Book Management</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #74ebd5, #9face6);
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            margin: 40px auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        h1 {
            text-align: center;
            color: #0d47a1;
        }

        p {
            text-align: center;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            overflow: hidden;
            border-radius: 8px;
        }

        th {
            background: #1565c0;
            color: white;
            padding: 12px;
            font-size: 16px;
        }

        td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #e3f2fd;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }

        tr:hover {
            background-color: #bbdefb;
            transition: 0.3s;
        }

        .price {
            color: #2e7d32;
            font-weight: bold;
        }

        .category {
            background: #ffcc80;
            color: #e65100;
            font-weight: bold;
            border-radius: 5px;
            padding: 5px 10px;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            background: #1565c0;
            color: white;
            padding: 12px;
            border-radius: 8px;
            font-weight: bold;
        }

        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>📚 Library Book Details</h1>
    <p>Welcome to the Library Book Management System</p>

    <?php

    if (!file_exists("books.xml")) {
        die("<h3 class='error'>Error: books.xml file not found.</h3>");
    }

    $xml = simplexml_load_file("books.xml");

    if ($xml === false) {
        die("<h3 class='error'>Error: Unable to load XML file.</h3>");
    }

    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>
            <th>Price</th>
            <th>Category</th>
          </tr>";

    foreach ($xml->book as $book) {
        echo "<tr>";
        echo "<td>$book->id</td>";
        echo "<td>$book->title</td>";
        echo "<td>$book->author</td>";
        echo "<td>$book->year</td>";
        echo "<td class='price'>$$book->price</td>";
        echo "<td><span class='category'>$book->category</span></td>";
        echo "</tr>";
    }

    echo "</table>";
    ?>

    <div class="footer">
        Total Books: <?php echo count($xml->book); ?>
    </div>

</div>

</body>
</html>