<?php
    include('include/connection.php');

    $date = date('m/d/Y');
    
    $query = "SELECT * FROM reservation WHERE date='$date' AND confirm=0";
    $result = mysqli_query($connection,$query);
    
    $rescount = mysqli_num_rows($result);
    
    $resTable = '';

    // Order Managment
    if($result)
    {
        while($rec = mysqli_fetch_assoc($result))
        {
            $id = $rec['id'];
            $name = $rec['user_name'];
            $email = $rec['email'];
            $mobile = $rec['phone'];
            
            $resTable .= '<tr><td style="border: 1px solid #ddd; padding: 8px;">'.$id.'</td>';
            $resTable .= '<td style="border: 1px solid #ddd; padding: 8px;">'.$name.'</td>';
            $resTable .= '<td style="border: 1px solid #ddd; padding: 8px;">'.$email.'</td>';
            $resTable .= '<td style="border: 1px solid #ddd; padding: 8px;">'.$mobile.'</td>';
            $resTable .= '<td style="border: 1px solid #ddd; padding: 8px;"><a href="admin-login.php?tid='.$id.'">Confirm</a></tr>';


        }
    }

    //Confirm Reservation
    if(isset($_GET['tid']))
    {
        $tid = $_GET['tid'];
        $queryResConfirm = "UPDATE reservation SET confirm=1 WHERE id=$tid";
        $resultResConfirm = mysqli_query($connection,$queryResConfirm);
        if($resultResConfirm)
        {
            header('Location: admin-login.php#reservations');
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verdant Restaurant Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" defer></script>
    <style>
        .sidebar {
            transition: transform 0.3s ease-in-out;
            z-index: 20;
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.open {
                transform: translateX(0);
            }
        }
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 10;
        }
        .overlay.show {
            display: block;
        }
        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 50;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .modal.show {
            display: block;
        }
        .modal input:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 5px #4CAF50;
        }
        .submenu {
            display: none;
        }
        .submenu.open {
            display: block;
        }

        /* Specific background styling for the login page */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #000; /* Set background to black */
        }

        .login-container {
            width: 350px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.5);
            border-radius: 12px;
            text-align: center;
        }

        .login-container img {
            width: 80px;
            margin-bottom: 20px;
            border-radius: 50%; /* Make the image round */
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #ffffff;
            font-size: 26px;
            font-weight: 600;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: none;
            border-bottom: 1px solid #ffffff;
            background: transparent;
            outline: none;
            color: #ffffff;
            font-size: 16px;
            font-weight: 500;
        }

        .login-container input[type="checkbox"] {
            margin-right: 8px;
            accent-color: #4CAF50; /* Custom checkbox color */
        }

        .login-container label {
            color: #ffffff;
            font-size: 14px;
            cursor: pointer;
            font-weight: 500;
        }

        .login-container a {
            color: #ffffff;
            font-size: 12px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }

        .login-container a:hover {
            text-decoration: underline;
        }

        .login-container button {
            width: 100%;
            padding: 12px;
            background: #4CAF50;
            border: none;
            color: #ffffff;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
            border-radius: 6px;
            transition: 0.3s;
            font-weight: 600;
        }

        .login-container button:hover {
            background: #45a049;
        }

        /* Dashboard specific styling */
        body.dashboard-active {
            background-color: #f3f4f6; /* A light gray background for the dashboard */
            height: 100vh;
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            padding: 0;
        }

        .admin-interface {
            display: flex;
            width: 100%;
            height: 100%;
            background-color: #f3f4f6; /* The same background color for consistency */
        }

        .flex-1 {
            flex: 1 1 auto;
        }
    </style>
</head>
<body>

<!-- Login Form -->
<div class="login-container">
    
    <h2>Login</h2>
    <form id="loginForm" action="admin-login.php" method="post">
        <input type="text" id="email" placeholder="Email ID" name="email" required>
        <input type="password" id="password" placeholder="Password" name="pass" required>
        <div>
            <input type="checkbox" id="rememberMe">
            <label for="rememberMe">Remember me</label>
            <a href="#" style="float: right;">Forgot Password?</a>
        </div>
        <button type="submit" name="submit">LOGIN</button>
    </form>
</div>

