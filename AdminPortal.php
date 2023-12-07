<?php  
      session_start();
      if (!isset($_SESSION['Admin_email'])) {
        header("Location:AdminPortalLogin.php");
        exit();
        // Now you can use $userName in this file
    } else {
        $userName = $_SESSION['Admin_email'];
    }

    session_start();
      if (!isset($_SESSION['Admin_Name'])) {
        header("Location:AdminPortalLogin.php");
        exit();
        // Now you can use $userName in this file
    } else {
        $Name = $_SESSION['Admin_Name'];
    }

    $conn = mysqli_connect("localhost", "root", "mysql", "Accounts");

    if ($conn === false) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM Tours";


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
              <a href="AdminCreate.php" class="text-indigo-800 hover:bg-indigo-800 hover:text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Create Tours</a>
              <a href="AdminPortal.php" class="bg-indigo-800 text-white rounded-md px-3 py-2 text-sm font-medium">Modify Tours</a>
              <a href="ContactCustomer.php" class="text-indigo-800 hover:bg-indigo-800 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Contact Customer</a>
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
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Modify Tours</h1>
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
                $Location = $row["Location"];
                $Date = $row["Date"];
                $capacity = $row["Capacity"];
                $Price = $row["Price"];
                $registerednum = $row["registerednum"];
                
                echo "
                      <h1>Trip to $Location,   Date:$Date,   Capacity:$capacity,   Price:$Price</h1>
                      <form action='UpdateDate.php' method='POST'>
                        <label>tour date</label>
                        <input type='date' name='date'>
                        <input type='hidden' name='location' value='$Location'>
                        <button type='submit'>Modify Tour date</button>
                      </form><br/><br/>

                      <form action='UpdateCapacity.php' method='POST'>
                        <label>tour Capacity</label>
                        <input type='hidden' name='location' value='$Location'>
                        <input type='number' name='capacity' placeholder='$capacity' style='outline: 2px solid #9400D3;'>
                        <button type='submit'>Modify Tour Capacity</button>
                      </form><br/><br/>

                    ";
            }
            $statement->close();
            $conn->close();
            ?>
    </div>
  </main>
</div>
</html>
