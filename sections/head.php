<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $_SESSION["project_sman_5_kota_komba"]["name_page"] ?> - SMAN 5 Kota Komba</title>

  <script src="https://cdn.tailwindcss.com"></script>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
          },
          colors: {
            primary: '#0d6efd', // Biru
            secondary: '#6c757d',
            dark: '#1a1d20',
          }
        }
      }
    }
  </script>
</head>

<body class="font-sans text-gray-700 bg-gray-50 flex flex-col min-h-screen">