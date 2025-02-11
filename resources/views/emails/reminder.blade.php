<!DOCTYPE html>
<html>
<head>
    <title>Reminder: {{ $todo->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        p {
            font-size: 16px;
            color: #555;
            line-height: 1.5;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            color: #888;
            margin-top: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Reminder: {{ $todo->title }}</h1>
        <p><strong>Description:</strong> {{ $todo->description }}</p>
        <p>This is a reminder for your task scheduled on <strong>{{ \Carbon\Carbon::parse($todo->due_time)->format('d M, Y h:i A') }}</strong>.</p>
        
        <div style="text-align: center;">
            <a href="{{ $taskUrl }}" class="button">View Task</a>
        </div>

        <div class="footer">
            <p>Thank you for using our To-Do App!</p>
        </div>
    </div>
</body>
</html>