<!-- Admin Interface -->
<div class="admin-interface hidden" id="adminInterface">
    <div class="flex h-screen bg-gray-100 w-full">
        <!-- Sidebar and Admin Interface Code Remains Unchanged -->
        <aside aria-label="Sidebar Navigation" class="sidebar bg-green-600 text-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">
            <nav>
                <a href="#dashboard" id="dashboardLink" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-green-700 hover:text-white">
                    Dashboard
                </a>
                <div>
                    <a href="#menu" id="menuLink" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-green-700 hover:text-white">
                        Menu
                    </a>
                    <div id="menuSubmenu" class="submenu pl-4 space-y-4 bg-gray-100 border border-gray-300 rounded-lg shadow-md">
    <!-- Add Menu Item Section -->
    <div>
        <a href="#add-menu" class="block py-2 px-4 rounded hover:bg-green-700 hover:text-white transition duration-300 ease-in-out flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            <span>Add Menu Item</span>
        </a>
        <div class="pl-6 space-y-2">
            <p class="text-sm text-gray-600">Examples of items to add:</p>
            <ul class="list-disc list-inside text-gray-600">
                <li>Pizza</li>
                <li>Burger</li>
                <li>Salad</li>
            </ul>
        </div>
    </div>

    <!-- Edit Menu Section -->
    <div>
        <a href="#edit-menu" class="block py-2 px-4 rounded hover:bg-green-700 hover:text-white transition duration-300 ease-in-out flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828zM5 12v2h2L14.586 6.414l-2-2L5 12zM3 16a1 1 0 001 1h12a1 1 0 001-1v-2H3v2z"/>
            </svg>
            <span>Edit Menu</span>
        </a>
        <div class="pl-6 space-y-2">
            <p class="text-sm text-gray-600">Examples of items to edit:</p>
            <ul class="list-disc list-inside text-gray-600">
                <li>Edit Pizza Toppings</li>
                <li>Change Burger Size</li>
                <li>Update Salad Ingredients</li>
            </ul>
        </div>
    </div>

    <!-- Remove Menu Item Section -->
    <div>
        <a href="#remove-menu" class="block py-2 px-4 rounded hover:bg-green-700 hover:text-white transition duration-300 ease-in-out flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M6 2a1 1 0 011-1h6a1 1 0 011 1v1h4a1 1 0 110 2h-1v11a2 2 0 01-2 2H5a2 2 0 01-2-2V5H2a1 1 0 110-2h4V2zM5 5v11a1 1 0 001 1h8a1 1 0 001-1V5H5z" clip-rule="evenodd"/>
            </svg>
            <span>Remove Menu Item</span>
        </a>
        <div class="pl-6 space-y-2">
            <p class="text-sm text-gray-600">Examples of items to remove:</p>
            <ul class="list-disc list-inside text-gray-600">
                <li>Remove Pizza</li>
                <li>Remove Salad</li>
            </ul>
        </div>
    </div>
