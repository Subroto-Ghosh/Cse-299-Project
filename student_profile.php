<?php
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

// Fetch the profile picture from session
$profilePic = isset($_SESSION['profile_pic']) ? $_SESSION['profile_pic'] : 'default_profile.jpg'; // Set a default image if not available
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <?php include('head_content.php') ?>
</head>

<body>







  <header>
    <!-- Navigation -->
    <nav id="navigation">
      <div class="navbar">
        <div class="navbar-start">
          <!-- Dropdown menu -->
          <div class="dropdown">
            <div tabindex="0" role="button" class="hidden btn btn-ghost btn-circle">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h7" />
              </svg>
            </div>
            <ul
              tabindex="0"
              class="hidden menu menu-sm dropdown-content bg-black rounded-box z-[1] mt-3 w-52 p-2 shadow">
              <li><a>Homepage</a></li>
              <li><a>Portfolio</a></li>
              <li><a>About</a></li>
            </ul>
          </div>
        </div>

        <div class="navbar-center">
          <a class="btn btn-ghost text-xl">SkillPro</a>
        </div>

        <div class="navbar-end">
          <!-- Search form -->
          <form action="search.php" method="GET" class="relative">
            <button id="search-btn" type="button" class="btn btn-ghost btn-circle">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </button>
            <input
              id="search-input"
              type="text"
              name="query"
              placeholder="Search..."
              class="hidden absolute right-0 bg-black text-white rounded-md p-2 mt-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200 ease-in-out"
              style="width: 150px" />
            <input
              type="hidden"
              name="sort"
              value="<?php echo isset($_GET['sort']) ? htmlspecialchars($_GET['sort']) : 'asc'; ?>" />
          </form>

          <!-- Notification button -->
          <button class="btn btn-ghost btn-circle">
            <div class="indicator">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
              </svg>
              <span class="badge badge-xs badge-primary indicator-item"></span>
            </div>
          </button>
        </div>
      </div>

      <div class="navbar relative z-50">
        <div class="navbar-start">
          <!-- Dropdown menu and brand -->
          <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h8m-8 6h16" />
              </svg>
            </div>
            <ul
              tabindex="0"
              class="menu menu-sm dropdown-content rounded-box z-[1] mt-3 w-52 p-2 shadow bg-black text-white">
              <li><a href="student.php">Home</a></li>
              <li><a>Development</a></li>
              <li><a>IT & Software</a></li>
              <li><a>Design</a></li>
              <li><a>Instructors</a></li>
              <li><a href="FreeCourses.html">Free Courses</a></li>
            </ul>
          </div>

          <!-- Theme toggle -->
          <label class="flex cursor-pointer gap-2">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round">
              <circle cx="12" cy="12" r="5" />
              <path
                d="M12 1v2M12 21v2M4.2 4.2l1.4 1.4M18.4 18.4l1.4 1.4M1 12h2M21 12h2M4.2 19.8l1.4-1.4M18.4 5.6l1.4-1.4" />
            </svg>
            <input type="checkbox" value="synthwave" class="toggle theme-controller" />
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round">
              <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
            </svg>
          </label>
        </div>

        <div class="navbar-center hidden lg:flex">
          <ul class="menu menu-horizontal px-1">
            <li class="mark"><a href="student.php">Home</a></li>
            <li><a href="">Development</a></li>
            <li><a href="">IT & Software</a></li>
            <li><a href="">Design</a></li>
            <li><a>Instructors</a></li>
            <li><a href="FreeCourses.html">Free Courses</a></li>
          </ul>
        </div>

        <!-- Profile Image Button -->
        <div class="navbar-end">
          <button
            id="profile-btn"
            class="rounded-full w-10 h-10 mr-10 overflow-hidden focus:outline-none focus:ring-2 focus:ring-blue-500">
            <img
              src="<?php echo htmlspecialchars($profilePic); ?>"
              alt="Profile"
              class="w-full h-full object-cover" />
          </button>

          <!-- Dropdown Menu -->
          <div
            id="dropdown-menu"
            class="hidden absolute right-0 mt-2 w-40 bg-[#021e3b] rounded-md shadow-lg z-10">
            <ul class="py-2 text-sm text-gray-100">
              <li>
                <a href="student_profile.php" class="block px-4 py-2 hover:bg-[#01797a]">Profile</a>
              </li>
              <li>
                <a href="student_settings.php" class="block px-4 py-2 hover:bg-[#01797a]">Settings</a>
              </li>
              <li>
                <a href="logout.php" class="block px-4 py-2 text-red-500 hover:bg-[#01797a]">Log Out</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- Search input toggle script -->
    <script>
      document.getElementById("search-btn").addEventListener("click", function() {
        const searchInput = document.getElementById("search-input");
        searchInput.classList.toggle("hidden");
        searchInput.focus();
      });

      document.getElementById("search-input").addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
          event.preventDefault();
          const form = document.querySelector("form");
          if (!form.querySelector('input[name="sort"]')) {
            const sortInput = document.createElement("input");
            sortInput.type = "hidden";
            sortInput.name = "sort";
            sortInput.value = "asc";
            form.appendChild(sortInput);
          }
          form.submit();
        }
      });
    </script>
  </header>

 <?php
include("database.php");


