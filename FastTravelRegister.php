<DOCTPYE html>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>FastTravel</title>
    <link href="/dist/output.css" rel="stylesheet">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-50 w-auto" src="FastTravel.png" alt="Fast Travel">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-amber-400">Register</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="FastTravelInsert.php" method="POST">
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Full name</label>
        <div class="mt-2">
          <input id="name" name="name" type="name" autocomplete="name" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-amber-300 sm:text-sm sm:leading-6">
        </div>
      </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
        <div class="mt-2">
          <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-amber-300 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
        </div>
        <div class="mt-2">
          <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-amber-300 sm:text-sm sm:leading-6">
        </div>
      </div><br/>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-amber-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-amber-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-amber-400">Sign up</button>
      </div>
    </form>
  </div>
  <input readonly>
</div>

</html>