</div>

                </div>
                <div>
                    <a href="#reservations" id="reservationsLink" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-green-700 hover:text-white">
                        Reservations
                    </a>
                    <div id="reservationsSubmenu" class="submenu pl-4 space-y-2">
                        <a href="#view-reservations" class="block py-2 px-4 rounded hover:bg-green-700">View Reservations</a>
                        <a href="#confirm-reservation" class="block py-2 px-4 rounded hover:bg-green-700">Confirm Reservations</a>
                    </div>
                </div>
                <div>
                    <a href="#blog" id="blogLink" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-green-700 hover:text-white">
                        Blog
                    </a>
                    <div id="blogSubmenu" class="submenu pl-4 space-y-2">
                        <a href="#add-post" class="block py-2 px-4 rounded hover:bg-green-700">Add Post</a>
                        <a href="#edit-post" class="block py-2 px-4 rounded hover:bg-green-700">Edit Post</a>
                        <a href="#delete-post" class="block py-2 px-4 rounded hover:bg-green-700">Delete Post</a>
                    </div>
                </div>
                <div>
                    <a href="#settings" id="settingsLink" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-green-700 hover:text-white">
                        Settings
                    </a>
                    <div id="settingsSubmenu" class="submenu pl-4 space-y-2">
                        <a href="#site-settings" class="block py-2 px-4 rounded hover:bg-green-700">Site Settings</a>
                        <a href="#user-management" class="block py-2 px-4 rounded hover:bg-green-700">User Management</a>
                        <a href="#photo-upload" class="block py-2 px-4 rounded hover:bg-green-700">Photo Upload Settings</a>
                    </div>
                </div>
            </nav>
        </aside>

        <!-- Overlay for mobile and modal -->
        <div id="overlay" class="overlay"></div>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navigation -->
            <header class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-green-600">
                <div class="flex items-center">
                    <button id="sidebarToggle" aria-label="Toggle Sidebar" class="text-gray-500 focus:outline-none md:hidden">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6H20M4 12H20M4 18H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center">
                    <img class="h-8 w-8 rounded-full object-cover" src="/path/to/avatar.png" alt="Admin Avatar"/>
                    <span class="ml-2 font-medium text-gray-800">Admin</span>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-8">
                <div class="container mx-auto">
                    <h3 id="pageTitle" class="text-gray-700 text-3xl font-medium">Dashboard</h3>

                    <div id="dashboardContent" class="mt-8">
                        <div class="flex flex-wrap -mx-6">
                            <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
                                <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                                    <div class="p-3 rounded-full bg-green-600 bg-opacity-75">
                                        <svg class="h-8 w-8 text-white" viewBox="0 0 28 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M18.2 9.08889C18.2 11.5373 16.3196 13.5222 14 13.5222C11.6804 13.5222 9.79999 11.5373 9.79999 9.08889C9.79999 6.64043 11.6804 4.65556 14 4.65556C16.3196 4.65556 18.2 6.64043 18.2 9.08889Z" fill="currentColor"/>
                                            <path d="M25.2 12.0444C25.2 13.6768 23.9464 15 22.4 15C20.8536 15 19.6 13.6768 19.6 12.0444C19.6 10.4121 20.8536 9.08889 22.4 9.08889C23.9464 9.08889 25.2 10.4121 25.2 12.0444Z" fill="currentColor"/>
                                            <path d="M19.6 22.3889C19.6 19.1243 17.0927 16.4778 14 16.4778C10.9072 16.4778 8.39999 19.1243 8.39999 22.3889V26.8222H19.6V22.3889Z" fill="currentColor"/>
                                            <path d="M8.39999 12.0444C8.39999 13.6768 7.14639 15 5.59999 15C4.05359 15 2.79999 13.6768 2.79999 12.0444C2.79999 10.4121 4.05359 9.08889 5.59999 9.08889C7.14639 9.08889 8.39999 10.4121 8.39999 12.0444Z" fill="currentColor"/>
                                            <path d="M22.4 26.8222V22.3889C22.4 20.8312 22.0195 19.3671 21.351 18.0949C21.6863 18.0039 22.0378 17.9556 22.4 17.9556C24.7197 17.9556 26.6 19.9404 26.6 22.3889V26.8222H22.4Z" fill="currentColor"/>
                                            <path d="M6.64896 18.0949C5.98058 19.3671 5.59999 20.8312 5.59999 22.3889V26.8222H1.39999V22.3889C1.39999 19.9404 3.2804 17.9556 5.59999 17.9556C5.96219 17.9556 6.31367 18.0039 6.64896 18.0949Z" fill="currentColor"/>
                                        </svg>
                                    </div>

                                    <div class="mx-5">
                                        <h4 class="text-2xl font-semibold text-gray-700"><?=$rescount?></h4>
                                        <div class="text-gray-500">Today's Reservations</div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 sm:mt-0">
                                <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                                    <div class="p-3 rounded-full bg-green-600 bg-opacity-75">
                                        <svg class="h-8 w-8 text-white" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.19999 1.4C3.4268 1.4 2.79999 2.02681 2.79999 2.8C2.79999 3.57319 3.4268 4.2 4.19999 4.2H5.9069L6.33468 5.91114C6.33917 5.93092 6.34409 5.95055 6.34941 5.97001L8.24953 13.5705L6.99992 14.8201C5.23602 16.584 6.48528 19.6 8.97981 19.6H21C21.7731 19.6 22.4 18.9732 22.4 18.2C22.4 17.4268 21.7731 16.8 21 16.8H8.97983L10.3798 15.4H19.6C20.1303 15.4 20.615 15.1004 20.8521 14.6261L25.0521 6.22609C25.2691 5.79212 25.246 5.27673 24.991 4.86398C24.7357 4.45123 24.2852 4.2 23.8 4.2H8.79308L8.35818 2.46044C8.20238 1.83722 7.64241 1.4 6.99999 1.4H4.19999Z" fill="currentColor"/>
                                            <path d="M22.4 23.1C22.4 24.2598 21.4598 25.2 20.3 25.2C19.1403 25.2 18.2 24.2598 18.2 23.1C18.2 21.9402 19.1403 21 20.3 21C21.4598 21 22.4 21.9402 22.4 23.1Z" fill="currentColor"/>
                                            <path d="M9.1 25.2C10.2598 25.2 11.2 24.2598 11.2 23.1C11.2 21.9402 10.2598 21 9.1 21C7.9402 21 7 21.9402 7 23.1C7 24.2598 7.9402 25.2 9.1 25.2Z" fill="currentColor"/>
                                        </svg>
                                    </div>

                                    <div class="mx-5">
                                        <h4 class="text-2xl font-semibold text-gray-700">7</h4>
                                        <div class="text-gray-500">Pending Orders</div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 xl:mt-0">
                                <div class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                                    <div class="p-3 rounded-full bg-green-600 bg-opacity-75">
                                        <svg class="h-8 w-8 text-white" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.99998 11.2H21L22.4 23.8H5.59998L6.99998 11.2Z" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                                            <path d="M9.79999 8.4C9.79999 6.08041 11.6804 4.2 14 4.2C16.3196 4.2 18.2 6.08041 18.2 8.4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>

                                    <div class="mx-5">
                                        <h4 class="text-2xl font-semibold text-gray-700">$1,250</h4>
                                        <div class="text-gray-500">Today's Revenue</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="menuContent" class="mt-8 hidden">
                        <h3 class="text-gray-700 text-2xl font-medium">Menu Management</h3>
                        <!-- Add your menu-related content here -->
                    </div>

                    <div id="reservationsContent" class="mt-8 hidden">
                        <h3 class="text-gray-700 text-2xl font-medium">Reservations Management</h3>
                        <table style="width: 100%; border-collapse: collapse; border: 1px solid #ddd; margin-top: 20px;">
                            <tr style="background-color: #f2f2f2;">
                                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Table Id</th>
                                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Name</th>
                                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">email</th>
                                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Mobile</th>
                                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">CONFIRM</th>
                            </tr>
                                <?= $resTable ?>
                        </table>
                        <!-- Add your reservations-related content here -->
                    </div>

                    <div id="blogContent" class="mt-8 hidden">
                        <h3 class="text-gray-700 text-2xl font-medium">Blog Management</h3>
                        <!-- Add your blog-related content here -->
                    </div>

                    <div id="settingsContent" class="mt-8 hidden">
                        <h3 class="text-gray-700 text-2xl font-medium">Settings</h3>
                        <!-- Add your settings-related content here -->
                    </div>

                    <div class="mt-8">
                        <canvas id="revenueChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

