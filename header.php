<?php
require_once "_config/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIG Wisata Banyumas</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" href="../_assets/img/bms.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        /* Sidebar Style */
        .sidebar {
            background: linear-gradient(180deg, #4e73df 10%, #224abe 100%);
            min-height: 100vh;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            transition: left 0.3s ease;
            z-index: 100;
        }

        .sidebar.show {
            left: -250px;
        }

        .sidebar .nav-link {
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            margin: 5px 0;
            font-size: 16px;
            font-weight: bold;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .content {
            padding: 20px;
            margin-left: 250px;
            transition: margin-left 0.3s ease;
        }

        /* Header style */
        .header {
            background-color: white;
            padding: 10px 20px;
            border-bottom: 1px solid #e3e6f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header .date-time {
            font-size: 14px;
            color: #858796;
            margin-right: 20px;
        }

        .header .user-info {
            display: flex;
            align-items: center;
        }

        .header .user-info img {
            border-radius: 50%;
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }

        /* Main Content */
        .main-content {
            text-align: center;
            margin-top: 50px;
        }

        .main-content img {
            width: 150px;
            margin-bottom: 20px;
        }

        .main-content h1 {
            font-size: 24px;
            color: #4e73df;
            margin-bottom: 20px;
        }

        .main-content .btn-primary {
            background-color: #4e73df;
            border: none;
        }

        .footer {
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #858796;
        }

        /* New Toggle Button Style (Square) */
        .toggle-btn {
            font-size: 20px;
            color: white;
            background-color: #4e73df;
            border: none;
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 1000;
            cursor: pointer;
            padding: 10px;
            width: 50px;
            height: 50px;
            border-radius: 5px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
            transition: background-color 0.3s ease, transform 0.3s ease-in-out;
        }

        .toggle-btn:hover {
            transform: scale(1.1);
            background-color: #224abe;
        }

        /* For responsive design */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .content {
                margin-left: 0;
            }

            .toggle-btn {
                top: 10px;
                left: 10px;
            }

            /* Header on small screens */
            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .header .user-info {
                margin-top: 10px;
            }

            .header .date-time {
                margin-top: 5px;
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Toggle Button -->
        <button class="toggle-btn" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i> <!-- Toggle icon (hamburger) -->
        </button>

        <!-- Sidebar -->
        <div class="sidebar p-3">
            <div class="text-center mb-4">
                <img alt="Logo of SIG Wisata Banyumas" height="100" src="../_assets/img/bms.png" width="100" />
                <h4>SIG WISATA BANYUMAS</h4>
            </div>
            <nav class="nav flex-column">
                <a class="nav-link" href="../dashboard/index.php">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a class="nav-link" href="../kategori/data.php">
                    <i class="fas fa-map"></i> Kategori
                </a>
                <a class="nav-link" href="../datawisata/data.php">
                    <i class="fas fa-map-marker-alt"></i> Data Wisata
                </a>
            </nav>
        </div>

        <!-- Content Area -->
        <div class="content flex-grow-1">
            <!-- Header -->
            <div class="header">
                <div class="date-time" id="current-time">
                    <!-- Dynamic time will go here -->
                </div>
                <div class="user-info">
                    <img alt="User profile picture" height="30" src="https://storage.googleapis.com/a1aa/image/W2wQzNfTxKUrcC9j0TBf5EFlz6wP7R3Z9uOqV43OnUp4jL3TA.jpg" width="30" />
                    <span>Admin Ganteng</span>
                </div>
            </div>