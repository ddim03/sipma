<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>SIPMA | Login</title>
</head>

<body>

<div class="w-full font-roboto">
  <section class="min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('images/backgroundkampus.jpeg') }}');">
    <div class="w-full h-screen bg-gray-900 bg-opacity-75 flex items-center ">
      <div class="w-screen sm:w-4/5 mx-auto h-screen flex justify-center items-center">
        <div class="rounded-lg m-8 w-full bg-white shadow dark:border sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
      <a href="#" class="px-0 py-0 mx-auto items-center justify-center text-black flex items-center mt-4 text-2xl font-semibold text-gray-900 dark:text-white" style="font-family: Roboto;">
        LOGIN
      </a>
        <div class="pt-0 pb-4 pr-4 pl-4 space-y-4 md:space-y-6 sm:p-4" style="font-family: Arial;">
          <form class="space-y-4 md:space-y-2">
            <table class="w-full">
              <tr class="md:flex items-center">
                <td class="w-1/5"><label for="username" class="text-sm font-medium text-gray-900 dark:text-white" style="font-family: Arial;">Username</label></td>
                <td class="w-4/5">
                  <input type="username" name="username" id="username" class="w-full bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 my-1" placeholder="username anda" required="" style="font-family: Arial;">
                </td>
              </tr>
              <tr class="md:flex items-center">
                <td class="w-1/5"><label for="password" class="text-sm font-medium text-gray-900 dark:text-white" style="font-family: Arial;">Password</label></td>
                <td class="w-4/5">
                  <input type="password" name="password" id="password" placeholder="••••••••" class="w-full bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 my-1" required="" style="font-family: Arial;">
                </td>
              </tr>
            </table>

            <button type="submit" class="w-full text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" style="font-family: Arial;">Login</button>
          </form>
        </div>
      </div>
      </div>
    </div>
  </section>
</div>

</body>

</html>