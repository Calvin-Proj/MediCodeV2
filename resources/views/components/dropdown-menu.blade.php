<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

.dropdown:hover .dropdown-content {display: block;}

</style>
</head>
<body>
<div class="dropdown flex-auto justify-center px-4 border-3 ">
    <div class="flex items-center">
       @switch(auth()->user()->usertype)
    @case('admin')
    <img class="block h-8 w-8" src="https://cdn3.iconfinder.com/data/icons/avatars-round-flat/33/woman10-512.png" alt="avatar">
        @break
    @case('lecturer')
    <img class="block h-8 w-8" src="https://cdn3.iconfinder.com/data/icons/avatars-round-flat/33/man4-512.png" alt="avatar">
        @break
    @case('invig')
    <img class="block h-8 w-8" src="https://cdn3.iconfinder.com/data/icons/avatars-round-flat/33/man13-512.png" alt="avatar">
        @break
    @case('student')
    <img class="block h-8 w-8" src="https://cdn4.iconfinder.com/data/icons/professions-1-2/151/8-512.png" alt="avatar">
        @break
    @default
@endswitch

    <button class="dropbtn p-4 text-base">{{auth()->user()->name}} ({{auth()->user()->usertype}})</button> <label for="button"></label>

    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
    </svg>
  </div>


  <div class="dropdown-content flex-auto justify-center rounded-lg p-4 shadow-xl bg-white hidden absolute w-48 right-4">


    @switch(auth()->user()->usertype)
    @case('admin')
    <a href="/admin/edit{{auth()->user()->id}}" class="hover:bg-secondary hover:text-white text-black p-2 py-2 block text-center rounded-lg">Edit Account</a>
        @break
    @case('lecturer')
    <a href="/lecturer/edit{{auth()->user()->id}}" class="hover:bg-secondary hover:text-white text-black p-2 py-2 block text-center rounded-lg">Edit Account</a>
        @break
    @case('invig')
    <a href="/invig/edit{{auth()->user()->id}}" class="hover:bg-secondary hover:text-white text-black p-2 py-2 block text-center rounded-lg">Edit Account</a>
        @break
    @case('student')
    <a href="/student/edit{{auth()->user()->id}}" class="hover:bg-secondary hover:text-white text-black p-2 py-2 block text-center rounded-lg">Edit Account</a>
        @break
    @default
@endswitch

    <form action="{{ route('logout') }}" method="post" class="flex min-width-max">
      @csrf
       <button type="submit" class="inline min-width-full h-full text-black flex-auto p-2 hover:bg-secondary hover:text-white py-2 rounded-lg">Logout</button>
   </form>
  </div>
</div>

</body>
</html>



