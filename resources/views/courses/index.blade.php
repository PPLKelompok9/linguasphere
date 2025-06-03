<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Learning Roadmap</title>
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

    /* Styles for main roadmap page */
    .courses-container {
      max-width: 1200px;
      margin: 40px auto;
      padding: 20px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 30px;
    }

    .course-card {
      background-color: #3D8577;
      border-radius: 10px;
      padding: 40px 20px;
      text-align: center;
      color: white;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 15px;
    }

    .book-icon {
      width: 60px;
      height: 60px;
    }

    .start-button {
      background-color: white;
      color: #3D8577;
      padding: 8px 20px;
      border-radius: 20px;
      text-decoration: none;
      font-weight: bold;
      transition: transform 0.3s ease;
    }

    .start-button:hover {
      transform: scale(1.05);
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
      Learning Roadmaps
    </h1>
  </header>

  <div class="courses-container">
    @foreach ($coursesByCategory as $category)
    <div class="course-card">
      {{-- <img
      src="{{ Storage::url($courses->first()->category->images) ?? asset('assets/icons/united-kingdom.png') }}"
      class="w-24" alt="logo" srcset=""> --}}
      <h2>{{ $category['name'] }}</h2>
      <a href="{{ route('courses.guestDetail', ['id' => $category['id']]) }}" class="start-button">Start Journey</a>
    </div>
  @endforeach



  </div>
</body>

</html>