// Assuming the user is logged in and the user_id is stored in the session
$user_id = $_SESSION['user_id'];
$profilePic = isset($_SESSION['profile_pic']) ? $_SESSION['profile_pic'] : 'default_profile.jpg'; // Set a default image if not available

// Query to fetch student data and their enrolled courses
$query = "
    SELECT u.firstName, u.lastName, u.email, u.profile_pic, u.bio, e.enrollment_date, c.title AS course_title
    FROM User u
    LEFT JOIN Enrollment e ON u.user_id = e.user_id
    LEFT JOIN Course c ON e.course_id = c.course_id
    WHERE u.user_id = $user_id
";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // Fetch the student data
    $row = mysqli_fetch_assoc($result);
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $email = $row['email'];
    $bio = $row['bio'];
    $profile_pic = $row['profile_pic'];
    $enrollment_date = $row['enrollment_date'];
    $course_title = $row['course_title']; // Fetching course titles the student is enrolled in
} else {
    echo "No data found for this user.";
    exit();
}
?>

  <main class="min-h-screen py-16 flex items-center justify-center font-sans transition-colors duration-300">
    <div class="max-w-5xl w-full rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden flex flex-col lg:flex-row bg-white dark:bg-gray-800 transition-colors duration-300">

      <!-- Profile Image -->
      <div class="lg:w-1/3 w-full bg-gradient-to-br from-[#6dff3a]/20 to-[#00b894]/10 flex items-center justify-center p-8">
        <img src="<?php echo htmlspecialchars($profilePic); ?>" alt="Profile"
          class="w-56 h-56 rounded-full object-cover shadow-lg border-4 border-[#6dff3a]" />
      </div>

      <!-- Profile Info -->
      <div class="lg:w-2/3 w-full p-10 text-gray-900 dark:text-white transition-colors duration-300">
        <h1 class="text-3xl font-bold mb-2">
          <?php echo htmlspecialchars($firstName . ' ' . $lastName); ?>
        </h1>
        <p class="text-sm mb-6 text-gray-600 dark:text-gray-300">
          User ID: <span class="font-medium text-gray-800 dark:text-gray-200"><?php echo htmlspecialchars($user_id); ?></span>
        </p>

        <!-- Bio -->
        <div class="mb-6">
          <h2 class="text-xl font-semibold mb-2 text-gray-800 dark:text-gray-200">Bio</h2>
          <p class="leading-relaxed text-gray-700 dark:text-gray-300">
            <?php echo $bio ? htmlspecialchars($bio) : "No bio available."; ?>
          </p>
        </div>

        <!-- Enrolled Info -->
        <div class="mb-6">
          <h2 class="text-xl font-semibold mb-2 text-gray-800 dark:text-gray-200">Account Info</h2>

          <!-- Enroll Date (Perfectly formatted) -->
          <p class="flex items-center text-gray-700 dark:text-gray-300 mb-1">
            <svg class="h-5 w-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
              <path d="M2 5a2 2 0 012-2h3l1-1h4l1 1h3a2 2 0 012 2v2H2V5z" />
              <path fill-rule="evenodd" d="M2 9v6a2 2 0 002 2h12a2 2 0 002-2V9H2zm5 3a1 1 0 112 0 1 1 0 01-2 0z" clip-rule="evenodd" />
            </svg>
            Enrolled on:
            <span class="ml-1 font-medium text-gray-800 dark:text-gray-200">
              <?php
              if (!empty($enrollment_date)) {
                echo date('F j, Y \a\t g:i A', strtotime($enrollment_date));
              } else {
                echo "Not enrolled yet";
              }
              ?>
            </span>
          </p>

          <!-- Email -->
          <p class="flex items-center text-gray-700 dark:text-gray-300">
            <svg class="h-5 w-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
              <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
              <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
            </svg>
            <a href="mailto:<?php echo $email; ?>" class="text-[#6dff3a] hover:underline font-medium">
              <?php echo htmlspecialchars($email); ?>
            </a>
          </p>
        </div>

        <!-- Enrolled Courses -->
        <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-5 bg-gray-50 dark:bg-gray-700 transition-colors duration-300">
          <h2 class="text-lg font-semibold mb-3 text-gray-900 dark:text-white">Enrolled Courses</h2>
          <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 space-y-1">
            <?php
            $coursesQuery = "SELECT c.title FROM Course c JOIN Enrollment e ON c.course_id = e.course_id WHERE e.user_id = $user_id";
            $coursesResult = mysqli_query($conn, $coursesQuery);
            if ($coursesResult && mysqli_num_rows($coursesResult) > 0) {
              while ($course = mysqli_fetch_assoc($coursesResult)) {
                echo "<li>" . htmlspecialchars($course['title']) . "</li>";
              }
            } else {
              echo "<li>No courses enrolled yet.</li>";
            }
            ?>
          </ul>
        </div>

        <!-- Buttons -->
        <div class="mt-8 flex flex-wrap gap-4">
          <a href="student_settings.php"
            class="bg-[#6dff3a] text-gray-900 dark:text-gray-900 font-semibold px-6 py-3 rounded-md shadow hover:bg-[#5bfa2e] transition">
            Edit Profile
          </a>
          <a href="delete_account.php"
            class="bg-red-500 text-white font-semibold px-6 py-3 rounded-md shadow hover:bg-red-600 transition">
            Delete Account
          </a>
        </div>
      </div>
    </div>
  </main>













  </div>



  <script src="js/script.js"></script>

</body>

</html>