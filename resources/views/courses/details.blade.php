<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Learn English</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #ffffff;
    }

    .header {
      background-color: #3D8577;
      color: white;
      padding: 20px;
      text-align: center;
    }

    .header h1 {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
    }

    .roadmap-container {
      max-width: 800px;
      margin: 40px auto;
      padding: 20px;
    }

    .level-card {
      background-color: white;
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 20px;
      display: flex;
      gap: 20px;
    }

    .flag-container {
      width: 100px;
      height: 100px;
      background-color: #f0f0f0;
      border-radius: 10px;
      overflow: hidden;
    }

    .flag {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .level-content {
      flex: 1;
    }

    .level-content h2 {
      color: #333;
      margin-bottom: 15px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .level-content ul {
      list-style: none;
      margin-bottom: 15px;
    }

    .level-content li {
      margin-bottom: 5px;
      color: #666;
    }

    .learn-button {
      background-color: #3D8577;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .learn-button:hover {
      background-color: #2c6358;
    }

    .arrow {
      text-align: center;
      font-size: 24px;
      color: #3D8577;
      margin: 20px 0;
    }

    .target-icon {
      font-size: 20px;
    }
  </style>
</head>

<body>
  <header class="header">
    <h1>
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M12 4L3 7V20L12 23L21 20V7L12 4Z" stroke="white" stroke-width="2" />
        <path d="M12 4V23" stroke="white" stroke-width="2" />
      </svg>
      Learn English
    </h1>
  </header>

  <div class="roadmap-container">
    @foreach($courses as $course)
      @foreach($course['courses'] as $c)
      <div class="level-card">
        <div class="flag-container">
        <img src="england-flag.png" alt="English Flag" class="flag">
        </div>
        <div class="level-content">
        <h2><span class="target-icon">🎯</span>{{$c['name']}}</h2>
        <p>Rp{{ number_format($c['price'], 0, ',', '.') }}</p>
        <p>{{ $c['description'] }}</p>
        <a href="{{ route('external.checkouts', $c['id'])}}"><button class="learn-button">Learn Class now</button></a>
        </div>
      </div>
      @endforeach
  @endforeach
  </div>
</body>

</html>