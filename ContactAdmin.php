<?php  
      session_start();
      if (!isset($_SESSION['userName'])) {
        header("Location:FastTravelLogin.php");
        exit();
        // Now you can use $userName in this file
    } else {
        $userName = $_SESSION['userName'];
    }

    session_start();
      if (!isset($_SESSION['Name'])) {
        header("Location:FastTravelLogin.php");
        exit();
        // Now you can use $userName in this file
    } else {
        $Name = $_SESSION['Name'];
    }

    $conn = mysqli_connect("localhost", "root", "mysql", "Accounts");

    if ($conn === false) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM ContactMailBox WHERE Receiver='Customer'";


    $statement = $conn->prepare($sql);
    $statement->execute();

    $result = $statement->get_result();
    ?>

<DOCTPYE html>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>FastTravel</title>
    <link href="/dist/output.css" rel="stylesheet">
    <div class="min-h-full">
  <nav class="bg-amber-400">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img class="h-40 w-50" src="FastTravel.png" alt="Fast Travel">
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="FastTravelMenu.php" class="text-indigo-800 hover:bg-indigo-800 hover:text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">My Tours</a>
              <a href="AvailableTours.php" class="text-indigo-800 hover:bg-indigo-800 hover:text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Available Tours</a>
              <a href="Cart.php" class="text-indigo-800 hover:bg-indigo-800 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Cart</a>
              <a href="ContactAdmin.php" class="bg-indigo-800 text-white rounded-md px-3 py-2 text-sm font-medium">Contact Admin</a>
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            <button type="button" class="relative rounded-full bg-indigo-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">View notifications</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
              </svg>
            </button>

            <!-- Profile dropdown -->
            <div class="relative ml-3">
              <div>
                  <span class="absolute -inset-1.5"></span>
                  <span class="sr-only">Open user menu</span>
                  <a href="#" class="bg-indigo-800 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page"><?php 
                  echo "$Name";
                  ?></a>
                </button>
              </div>

              <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                <!-- Active: "bg-gray-100", Not Active: "" -->
                <a href="Profile.php" class="block px-4 py-2 text-sm text-indigo-800" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
              </div>
            </div>
          </div>
        </div>
        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!-- Menu open: "hidden", Menu closed: "block" -->
            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!-- Menu open: "block", Menu closed: "hidden" -->
            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="#" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">My Tours</a>
        <a href="#" class="text-indigo-800 hover:bg-indigo-800 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Available Tours</a>
        <a href="#" class="text-indigo-800 hover:bg-indigo-800 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Settings</a>
        <a href="#" class="text-indigo-800 hover:bg-indigo-800 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Contact admin</a>
      </div>
      <div class="border-t border-gray-700 pb-3 pt-4 bg-indigo-800">
        <div class="flex items-center px-5">
          <div class="ml-3">
            <div class="text-base font-medium leading-none text-white"><?php
            echo " $Name";
            ?></div>
            <div class="text-sm font-medium leading-none text-gray-400"><?php
            echo "$userName";
            ?></div>
          </div>
          <button type="button" class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">View notifications</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
            </svg>
          </button>
        </div>
        <div class="mt-3 space-y-1 px-2">
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-amber-400 hover:bg-indigo-800 hover:text-white">Your Profile</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-amber-400 hover:bg-indigo-800 hover:text-white">Settings</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-amber-400 hover:bg-indigo-700 hover:text-white">Sign out</a>
        </div>
      </div>
    </div>
  </nav>
  <header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Contact Admin</h1>
    </div>
  </header>
  <main>
    <?php 
      if (!isset($_SESSION['userName'])) {
        echo "<h1>Error</h1>";
        //header("Location:FastTravelLogin.php");
        //exit();
      } //else{
        //$userName = $_SESSION['userName'];
        //echo "<h1>Session successful</h1>";
        //echo "<h1>$userName</h1>";
      //} 
    ?>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <?php 
           while ($row = $result->fetch_assoc()) {
            $message = $row["Message"];
            $sender = $row["Sender"];
            echo "<h1>Message from $sender:$message</h1>";
           }
        ?>
        <form action="MessageAdmin.php" method="POST">
        <div class="sm:col-span-4">
          <label for="capacity" class="block text-sm font-medium leading-6 text-gray-900">Message Admin</label>
          <div class="mt-2">
            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
              
              <input type="text" name="message" id="message" autocomplete="message" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
            </div>
          </div>
      </div>
      <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Message Admin</button>
    </div>
    </form>
    </div>
  </main>
</div>
</html>