<script>
// Login Process
document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();

    // Show a success message
    alert('You have successfully logged in!');
    
    // Hide the login form
    document.querySelector('.login-container').style.display = 'none';
    
    // Show the admin interface
    document.getElementById('adminInterface').classList.remove('hidden');
    
    // Change the background to the dashboard style
    document.body.classList.add('dashboard-active');
});

// Toggle sidebar on mobile and show overlay
document.getElementById('sidebarToggle').addEventListener('click', function() {
    const sidebar = document.querySelector('.sidebar');
    const overlay = document.getElementById('overlay');
    sidebar.classList.toggle('open');
    overlay.classList.toggle('show');
});

// Close sidebar when clicking on overlay
document.getElementById('overlay').addEventListener('click', function() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.remove('open');
    this.classList.remove('show');
});

// Submenu toggle functionality
document.getElementById('menuLink').addEventListener('click', function() {
    toggleSubmenu('menuSubmenu');
    toggleContent('menuContent');
});

document.getElementById('reservationsLink').addEventListener('click', function() {
    toggleSubmenu('reservationsSubmenu');
    toggleContent('reservationsContent');
});

document.getElementById('blogLink').addEventListener('click', function() {
    toggleSubmenu('blogSubmenu');
    toggleContent('blogContent');
});

document.getElementById('settingsLink').addEventListener('click', function() {
    toggleSubmenu('settingsSubmenu');
    toggleContent('settingsContent');
});

function toggleSubmenu(submenuId) {
    document.querySelectorAll('.submenu').forEach(function(submenu) {
        submenu.classList.remove('open');
    });
    document.getElementById(submenuId).classList.toggle('open');
}

function toggleContent(contentId) {
    document.querySelectorAll('#dashboardContent, #menuContent, #reservationsContent, #blogContent, #settingsContent').forEach(function(content) {
        content.classList.add('hidden');
    });
    document.getElementById(contentId).classList.remove('hidden');
}

// Revenue Chart
var ctx = document.getElementById('revenueChart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
        datasets: [{
            label: 'Revenue',
            data: [1000, 1500, 1200, 1800, 2000, 2500, 2000],
            borderColor: 'rgb(75, 192, 192)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            tension: 0.1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            legend: {
                display: true,
                position: 'top',
            },
            tooltip: {
                enabled: true,
            }
        }
    }
});
</script>

</body>
</html>
